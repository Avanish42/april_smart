<?php

namespace App\Http\Controllers\Admin;
use App\model\Bill;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Http\Response;

class CashierController extends Controller
{
    public function cashierDashboard(){
        $allocationNo = Bill::select('allocationNo')->distinct()->get();
        $bills = Bill::select('billNo')->where('allocationNo', '!=','')->get();
//        $billsdata=Response::json($bills);
        $billarray=array();
        foreach ($bills as $k=>$v) {
            if(in_array($v->billNo,$billarray))
            {
                continue;
            }

            array_push($billarray, $v->billNo);
        }
        $allocations = Bill::select('allocationNo')->get();
        $allocationarray=array();
        foreach ($allocations as $k=>$v)
        {
            if(in_array($v->allocationNo,$allocationarray))
            {
                continue;
            }
            else
            {
                array_push($allocationarray,$v->allocationNo);
            }
        }
        return view('Users.Cashier.cashierdashboard',compact('allocationNo','bills','billarray','allocationarray'));
    }


}
