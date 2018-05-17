<?php

namespace App\Http\Controllers\Apis;


use App\Billproduct;
use App\ChequeRegisterModel;
use App\Http\Controllers\Controller;
use App\model\Bill;
use App\model\CashCollection;
use App\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Response;
use Carbon\Carbon;

class Fieldstaff extends Controller
{



    public function login(Request $request)
    {

        $data = User::where('email', $request->email)->first();

        if (!$data) {
            $raw_data = array('status' => '0',
                'message' => 'email does not exit',
                "info" => ""
            );

        } elseif (Hash::check($request->password, $data->password)) {

            $datatemp = User::find($data->id);
            if($datatemp->hasRole('field')){
                $data->device_token = $request->device_token;

                $data->save();
                $raw_data = array('status' => '1',
                    'message' => 'login Successfully',
                    "info" => array($data)
                );
            }
            else{
                $raw_data = array('status' => '0',
                    'message' => 'Non Authorize person',
                    "info" => ""
                );
            }

        } else {
            $raw_data = array('status' => '0',
                'message' => 'password wrong',
                "info" => ""
            );
        }

        return Response::json($raw_data);


    }


    public function currentAllocationByDate(Request $request){

//        dd($request->all());
            $past_bills =   User::find($request->staff_id)->fieldTodayBills()->where('isPast',1)->get();
            $current_supply =   User::find($request->staff_id)->fieldTodayBills()->where('isPast',0)->get();
            $bounce_check_allocation_current =   User::find($request->staff_id)->fieldTodayBounceChecks()->with(['penalty','bank'])->where('isPast',0)->get();
            $bounce_check_allocation_past =   User::find($request->staff_id)->fieldTodayBounceChecks()->with(['penalty','bank'])->where('isPast',1)->get();
            $current_temporary_bill =   User::find($request->staff_id)->fieldTodayTemporaryBill()->with(['billProducts','saleReturns','retailer'])->get();

                if($current_supply->count() > 0 || $past_bills->count() > 0 || $bounce_check_allocation_current->count() > 0 || $bounce_check_allocation_past->count() > 0){

                        $returndata = [
                            'status' => '1',
                            'message' => 'Allocations found',
                            'info' => [
                                'current_bills' =>$current_supply,
                                'past_bills' =>$past_bills,
                                'current_bounce_check' =>$bounce_check_allocation_current,
                                'past_bounce_check' =>$bounce_check_allocation_past,
                                'current_temporary_bill' =>$current_temporary_bill,
                            ]
                        ];

                }
                else{
                    $returndata = [
                        'status' => '0',
                        'message' => ' Allocations not found',
                        'info' => [
                            'current_bills' =>$current_supply,
                            'past_bills' =>$past_bills,
                            'current_bounce_check' =>$bounce_check_allocation_current,
                            'past_bounce_check' =>$bounce_check_allocation_past,
                            'current_temporary_bill' =>$current_temporary_bill,
                        ]

                    ];
                }
            return Response::json($returndata);
        }

        public function updateBillById(Request $request){
            $temp = $request->all();
            $temp['updated_at'] = Carbon::now();
            Bill::where('id',$request->id)->update($temp);
            $returndata = Bill::find($request->id);
            $raw_data = array('status' => '1',
                'message' => 'Bill updated succefully',
                "info" => $returndata
            );
            return Response::json($raw_data);
        }

        public function billProduct(Request $request){
            $bill = Billproduct::where('salesInvoiceNumber',$request->billno)->get();

             if($bill->count() > 0){
                 $raw_data = array('status' => '1',
                     'message' => 'Bill Product found',
                     "info" => $bill
                 );
             }
             else{
                 $raw_data = array('status' => '0',
                     'message' => 'Bill Product not found',
                     "info" => array()
                 );
             }
            return Response::json($raw_data);
        }

        public function cashCollection(Request $request){
            try{

                $temp = $request->all();
                $temp['created_at'] = Carbon::now();
                $id = CashCollection::insertGetId($temp);
                $data = CashCollection::find($id);
                $raw_data = array('status' => '1',
                    'message' => 'Cash added successfully',
                    "info" => $data
                );
                return Response::json($raw_data);
            }
            catch (\Exception $exception){
                return ['code' => 503, 'message' => $exception->getMessage()];
            }
        }

        public function checkRegister(Request $request){
            try{
               $temp = $request->all();
                $temp['created_at'] = Carbon::now();
                $id = ChequeRegisterModel::insertGetId($temp);
                $data = ChequeRegisterModel::find($id);
                $raw_data = array('status' => '1',
                    'message' => 'Check Register successfully',
                    "info" => $data
                );
                return Response::json($raw_data);
            }
            catch (\Exception $exception){
                return Response::json(['status' => '0', 'message' => $exception->getMessage(),'info'=>array()]);
            }
        }

        public function saleReturn(Request $request){
            dd($request->all());
        }

}
