<?php

namespace App\Http\Controllers\TempBill;

use App\Model\TempBill;
use App\Model\TempBillItem;
use App\Model\TempBillProductsDetails;
use App\Model\TempBillRetailer;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
use Carbon\Carbon;
use Response;

class BillingController extends Controller
{
    //

    public function index()
    {
        return view('Users.TempBill.billing');
    }

    public function tempBill()
    {
        $staff = User::whereHas('roles', function ($q) {
            $q->where('name', 'field');
        })->get()->toArray();

        $products = TempBillItem::all();
        $retailers = TempBillRetailer::with('salesMan')->get();
        $invoice_no = 'TEMP-'.Carbon::now()->timestamp;
      return view('Users.TempBill.tempbill',compact('staff','products','retailers','invoice_no'));

    }

    public function tempbillPost(Request $request){
        $temp_data = $request->all();
//        dd($temp_data);
        $retailer = $request->retailer;
        $invoice = $request->invoice;
             unset($temp_data['retailer']);
             unset($temp_data['invoice']);
             unset($temp_data['totalAmount']);
        $tempbill = [
            'invoice_no'=>$invoice,
            'retailer_id'=>$retailer['id'],
            'bill_amount'=>$request->totalAmount,
            'created_at' => Carbon::now()
        ];

        $temp_bill_id = TempBill::insertGetId($tempbill);
//        dd($temp_data);
        foreach ($temp_data as $key => $value){
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


        return Response::json(["code" => 100, "message" => "Temporary Bill added successfully with invoice number ".$invoice.'.']);
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
