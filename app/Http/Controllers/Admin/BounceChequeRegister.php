<?php

namespace App\Http\Controllers\Admin;

use App\BounceChequeRegisterModel;
use App\Model\BounceChequeAllocation;
use App\model\ChequePenaltyModel;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Response;

class BounceChequeRegister extends Controller
{

    public function index()
    {
        $penalties = ChequePenaltyModel::all();
        $uncleared_check_without_penalty = BounceChequeRegisterModel::where('is_cleared_now',0)->where('penalty_id',null)->get();
        $uncleared_check_with_penalty = BounceChequeRegisterModel::where('is_cleared_now',0)->where('penalty_id','!=',null)->get();
        return view('Users.Cheque.cheque_bounce',compact('uncleared_check_without_penalty','penalties','uncleared_check_with_penalty'));
    }

    public function getPenaltyDetails($id)
    {
        $penalty = ChequePenaltyModel::find($id);
         return Response::json($penalty);

    }

    public function updateBounceCheck(Request $request){
        $this->validate($request,[
            'penalty_id' => 'required',
        ]);

        $cheque = BounceChequeRegisterModel::find($request->id);
        $cheque->remark = $request->remark;
        $cheque->penalty_id = $request->penalty_id;
        $cheque->save();

        $insertArray = [
            'bounce_cheque_register_id' => $request->id,
            'Cheque_Date' => $cheque->Cheque_Date,
            'retailer_name' => $cheque->retailer_name,
            'cheque_number' => $cheque->cheque_number,
            'bank_name' => $cheque->bank_name,
            'amount' => $cheque->amount,
            'billno' => $cheque->billno,
            'bill_allocation_no' => $cheque->allocationNo,
            'created_at' => Carbon::now()
        ];

        BounceChequeAllocation::insert($insertArray);

        return redirect('/cheque-bounce')->with('status', 100)->with('message', 'Penalty added Successfully.');
    }


    public function pendingBounceCheque(){
        $uncleared_check_with_penalty = BounceChequeRegisterModel::where('is_cleared_now',0)->where('penalty_id','!=',null)->get();
        return view('Users.Cheque.pending_bounce_cheque',compact('uncleared_check_with_penalty'));
    }


}
