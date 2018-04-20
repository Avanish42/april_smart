<?php

namespace App\Http\Controllers\TempBill;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;

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

//        $products =
      return view('Users.TempBill.tempbill',compact('staff'));

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
