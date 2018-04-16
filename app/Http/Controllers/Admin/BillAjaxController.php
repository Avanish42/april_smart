<?php

namespace App\Http\Controllers\Admin;

use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Response;
use App\model\Bill;
use App\User;
use Illuminate\Support\Facades\DB;
use View;

class BillAjaxController extends Controller
{
    //
    public function allocateBillsByAjax(Request $request)
    {

        $temp_data = $request->all();

//                echo $request->billTo;
//                echo $temp_data['allocationno'];
//            die();
        unset($temp_data['_token']);

        if ($request->billTo != null)
        {

            $billTo = $request->billTo;
            unset($temp_data['billTo']);
            unset($temp_data['billno']);
        }

        if ($request->billFrom != null)
        {
            $billfrom = $request->billFrom;
            unset($temp_data['billFrom']);
        }
        if ($request->billno != null) {
            $billTo = $request->billno;
            unset($temp_data['billno']);
            unset($temp_data['billFrom']);
            unset($temp_data['billTo']);
        }

        if ($request->allocationno != null) {
            $allocationno = $request->allocationno;
            unset($temp_data['allocationno']);
            unset($temp_data['billno']);
            unset($temp_data['billFrom']);
            unset($temp_data['billTo']);
        }
//
//        if($request->billTo)
//        {
//            return Response::json(array("code" => 400, "message" => "Bill Found"));
//
//        }
//        echo "<pre>";
//        print_r($temp_data);
//        die();

        if($request->billno xor ($request->billFrom  && $request->billTo ))//all select
        {
//            return Response::json(array("code" => 100, "message" => "can upload bills"));
            if (count($temp_data) == 0) {
                return Response::json(array("code" => 400, "message" => " please seect employee"));
            }

            if($request->billFrom  && $request->billTo)
            {
                $billupdate=Bill::whereBetween('billNo', [$request->billTo,$request->billFrom])->get();
//                    dd($billupdate->toArray());
//                    $users = User::where('billNo', '>=', '$request->billTo')->get();
                foreach ($billupdate as $bills) {
                    $bills->allocationNo = $request->allocationno;
                    $bills->save();

                    foreach ($temp_data as $emp => $valemp) {

                        $savearray = [
                            'user_id' => $valemp,
                            'bill_id' => $bills->id,
                            'created_at' => Carbon::now()
                        ];

//                                                    echo "<pre>";
//                                                    print_r($savearray);
                        $insert = DB::table('user_bill')->insert($savearray);
                    }

                }


            }
            if($request->billno)
            {
                $billupdate=Bill::where('billNo', $request->billno)->get();

                $billupdate->allocationNo = $request->allocationno;
                $billupdate->save();
                foreach ($temp_data as $emp => $valemp) {

                    $savearray = [
                        'user_id' => $valemp,
                        'bill_id' => $bills->id,
                        'created_at' => Carbon::now()
                    ];
                    $insert = DB::table('user_bill')->insert($savearray);
                }

            }

//            return Response::json(array("code" => 100, "message" =>" all done" ,'allocatedData'=>$allocatedData));
            $currentSupply=Bill::where('allocationNo',$request->allocationno)->where('isPast',0)->get();
            return Response::json(View::make('Users.Manager.partialcurrentallocation', array('currentSupply' => $currentSupply))->render());




        }
        else
        {
            return Response::json(array("code" => 400, "message" => " Blank Please select either single bill or set of bill"));

        }

//        return $request->json();

    }


    public function removeCurrentAllocationByAjax(Request $request)
    {
        $temp_data=$request->all();
        // echo $temp_data['id'];
        // array('status' => 2)
        $status=Bill::where('id',$request->id)->update(array('allocationNo'=>''));
        DB::table('user_bill')->where('bill_id','=',$request->id )->delete();


        $currentSupply=Bill::where('allocationNo',$request->allocationno)->get();
        return Response::json(View::make('Users.Manager.partialcurrentallocation',array('currentSupply' => $currentSupply))->render());

        //echo "status".$status;

        //die();


    }
public function removePastAllocationByAjax(Request $request)
    {
        $temp_data=$request->all();

   //     dd($temp_data);
        // echo $temp_data['id'];
//        array('status' => 2)
        $status=Bill::where('id',$request->id)->delete();
        DB::table('user_bill')->where('bill_id','=',$request->id )->delete();


    $pastSupply=Bill::where('allocationNo',$request->allocation)->where('isPast',1) ->get();
    return Response::json(View::make('Users.Manager.partialPastAllocation',array('pastSupply' => $pastSupply))->render());

        //echo "status".$status;

        //die();


    }

    public function addPastAllocationByAjax(Request $request)
    {
        $temp_data = $request->all();
        $allocationno = $request->allocationno;
        $pastbill = $request->pastBill;
        unset($temp_data['_token']);
        unset($temp_data['allocationno']);
        unset($temp_data['pastBill']);

        if(!$request->pastBill)
        {
            return Response::json(array("code" => 400, "message" => "please select the bill"));

        }
        if(count($temp_data) == 0)
        {
            return Response::json(array("code" => 400, "message" => "please select the employee"));

        }

        $checkbill= Bill::where('billNo',$request->pastBill)->where('allocationNo',$request->allocationno)->first();

        if($checkbill)
        {
            return Response::json(array("code" => 400, "message" => " Bill Already added in past bill "));

        }





        if ($request->allocationno != null) {
            $allocationno = $request->allocationno;
            unset($temp_data['allocationno']);
            unset($temp_data['pastBill']);
            //unset($temp_data['billFrom']);
            //unset($temp_data['billTo']);
            unset($temp_data['_token']);
        }

         $bill=Bill::where('billNo',$request->pastBill)->orderBy('updated_at','desc')->first();
         //   dd($bill);
       // $bill->id="";
        $newBill= $bill->toArray();
        unset($newBill['id']);
        $newBill['updated_at']=Carbon::now();
        $newBill['allocationNo']=$request->allocationno;
        $newBill['isPast']=1;
        $newBill['updated_at'] = null;
        $newBill['created_at'] = Carbon::now();
//             $newBill= $bill;
//             unset($newBill->id);
             $billid=Bill::insertGetId($newBill);
        foreach ($temp_data as $emp => $valemp) {
            $savearray = [
                'user_id' => $valemp,
                'bill_id' => $billid,
                'updated_at' => Carbon::now()
            ];
            $insert = DB::table('user_bill')->insert($savearray);
        }
        $test=Bill::where('billNo',$request->pastBill)->get();



        $pastSupply=Bill::where('allocationNo',$request->allocationno)->where('isPast',1)->get();

        return Response::json(View::make('Users.Manager.partialPastAllocation', array('pastSupply' => $pastSupply))->render());




    }

    public function sendNotificationToField(Request $request){
        foreach ($request->id as $key_id => $value_id){
            $field = User::find($value_id);
            $this->sendFCMMessage($field->device_token);
        }

        return Response::json(array("code" => 100, "message" => "All bill added to selected field staff successfully"));
    }

    function sendFCMMessage($machine_token){


        #API access key from Google API's Console
        define( 'API_ACCESS_KEY', 'AAAANC1n1GM:APA91bH7ZtlD4xBqb2-6vX3GHf9oeyq3wlqqDXhBXgoKHYyWcYy_qucAHL1BNbC-NFP2zFH5Hi2EAPJOoD6_czuUMWfYHSpiSEcxzhfPRweg-5OEBOBUQ6OPZP2aXfC6EKtU9HkKDoz3' );
        $registrationIds =  "e41MLwJJhX8:APA91bHnnHaodnjvMTsPNfV4bORyRXQDb3HVQ3Wjd5CP61PUsrVoQkIEnIeq6FDz7D7STMTfqok20-zf3oBOql5eImkkRlKdMyX7J8m_XX4ok0tlnwwnB7dqCiGEE5-ZV_-YQ3dmOaii";


        $msg = array
        (
            'body'  => 'notification discription',
            'title' => 'New Bills is added to you please it.'

        );

        $fields = array
        (
            'to'            => $registrationIds,
            'notification'  => $msg
        );


        $headers = array
        (
            'Authorization: key=' . API_ACCESS_KEY,
            'Content-Type: application/json'
        );
        #Send Reponse To FireBase Server
        $ch = curl_init();
        curl_setopt( $ch,CURLOPT_URL, 'https://fcm.googleapis.com/fcm/send' );
        curl_setopt( $ch,CURLOPT_POST, true );
        curl_setopt( $ch,CURLOPT_HTTPHEADER, $headers );
        curl_setopt( $ch,CURLOPT_RETURNTRANSFER, true );
        curl_setopt( $ch,CURLOPT_SSL_VERIFYPEER, false );
        curl_setopt( $ch,CURLOPT_POSTFIELDS, json_encode( $fields ) );
        $result = curl_exec($ch );
        curl_close( $ch );
        #Echo Result Of FireBase Server
//        echo $result;
    }
}
