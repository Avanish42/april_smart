<?php

namespace App\Http\Controllers\Apis;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;

class ApiPanelController extends Controller
{
    public function index()
    {
     return view('Api.apidetails');
    }

    public function currentAllocationForm(){
        $staff = User::whereHas('roles', function ($q) {
            $q->where('name', 'field');
        })->get()->toArray();
        return view('Api.field.currentallocationbydate',compact('staff'));
    }

    public function fieldStaffLoginForm(){
        return view('Api.field.fieldlogin');
    }

    public function updateBillForm(){
        return view('Api.field.updatebill');
    }

    public function billProductForm(){
        return view('Api.field.billproduct');
    }

    public function cashCollectionForm(){
        return view('Api.field.cashcollection');
    }

    public function getUserByIdForm(){
        return view('Api.field.userbyid');
    }

    public function checkRegisterForm(){
        $staff = User::whereHas('roles', function ($q) {
            $q->where('name', 'field');
        })->get()->toArray();
        return view('Api.field.checkregister',compact('staff'));
    }

    public function saleReturnForm(){
        return view('Api.field.salereturn');
    }

}
