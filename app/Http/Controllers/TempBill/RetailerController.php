<?php

namespace App\Http\Controllers\TempBill;

use App\Model\TempBillRetailer;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Carbon\Carbon;

class RetailerController extends Controller
{

    public function addRetailer( Request $request)
    {
        $this->validate($request,[
            'retailer_name' => 'required',
            'beat' => 'required',
            'salesman' => 'required',
        ]);

        $insert = ['retailer_name'=>$request->retailer_name,
            'beat'=>$request->beat,
            'salesman_id'=>$request->salesman,
            'created_at'=>Carbon::now()];

        TempBillRetailer::insert($insert);

        return back()->with('status', 100)->with('message', 'Retailer added successfully.');
    }
}
