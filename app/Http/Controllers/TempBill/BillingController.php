<?php

namespace App\Http\Controllers\TempBill;

use App\Model\TempBillItem;
use App\Model\TempBillRetailer;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
use Carbon\Carbon;


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
//        $
//        $tempbill = [
//
//        ]

        return \Response::json($request->all());
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
