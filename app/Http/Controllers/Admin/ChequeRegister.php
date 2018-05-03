<?php

namespace App\Http\Controllers\Admin;

use App\BounceChequeRegisterModel;
use App\ChequeRegisterModel;
use App\model\ClearedChequeRegister;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Response;
use App\model\ChequePenaltyModel;
use App\Model\Bank;


class ChequeRegister extends Controller
{


    public function index(){

        $temp_bank = Bank::all();
        $bank_name=array();
        foreach ($temp_bank as $k=>$v)
        {
            array_push($bank_name,$v->bank_name);
        }
        $cheques = ChequeRegisterModel::all();
        return view('Users.Cheque.cheque_register',compact('cheques','bank_name'));
    }

    public function chequeCompleted(){
//        $cheques = ChequeRegisterModel::all();
        $page = 'cheque-completed';
        $penalties = ChequePenaltyModel::all();
        return view('Users.Cheque.cheque_completed',compact('cheques','penalties','page'));
    }

    public function chequeCompletedPost(Request $request){
//        dd($request->all());
        $columns = array(
            0 =>'created_at',
            1 =>'retailer_name',
            2=> 'cheque_number',
            3=> 'Cheque_Date',
//            4=> 'cheque_amount',
            5=> 'bank_name',
            6=> 'amount',
            7=> 'billno',
            8=> 'allocationNo',
            9=> 'remark',
        );
        $totalData = ChequeRegisterModel::Completed()->Cleared()->UnBounced()->count();
        $totalFiltered = $totalData;
        $limit = $request->input('length');
        $start = $request->input('start');
        $order = $columns[$request->input('order.0.column')];
        $dir = $request->input('order.0.dir');

        if(empty($request->input('search.value')))
        {
            if($limit == -1){
                $cheques = ChequeRegisterModel::Completed()->Cleared()->UnBounced()->orderBy($order, $dir)->get();
            }
            else {
                $cheques = ChequeRegisterModel::Completed()->Cleared()->UnBounced()->offset($start)->limit($limit)
                    ->orderBy($order, $dir)->get();
            }
        }
        else {
            $search = $request->input('search.value');

            if($limit == -1){
                $cheques =  ChequeRegisterModel::Completed()->Cleared()->UnBounced()
                    ->SearchCheque($search)
                    ->offset($start)
                    ->get();
            }
            else{
                $cheques =  ChequeRegisterModel::Completed()->Cleared()->UnBounced()
                    ->SearchCheque($search)
                    ->offset($start)
                    ->limit($limit)
                    ->orderBy($order,$dir)
                    ->get();
            }


            $totalFiltered = ChequeRegisterModel::Completed()->Cleared()->UnBounced()
                ->SearchCheque($search)->count();
        }

        $data = array();
        if(!empty($cheques))
        {
            foreach ($cheques as $cheque)
            {
               $nestedData['created_at'] = date('d-M-Y',strtotime($cheque->created_at));
                $nestedData['retailer_name'] = $cheque->retailer_name;
                $nestedData['cheque_number'] = $cheque->cheque_number;
                $nestedData['Cheque_Date'] = $cheque->Cheque_Date;
//                $nestedData['cheque_amount'] = $cheque->cheque_amount;
                $nestedData['bank_name'] = $cheque->bank->bank_name;
                $nestedData['amount'] = $cheque->amount;
                $nestedData['billno'] = $cheque->billno;
                $nestedData['allocationNo'] = $cheque->allocationNo;
                $nestedData['remark'] = $cheque->remark;
                $nestedData['action'] = "<input type='button' value='Bounce' id='chequeBounce' data-react-id='{$cheque->id}' >";
                $data[] = $nestedData;
            }

        }

        $json_data = array(
            "draw"            => intval($request->input('draw')),
            "recordsTotal"    => intval($totalData),
            "recordsFiltered" => intval($totalFiltered),
            "data"            => $data
        );
        return Response::json($json_data);
    }

    public function completeRegisteredCheck(Request $request){
        $this->validate($request,[
            'cheque_number' => 'required',
            'Cheque_Date' => 'required',
            'bank_name' => 'required',
        ]);

        $bank = Bank::where('bank_name',$request->bank_name)->first();
        if($bank  != null){
            $bank_id = $bank->id;
        }
        else{
            $bank_id = Bank::insertGetId(['bank_name'=>$request->bank_name]);
        }

        $cheque = ChequeRegisterModel::find($request->id);
        $cheque->cheque_number = $request->cheque_number;
        $cheque->Cheque_Date = $request->Cheque_Date;
        $cheque->bank_id = $bank_id;
        $cheque->is_completed = 1;
        $cheque->is_cleared = 1;
        $cheque->save();

        return back()->with('status', 100)->with('message', 'Cheque Completed Successfully.');


    }

    public function bounceCheque($id){
        $cheque = ChequeRegisterModel::find($id);


        //bounce check field assignments
        $bounce_check = new BounceChequeRegisterModel();
        $bounce_check->register_cheque_id = $cheque->id;
        $bounce_check->Cheque_Date = $cheque->Cheque_Date;
        $bounce_check->retailer_name = $cheque->retailer_name;
        $bounce_check->cheque_number = $cheque->cheque_number;
        $bounce_check->bank_name = $cheque->bank_name;
        $bounce_check->amount = $cheque->amount;
        $bounce_check->billno = $cheque->billno;
        $bounce_check->allocationNo = $cheque->allocationNo;

        $bounce_check->save();

        //register check assignments
        $cheque->is_bounce	= 1;
        $cheque->save();

        return Response::json(array("code" => 100, "message" => "Cheque Bounce record added successfully you can add Penalty now on Penalty Section"));

    }

    public function clearedCheque($id){
        $cheque = ChequeRegisterModel::find($id);

        //bounce check field assignments
        $bounce_check = new ClearedChequeRegister();
        $bounce_check->register_cheque_id = $cheque->id;
        $bounce_check->Cheque_Date = $cheque->Cheque_Date;
        $bounce_check->retailer_name = $cheque->retailer_name;
        $bounce_check->cheque_number = $cheque->cheque_number;
        $bounce_check->bank_name = $cheque->bank_name;
        $bounce_check->amount = $cheque->amount;
        $bounce_check->billno = $cheque->billno;
        $bounce_check->allocationNo = $cheque->allocationNo;
        $bounce_check->save();

        //register check assignments
        $cheque->is_cleared	= 1;
        $cheque->save();

        return Response::json(array("code" => 100, "message" => "Cheque Cleared record added successfully."));

    }
}
