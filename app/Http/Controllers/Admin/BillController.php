<?php

namespace App\Http\Controllers\Admin;

use App\Billproduct;
use App\Model\TempBill;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Session;
use Mockery\Exception;
use Maatwebsite\Excel\Facades\Excel;
use App\model\Bill;
use App\User;
use Illuminate\Support\Facades\DB;
use View;
use App\Model\BounceChequeAllocation;

class BillController extends Controller
{
    //
    public function add(Request $request)
    {
        //print_r($request);
        try {
            echo "add";
        } catch (\Exception $exception) {
            echo $exception->getMessage();
        }
    }

    public function managerDashboard()
    {
        return view('Users.Manager.managerdashboard');
    }

    public function uploadBeat(Request $request)
    {
        $temp_data = $request->all();
         if ($request->hasFile('beat_file')) {

            $uploadedBillno = "";

            $path = $request->file('beat_file')->getRealPath();

            $data = Excel::load($path, function ($reader) {
            })->get();

            if (!empty($data) && $data->count()) {

                foreach ($data->toArray() as $key => $v) {
                    if (!empty($v)) {

                        foreach ($v as $value) {
                            $bill = Bill::where('billNo', $value['bill_number'])->update(['beat' => $value['route']]);
                       }
                    }
                }

                return back()->with('status', 100)->with('message', 'Successfully but these bill no alredy exists .' . $uploadedBillno);

            }
        }
    }

    public function createAllocationNo()
    {
        $last_bill = Bill::orderBy('created_at', 'desc')->first();

//          dd($last_bill);

        if ($last_bill != null) {
            $date = date("dmY");
            $str = strpos($last_bill->allocationNo, $date);
            if ($str) {
                $string = $last_bill->allocationNo;
                $exploded = explode('-', $string);
                $lastvalstr = end($exploded);
                $lastvalstr = (int)$lastvalstr;
                $lastvalstr = $lastvalstr + 1;
                // dd($lastvalstr);
                $allocationno = (config('app.company_name') . "-" . date("dmY") . "-" . $lastvalstr);
            } else {
                $allocationno = (config('app.company_name') . "-" . date("dmY") . "-1");
            }
        } else {
            $allocationno = (config('app.company_name') . "-" . date("dmY") . "-1");
        }

        Session::put('allocationno', $allocationno);
        return redirect('uploadbill');
    }

    public function uploadBill()
    {
        if (session('allocationno') && session('allocationno') != null) {
            $staff = User::whereHas('roles', function ($q) {
                $q->where('name', 'field');
            })->get()->toArray();

            $allocation_no = Session::get('allocationno');

            $currentSupply = Bill::ByAllocationNo($allocation_no)->IsPastFalse()->get();
            $pastSupply = Bill::ByAllocationNo($allocation_no)->IsPastTrue()->get();

            $Unallocateddata = Bill::select('billNo')->where('allocationNo', '')->get();

            $Passbillsdata = Bill::select('billNo')->where('allocationNo', '!=', '')->get();
            $uncleared_check_with_penalty = BounceChequeAllocation::select('cheque_number')->where('isAllocated', 0)->where('isPast', 0)->get();
            $temporary_bill = TempBill::select('invoice_no')->where('allocationNo', null)->orWhere('allocationNo', '')->get();
            $UnallocatedBills = array();
            $UnallocatedCheques = array();
            foreach ($Unallocateddata as $k => $v) {
                array_push($UnallocatedBills, $v->billNo);
            }
            foreach ($uncleared_check_with_penalty as $k => $v) {
                array_push($UnallocatedCheques, $v->cheque_number);
            }

            $pastallocationBills = array();
            foreach ($Passbillsdata as $k => $v) {
                array_push($pastallocationBills, $v->billNo);
            }
            return view('Users.Manager.allocation', compact('staff', 'currentSupply', 'UnallocatedBills', 'pastallocationBills', 'pastSupply', 'UnallocatedCheques', 'temporary_bill'));
        } else {
            return redirect('manager-dashboard');
        }
        //$staff= User::all();

    }


    /**
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     * Bounce Check Allocation
     */
    public function bounceCheckAllocation(Request $request)
    {
        $temp_data = $request->all();
        $bounce_check = $request->bounce_cheque;
        $alocationno = $request->allocationno;
        if ($request->bounce_cheque == '' || $request->bounce_cheque == null) {
            return Response::json(['code' => 400, 'message' => 'Please select cheque']);
        }
        unset($temp_data['_token']);
        unset($temp_data['bounce_cheque']);
        unset($temp_data['allocationno']);
        if (count($temp_data) == 0) {
            return Response::json(['code' => 400, 'message' => 'Please select employee to allocated cheque']);
        }

        $check = BounceChequeAllocation::where('cheque_number', $bounce_check)->first();
        if ($check == null) {
            return Response::json(['code' => 400, 'message' => 'Entered check number not found please enter valid bounce regitered check number']);
        }

        $check->allocationNo = $alocationno;
        $check->save();
        foreach ($temp_data as $value) {
            $savearray = [
                'user_id' => $value,
                'bounce_cheque_allocation_id' => $check->id,
                'created_at' => Carbon::now()
            ];

            $insert = DB::table('user_cheque')->insert($savearray);
        }

        $bounce_check_allocations = BounceChequeAllocation::where('allocationNo', $alocationno)->with('bank')->with('penalty')->get();
        return Response::json(View::make('Users.Manager.partialbouncechequeallocation', array('bounce_check_allocations' => $bounce_check_allocations))->render());
    }


    public function temporaryBillAllocation(Request $request)
    {

        $temp_data = $request->all();
        $temp_bill = $request->temp_bill;
        $alocationno = $request->allocationno;
        if ($request->temp_bill == '' || $request->temp_bill == null) {
            return Response::json(['code' => 400, 'message' => 'Please select any temporary bill']);
        }
        unset($temp_data['_token']);
        unset($temp_data['temp_bill']);
        unset($temp_data['allocationno']);
        if (count($temp_data) == 0) {
            return Response::json(['code' => 400, 'message' => 'Please select employee to allocated cheque']);
        }

        $check = TempBill::where('invoice_no', $temp_bill)->first();
        if ($check == null) {
            return Response::json(['code' => 400, 'message' => 'Entered Tempbill number not found please enter valid Temporary Bill number']);
        }

        $check->allocationNo = $alocationno;
        $check->save();
        foreach ($temp_data as $value) {
            $savearray = [
                'user_id' => $value,
                'tempbill_id' => $check->id,
                'created_at' => Carbon::now()
            ];

            $insert = DB::table('user_tempbill')->insert($savearray);
        }

        $tempbills = TempBill::where('allocationNo', $alocationno)->with('retailer')->get();
        return Response::json(View::make('Users.Manager.tempbillallocation', array('tempbills' => $tempbills))->render());

    }

    public function removeAllocatedTempBill(Request $request)
    {

        $tempbill = TempBill::find($request->id);

        $tempbill->allocationNo = '';
        $tempbill->save();
    }

    /**
     * @param Request $request
     * @return mixed
     * Allocate Bill or series of bill
     */
    public function allocateBillsByAjax(Request $request)
    {
        $temp_data = $request->all();

        unset($temp_data['_token']);

        if ($request->billTo != null) {

            $billTo = $request->billTo;
            unset($temp_data['billTo']);
            unset($temp_data['billno']);
        }

        if ($request->billFrom != null) {
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


        if ($request->billno xor ($request->billFrom && $request->billTo))//all select
        {


            if (count($temp_data) == 0) {
                return Response::json(array("code" => 400, "message" => "Please select Employee"));
            }

            if ($request->billFrom && $request->billTo) {
                $billupdate = Bill::whereBetween('billNo', [$request->billTo, $request->billFrom])->get();
                foreach ($billupdate as $bills) {
                    $bills->allocationNo = $request->allocationno;
                    $bills->save();

                    foreach ($temp_data as $emp => $valemp) {

                        $savearray = [
                            'user_id' => $valemp,
                            'bill_id' => $bills->id,
                            'created_at' => Carbon::now()
                        ];
                        $insert = DB::table('user_bill')->insert($savearray);
                    }

                }


            }
            if ($request->billno) {
                $billupdate = Bill::where('billNo', $request->billno)->first();

                $billupdate->allocationNo = $request->allocationno;

                $billupdate->save();
                foreach ($temp_data as $emp => $valemp) {

                    $savearray = [
                        'user_id' => $valemp,
                        'bill_id' => $billupdate->id,
                        'created_at' => Carbon::now()
                    ];
                    $insert = DB::table('user_bill')->insert($savearray);
                }

            }
            $currentSupply = Bill::where('allocationNo', $request->allocationno)->get();

            return Response::json(View::make('Users.Manager.partialcurrentallocation', array('currentSupply' => $currentSupply))->render());
        } else {
            return Response::json(array("code" => 400, "message" => " Blank Please select either single bill or set of bill"));

        }


    }


    /**
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     * Remove Main Allocation by Its Id
     */
    public function removeCurrentAllocationByAjax(Request $request)
    {
        $status = Bill::where('id', $request->id)->update(array('allocationNo' => ''));
        DB::table('user_bill')->where('bill_id', '=', $request->id)->delete();
        $currentSupply = Bill::where('allocationNo', $request->allocation)->get();
        return Response::json(View::make('Users.Manager.partialcurrentallocation', array('currentSupply' => $currentSupply))->render());
    }


    public function storeBill(Request $request)
    {
        $temp_data = $request->all();
        unset($temp_data['_token']);
        if ($request->hasFile('upload')) {
            unset($temp_data['upload']);
            $csvfile = $request->file('upload');
        }

        if ($request->billTo != null) {
            $billTo = $request->billTo;
            unset($temp_data['billTo']);
            unset($temp_data['billno']);
        }

        if ($request->billFrom != null) {
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
        }

        if ($request->billno != null && ($request->billFrom != null || $request->billTo != null)) {
            return back()->with('status', 400)->with('message', 'Please select either single bill or set of bill');
        }

        //  set of bill
        if ($request->billTo != null && $request->billFrom != null && $request->billno == null) {
            if (count($temp_data) == 0) {
                return back()->with('status', 400)->with('message', 'Please select employee for allocate the bill');
            }
            if ($request->hasFile('upload')) {
                $path = $request->file('upload')->getRealPath();
                $data = Excel::load($path, function ($reader) {
                })->get();

                if (!empty($data) && $data->count()) {


                    $i = 0;
                    foreach ($data->toArray() as $key => $value) {
                        if (!empty($value)) {


                            foreach ($value as $k => $v) {

                                if ($v['bill_number'] >= $billTo && $v['bill_number'] <= $billfrom) {

                                    $bill = Bill::all();
                                    $bill->allocationNo = $allocationno;

                                    $bill->billNo = $v['bill_number'];
                                    $bill->retailerName = $v['retailer_name'];
                                    //  $bill->todayCollection= $v['bill_number'];
                                    $bill->delivaryStatus = $v['delivery_status'];
                                    $bill->salesMan = $v['salesman'];
                                    $bill->retailerHierarchy = $v['retailer_hierarchy_1'];
                                    $bill->billAmount = "20.3";
                                    $bill->retailerCode = $v['retailer_code'];
                                    $bill->retailerName = $v['retailer_name'];
                                    $bill->grossAmount = $v['gross_amount'];
                                    $bill->schemeDiscount = $v['scheme_disc'];
                                    $bill->replacement = $v['replacement'];
                                    $bill->distributerDiscount = $v['distributor_discount'];
                                    $bill->cashDiscount = $v['cash_discount'];
                                    $bill->windowDisplay = $v['window_display'];
                                    $bill->taxAmount = $v['tax_amount'];
                                    $bill->debitAdjust = $v['debit_adjustment'];
                                    $bill->taxAdjust = $v['credit_adjustment'];
                                    $bill->netAmount = $v['net_amount'];

                                    $bill->save();
                                    foreach ($temp_data as $emp => $valemp) {

                                        $savearray = [
                                            'user_id' => $valemp,
                                            'bill_id' => $bill->id,
                                            'created_at' => Carbon::now()
                                        ];

//                                                    echo "<pre>";
//                                                    print_r($savearray);
                                        $insert = DB::table('user_bill')->insert($savearray);
                                    }


                                }


                            }

                        }
                    }
                    //   Session::forget('allocationno');
//                        $staff= User::whereHas('roles', function($q)
//                        {
//                            $q->where('name', 'field');
//                        })->get()->toArray();

//                        $currentSupply = Bill::where('allocationNo',$allocationno)->get();
//                        dd($currentSupply);
                    return redirect('uploadbill');
//                        return view('Users.Manager.allocation',compact('staff','currentSupply'));
//                        return back()->with('status', 100)    ->with('message', 'Bill allocated successfully');
                }
            } else {
                return back()->with('status', 400)->with('message', 'Please upload csv for bill');
            }

        } // single bill
        elseif ($request->billNo != null && $request->fromBill == null && $request->toBill == null) {

            if ($request->hasFile('upload')) {
                $path = $request->file('upload')->getRealPath();
                $data = Excel::load($path, function ($reader) {
                })->get();
                dd($data);
                if (!empty($data) && $data->count()) {
//                  dd($data->toArray());
                    $i = 0;
                    foreach ($data->toArray() as $key => $value) {
                        if (!empty($value)) {


                            foreach ($value as $k => $v) {


                                $bill = new Bill();
                                $bill->allocationNo = (config('app.company_name') . "-" . date("dmY") . "-" . $i++);

                                $bill->billNo = $v['bill_number'];
                                $bill->retailerName = $v['retailer_name'];
                                //  $bill->todayCollection= $v['bill_number'];
                                $bill->delivaryStatus = $v['delivery_status'];
                                $bill->salesMan = $v['salesman'];
                                $bill->retailerHierarchy = $v['retailer_hierarchy_1'];
                                $bill->billAmount = "20.3";
                                $bill->retailerCode = $v['retailer_code'];
                                $bill->retailerName = $v['retailer_name'];
                                $bill->grossAmount = $v['gross_amount'];
                                $bill->schemeDiscount = $v['scheme_disc'];
                                $bill->replacement = $v['replacement'];
                                $bill->distributerDiscount = $v['distributor_discount'];
                                $bill->cashDiscount = $v['cash_discount'];
                                $bill->windowDisplay = $v['window_display'];
                                $bill->taxAmount = $v['tax_amount'];
                                $bill->debitAdjust = $v['debit_adjustment'];
                                $bill->taxAdjust = $v['credit_adjustment'];
                                $bill->netAmount = $v['net_amount'];

                                $bill->save();
                                echo "<br>";
                                print_r($bill->toArray());

                            }

                        }
                    }
                }
            } else {
                return back()->with('status', 400)->with('message', 'Please upload csv for bill');
            }

        } // no bill
        else {
            return back()->with('status', 400)->with('message', 'Please select only one.');
        }


    }

    public function searchAllocation(Request $request)
    {
        $staff = User::whereHas('roles', function ($q) {
            $q->where('name', 'field');
        })->get()->toArray();
        $currentSupply = Bill::where('allocationNo', $request->allocation)->with('field')->get();

        if ($currentSupply->count() > 0) {

            return view('Users.Cashier.findAllocation', compact('currentSupply', 'staff'));
        } else {
            return back()->with('status', 400)->with('message', 'Allocation no does Not Exists.');
        }


    }

    public function searchBill(Request $request)
    {


        $billdata = Bill::where('billNo', $request->BillNo)->with('field')->get();
        $billproduct = Billproduct::where('salesInvoiceNumber', $request->BillNo)->get();

        if ($billdata) {
            return view('Users.Cashier.findBills', compact('billdata', 'billproduct'));
        } else {
            return back()->with('status', 400)->with('message', 'Bill No Not Found.');
        }


    }

    public function sheetUpload(Request $request)
    {

        $temp_data = $request->all();

        if ($request->hasFile('sheet')) {

            $uploadedBillno = "";

            $path = $request->file('sheet')->getRealPath();
            $data = Excel::load($path, function ($reader) {
            })->get();

            if (!empty($data) && $data->count()) {
                $data_array=$data->toArray();
                foreach ($data[0] as $key => $v) {
                    if (!empty($v)) {

                      //  dd($v);
                        if($key==0)
                        {
                            continue;
                        }
                        $bill = new Bill();
                        $bill->allocationNo = "";

                        $bill->billNo = $v['bill_number'];
                        if (Bill::where('billNo', $bill->billNo)->first()) {
                            $uploadedBillno .= " " . $bill->billNo . "<br>";
                            continue;
                        }

                        $bill->retailerName = !empty($v['retailer_name'])?$v['retailer_name']:"";

                        $bill->delivaryStatus = $v['delivery_status'];
                        $bill->salesMan = $v['salesman'];
                        $bill->retailerHierarchy = $v['retailer_hierarchy_1'];
                        $bill->billAmount = "20.3";
                        $bill->retailerCode = $v['retailer_code'];
                        $bill->retailerName = $v['retailer_name'];
                        $bill->grossAmount = $v['gross_amount'];
                        $bill->schemeDiscount = $v['scheme_disc'];
                        $bill->replacement = $v['replacement'];
                        $bill->distributerDiscount = $v['distributor_discount'];
                        $bill->cashDiscount = $v['cash_discount'];
                        $bill->windowDisplay = $v['window_display'];
                        $bill->taxAmount = $v['tax_amount'];
                        $bill->debitAdjust = $v['debit_adjustment'];
                        $bill->taxAdjust = $v['credit_adjustment'];
                        $bill->netAmount = $v['net_amount'];
                        $bill->created_at = Carbon::now();
                        $bill->updated_at = null;
                        $bill->save();
                    }
                }
                return back()->with('status', 100)->with('message', 'Successfully but these bill no alredy exists .' . $uploadedBillno);

            }


            return back()->with('status', 100)->with('message', 'Successfully.');


        } else {
            return back()->with('status', 400)->with('message', 'Bill No Not Found.');
        }


    }

    public function billDetailsUpload(Request $request)
    {
        ini_set('max_execution_time', 600);
        $temp_data = $request->all();



        if ($request->hasFile('billdetails')) {

            $uploadedBillno = "";

            $path = $request->file('billdetails')->getRealPath();
            $data = Excel::load($path, function ($reader) {
            })->get();

            if (!empty($data) && $data->count()) {


                $i = 0;
                        $data_array=$data->toArray();
                    foreach ($data_array[0] as $k => $v) {
                    if (!empty($v)) {

  //                              dd($value);
//                        foreach ($value as $k => $v) {

                            // if ($v['bill_number'] >= $billTo && $v['bill_number'] <= $billfrom) {

                            if($k==0)
                            {
                                continue;
                            }

                               //  dd($v);
                                    $bill = new Billproduct();

                            $bill->salesMan = $v['salesman'];
                            $bill->retailerHierarchy = $v['retailer_hierarchy_1'];
                            $bill->retailerCode = $v['retailer_code'];
                            $bill->retailerName = $v['retailer_name'];
                            $bill->Address = $v['address_1'];
                            $bill->salesInvoiceNumber = $v['sales_invoice_number'];
                            $bill->salesInvoiceDate = $v['sales_invoice_date'];
                            $bill->actualDeliveryDate = $v['actual_delivery_date'];
                            $bill->deliveryStatus = $v['delivery_status'];
                            $bill->brandCaption = $v['brand_caption'];
                            $bill->distProductCode = $v['company_product_code'];
                            $bill->motherPackName = !empty($v['mother_pack_name'])?$v['mother_pack_name']:'';
                            $bill->productName = $v['product_name'];
                            $bill->Batch = $v['batch'];
                            $bill->MRP = $v['mrp'];
                            $bill->sellingRate = $v['selling_rate'];
                            $bill->quantityBilled = $v['quantity_billed'];
                            $bill->grossAmount = $v['gross_amount'];
                            $bill->netAmount = $v['net_amount'];
                      //  dd($bill->toArray());
                           $bill->save();
////                                foreach ($temp_data as $emp => $valemp) {
////
////                                    $savearray = [
////                                        'user_id' => $valemp,
////                                        'bill_id' => $bill->id,
////                                        'created_at' => Carbon::now()
////                                    ];
//
////                                                    echo "<pre>";
////                                                    print_r($savearray);
//                            //  $insert = DB::table('user_bill')->insert($savearray);
//
//

                        }


                    }


                //   Session::forget('allocationno');
//                        $staff= User::whereHas('roles', function($q)
//                        {
//                            $q->where('name', 'field');
//                        })->get()->toArray();

//                        $currentSupply = Bill::where('allocationNo',$allocationno)->get();
//                        dd($currentSupply);
//                return redirect('uploadbill');

                return back()->with('status', 100)->with('message', 'Successfully but these bill no alredy exists .' . $uploadedBillno);

//                        return view('Users.Manager.allocation',compact('staff','currentSupply'));
//                        return back()->with('status', 100)    ->with('message', 'Bill allocated successfully');
            }


            return back()->with('status', 100)->with('message', 'Successfully.');


        } else {
            return back()->with('status', 400)->with('message', 'Bill No Not Found.');
        }


    }


    public function unallocatedBills()
    {
        $unallocatedBilldata = Bill::where('allocationNo', "")->get();
        $unassignedBills = Bill::where('allocationNo', '!=', "")->where('isAllocated', 0)->get();

        return view('Users.Manager.unallocated', compact('unallocatedBilldata', 'unassignedBills'));

    }


    public function BillNosearch()
    {
        $billdata = Bill::select('billNo')->distinct()->get();

        return Response::json($billdata);


    }

}
