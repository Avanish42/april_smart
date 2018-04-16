<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\model\Bill;
use App\model\ChequePenaltyModel;


class ChequePenalty extends Controller
{
    //

    public function index()
    {
        $penalty=ChequePenaltyModel::all()->toArray();
        return view('Penalty.cheque.show' ,compact('penalty'));
    }

    public function add()
    {
        return view('Penalty.cheque.add');

    }
    public function store(Request $request)
    {
        //dd($request->toArray());

        $role= new ChequePenaltyModel();
        $role->name =$request->name;
        $role->amount =$request->amount;
        $role->description=$request->description;
        $role->save();
        return back()->with('returnStatus', true)->with('status', 101)->with('message', 'Cheque Penalty Added')->with("dummy data");

    }
    public function edit()
    {


    }
    public function update()
    {

    }
    public function delete()
    {

    }

}
