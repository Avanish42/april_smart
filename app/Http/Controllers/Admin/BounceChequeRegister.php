<?php

namespace App\Http\Controllers\Admin;

use App\BounceChequeRegisterModel;
use App\Model\BounceChequeAllocation;
use App\model\ChequePenaltyModel;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Response;
use App\ChequeRegisterModel;


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

    public function bounceCheckRegisterPenalty(Request $request){
        $this->validate($request,[
            'penalty_id' => 'required',
        ]);
        $cheque = ChequeRegisterModel::find($request->id);

        //bounce check field assignments
        $bounce_check = new BounceChequeRegisterModel();
        $bounce_check->register_cheque_id = $cheque->id;
        $bounce_check->Cheque_Date = $cheque->Cheque_Date;
        $bounce_check->retailer_name = $cheque->retailer_name;
        $bounce_check->cheque_number = $cheque->cheque_number;
        $bounce_check->bank_id = $cheque->bank_id;
        $bounce_check->amount = $cheque->amount;
        $bounce_check->billno = $cheque->billno;
        $bounce_check->allocationNo = $cheque->allocationNo;
        $bounce_check->remark = $request->remark;
        $bounce_check->penalty_id = $request->penalty_id;
        $bounce_check->save();

        //register check assignments
        $cheque->is_bounce	= 1;
        $cheque->save();
        $insertArray = [
            'bounce_cheque_register_id' => $bounce_check->id,
            'Cheque_Date' => $cheque->Cheque_Date,
            'retailer_name' => $cheque->retailer_name,
            'cheque_number' => $cheque->cheque_number,
            'bank_id' => $cheque->bank_id,
            'amount' => $cheque->amount,
            'billno' => $cheque->billno,
            'bill_allocation_no' => $cheque->allocationNo,
            'created_at' => Carbon::now()
        ];

        BounceChequeAllocation::insert($insertArray);

        return redirect('/cheque-completed')->with('status', 100)->with('message', 'Penalty added Successfully.');

    }

    public function pendingBounceCheque(){
        $uncleared_check_with_penalty = BounceChequeRegisterModel::where('is_cleared_now',0)->where('entry_in_account',0)->where('penalty_id','!=',null)->get();
        return view('Users.Cheque.pending_bounce_cheque',compact('uncleared_check_with_penalty'));
    }

    public function entryInAcount(Request $request){
        $bounce_check = BounceChequeRegisterModel::find($request->bounce_check_id);
        $bounce_check->entry_in_account = 1;
        $bounce_check->save();
        $allocation_bounce = BounceChequeAllocation::where('bounce_cheque_register_id',$request->bounce_check_id)->first();
        if ($allocation_bounce != null){
            $allocation_bounce->entry_in_account = 1;
            $allocation_bounce->save();
        }
        return back()->with('status', 100)->with('message', 'Entry in Account Successfully.');
    }

    public function bounceCheque(Request $request){
        $acount_entry_cheque = BounceChequeRegisterModel::where('entry_in_account',1)->where('penalty_id','!=',null)->get();
        return view('Users.Cheque.check_account_entry',compact('acount_entry_cheque'));
    }

}
