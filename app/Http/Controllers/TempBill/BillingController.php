<?php

namespace App\Http\Controllers\TempBill;

use App\Model\TempBill;
use App\Model\TempBillItem;
use App\Model\TempBillProductSaleReturn;
use App\Model\TempBillProductsDetails;
use App\Model\TempBillRetailer;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
use Carbon\Carbon;
use Response;

class BillingController extends Controller
{
    public function index()
    {
        return view('Users.TempBill.billing');
    }


    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     * Make Temporary Bill Index
     */
    public function tempBill()
    {
        $staff = User::whereHas('roles', function ($q) {
            $q->where('name', 'field');
        })->get()->toArray();

        $products = TempBillItem::all();

        $retailers = TempBillRetailer::with('salesMan')->get();
        $invoice_no = 'TEMP-' . Carbon::now()->timestamp;
        return view('Users.TempBill.tempbill', compact('staff', 'products', 'retailers', 'invoice_no', 'tempproducts'));

    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     * Assync Search temp bill
     */
    public function searchTemporaryBill(Request $request)
    {
        $tempbill = TempBill::GetByInvoice($request->input('search'))->SaleReturnNull()->get();

        return Response::json($tempbill);

    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     * Add Temporary Bill
     */
    public function tempbillPost(Request $request)
    {
        $temp_data = $request->all();

        $retailer = $request->retailer;
        $invoice = $request->invoice;
        unset($temp_data['retailer']);
        unset($temp_data['invoice']);
        unset($temp_data['totalAmount']);
        $tempbill = [
            'invoice_no' => $invoice,
            'slug' => $invoice,
            'retailer_id' => $retailer['id'],
            'bill_amount' => $request->totalAmount,
            'created_at' => Carbon::now()
        ];

        $temp_bill_id = TempBill::insertGetId($tempbill);

        foreach ($temp_data as $key => $value) {
            $bill_products = [
                'tempbill_id' => $temp_bill_id,
                'item_name' => $value['products']['item_name'],
                'pcsboxincase' => $value['pcsboxincase'],
                'item_mrp' => $value['mrp'],
                'item_quantity' => $value['quantity'],
                'item_units' => $value['units'],
                'item_rate' => $value['rate'],
                'item_per' => $value['per'],
                'item_rate_per_piece' => $value['rate_per_piece'],
                'item_amount' => $value['amount'],
                'created_at' => Carbon::now()
            ];

            TempBillProductsDetails::insert($bill_products);
        }


        return Response::json(["code" => 100, "message" => "Temporary Bill added successfully with invoice number " . $invoice . '.']);
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     * Sale Return Temporary Bill Post
     */
    public function temporaryBillSaleReturn(Request $request){
        $temp_data = $request->all();
        $id = $request->temp_bill_id;
        $invoice_no = $request->invoice_no;
        $salesReturntotalAmount = $request->salesReturntotalAmount;
        unset($temp_data['temp_bill_id']);
        unset($temp_data['invoice_no']);
        unset($temp_data['salesReturntotalAmount']);
        $tempbill = TempBill::find($id);

        $tempbill->saleReturn = $salesReturntotalAmount;
        $tempbill->is_sale_return = 1;
        $tempbill->updated_at = Carbon::now();
        $tempbill->save();
        foreach ($temp_data as $key => $value) {
            $bill_products = [
                'tempbill_id' => $tempbill->id,
                'item_name' => $value['products']['item_name'],
                'pcsboxincase' => $value['pcsboxincase'],
                'item_mrp' => $value['mrp'],
                'item_quantity' => $value['quantity'],
                'item_units' => $value['units'],
                'item_rate' => $value['rate'],
                'item_per' => $value['per'],
                'item_rate_per_piece' => $value['rate_per_piece'],
                'item_amount' => $value['amount'],
                'created_at' => Carbon::now()
            ];

            TempBillProductSaleReturn::insert($bill_products);
        }

        return Response::json(["code" => 100, "message" => "Temporary Bill sale return added successfully in invoice number " . $invoice_no . '.']);
    }

    /**
     * @param $slug
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Http\RedirectResponse|\Illuminate\View\View
     * Sale Return Temporary Bill Index
     */
    public function tempBillSaleReturn($slug){
        $salesreturntempbill = TempBill::where('slug',$slug)->with(['retailer','billProducts'])->first();
      if($salesreturntempbill == null){
          return back()->with('status', 100)->with('message', 'Temporary bill not found with this invoice number');
      }
      else{
          $staff = User::whereHas('roles', function ($q) {
              $q->where('name', 'field');
          })->get()->toArray();

          $products = TempBillItem::all();

          $retailers = TempBillRetailer::with('salesMan')->get();
          $salesreturntempbill->supplier_ref = $salesreturntempbill->retailer->salesMan;
          return view('Users.TempBill.salesreturn', compact('staff', 'products', 'retailers', 'salesreturntempbill'));
      }
    }

    public function addRetailer()
    {

    }

    public function addProduct()
    {

    }

    public function printBills()
    {
        return view('Users.TempBill.printbill');
    }


}
