<?php

namespace App\Http\Controllers\TempBill;

use App\Model\AddPurchaseProduct;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
use App\Model\TempBillItem;
use App\Model\TempBillRetailer;
use Carbon\Carbon;
use Response;

class AddPurchase extends Controller
{

    public function index()
    {
        $staff = User::whereHas('roles', function ($q) {
            $q->where('name', 'field');
        })->get()->toArray();

        $products = TempBillItem::all();

        $retailers = TempBillRetailer::with('salesMan')->get();
        $invoice_no = 'AP-'.Carbon::now()->timestamp;
        return view('Users.AddPurchase.addpurchase',compact('staff','products','retailers','invoice_no','tempproducts'));
    }

    public function addPurchaseCreate(Request $request){
        $temp_data = $request->all();

        $retailer = $request->retailer;
        $invoice = $request->invoice;
        unset($temp_data['retailer']);
        unset($temp_data['invoice']);
        unset($temp_data['totalAmount']);
        $tempbill = [
            'add_purchase_uid'=>$invoice,
            'retailer_id'=>$retailer['id'],
            'bill_amount'=>$request->totalAmount,
            'created_at' => Carbon::now()
        ];

        $addpurchase_id = \App\Model\AddPurchase::insertGetId($tempbill);
        foreach ($temp_data as $key => $value){
            $bill_products = [
                'add_purchase_id' => $addpurchase_id,
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

            AddPurchaseProduct::insert($bill_products);
        }

        return Response::json(["code" => 100, "message" => "Add Purchase added successfully with uuid ".$invoice.'.']);
    }
}
