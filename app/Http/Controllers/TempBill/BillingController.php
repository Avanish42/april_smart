<?php

namespace App\Http\Controllers\TempBill;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class BillingController extends Controller
{
    //

    public function index()
    {
        return view('Users.TempBill.billing');
    }

    public function tempBill()
    {
        //dd("test");
      return view('Users.TempBill.tempbill');

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
