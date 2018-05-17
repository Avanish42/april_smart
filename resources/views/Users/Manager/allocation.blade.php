
@extends('Users.userapp')
@section('pagetitle')
    Allocation
@endsection
@section('main-content')
    {{--<h1>this is section</h1>--}}
    <body data-open="hover" data-menu="horizontal-menu" data-col="2-columns" class="horizontal-layout horizontal-menu 2-columns   menu-expanded">

    <!-- navbar-fixed-top-->
    @include('Users.header')
    <!-- Horizontal navigation-->

    <div class="app-content content container-fluid">
        <div class="content-wrapper">
            <div class="content-header row">
                <div class="content-header-left col-md-6 col-xs-12 mb-2">
                    <h3 class="content-header-title mb-0">Bill Allocation By Manager</h3>
                    <div class="row breadcrumbs-top">
                        <div class="breadcrumb-wrapper col-xs-12">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="index.htm">Home</a></li>
                                <li class="breadcrumb-item"><a href="#">Bills Allocation</a></li>
                                <li class="breadcrumb-item active"><a href="#">Bill Allocation By Manager</a></li>
                            </ol>
                        </div>
                    </div>
                </div>

            </div>
            <div class="content-body"><!-- Basic form layout section start -->
                <section id="basic-form-layouts">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title" id="basic-layout-form">Bill Allocation By Manager</h4>
                            <a class="heading-elements-toggle"><i class="fa fa-ellipsis-v font-medium-3"></i></a>
                            <div class="heading-elements">
                                <ul class="list-inline mb-0">
                                    <li><a data-action="collapse"><i class="ft-minus"></i></a></li>
                                    <li><a data-action="expand"><i class="ft-maximize"></i></a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="card-body collapse in">
                            <div class="card-block">
                                <div class="card-text">
                                    @if(session('status') && session('status') == 400)
                                        <div class="row">
                                            <div class="alert alert-danger alert-dismissable ">
                                                <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                                                <strong>Warning!</strong> {{session('message')}}
                                            </div>
                                        </div>
                                    @endif
                                    @if(session('status') && session('status') == 100)
                                        <div class="row">
                                            <div class="alert alert-success alert-dismissable">
                                                <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                                                <strong>Success!</strong> {{session('message')}}
                                            </div>
                                        </div>
                                    @endif
                                    <div class="row ajaxerror" style="display: none">
                                        <div class="alert alert-danger alert-dismissable ">
                                            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                                            <strong>Warning!</strong><p class="errormessage"></p>
                                        </div>
                                    </div>

                                    <div class="row ajaxsuccess" style="display: none">
                                        <div class="alert alert-success alert-dismissable ">
                                            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                                            <strong>Warning!</strong><p class="successmessage"></p>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-9">
                                            <div class="row">
                                                <div class="col-sm-8 col-md-2">
                                                    <p>Allocation :- {{session()->get( 'allocationno' )}}</p>
                                                    <p>Reference: Gobal Market</p>
                                                    <p><a href="/manager-dashboard" class="btn btn-primary btn-sm btn-block">Cancel Allocation</a></p>
                                                    <p><button class="btn btn-success btn-sm btn-block" id="sync-all-bills" disabled>Sync All Bills</button></p>
                                                </div>

                                                <div class="col-sm-4 col-md-2">

                                                    <p>
                                                        <select id="Select1" class="selectemp"  >
                                                            <option>Tag Employee </option>
                                                            @foreach($staff as $s)
                                                                <option value="{{$s['id']}}">{{$s['name']}}</option>
                                                            @endforeach
                                                        </select></p>

                                                    <div class="all dropdown-menu all-employees" style="display: block; position: static; width: 100%; margin-top: 0; float: none;">
                                                        <h5 class="dropdown-header "><b>Employees</b></h5>
                                                        <div class="addemploye">

                                                            {{--<a class="dropdown-item empname" href="#">Amitav</a>--}}
                                                        </div>

                                                    </div>
                                                </div>
                                                <div class="col-sm-12 col-md-5">
                                                    <div class="table-responsive">
                                                        <table class="table gray font-10 m-b-10 table-bordered">

                                                            <tbody>
                                                            <tr>
                                                                <td>Particulars	</td>
                                                                <td>No. of Bills</td>
                                                                <td>Amount (Rs)</td>
                                                                <td class="text-xs-center">(%)</td>
                                                            </tr>
                                                            <tr>
                                                                <td>Total Bills Allocted</td>
                                                                <td></td>
                                                                <td></td>
                                                                <td class="text-xs-center"></td>
                                                            </tr>
                                                            <tr>
                                                                <td>SR/FSR</td>
                                                                <td></td>
                                                                <td></td>
                                                                <td class="text-xs-center"></td>
                                                            </tr>
                                                            <tr>
                                                                <td>Resend</td>
                                                                <td></td>
                                                                <td></td>
                                                                <td class="text-xs-center"></td>
                                                            </tr>
                                                            <tr>
                                                                <td>Credit</td>
                                                                <td></td>
                                                                <td></td>
                                                                <td class="text-xs-center"></td>
                                                            </tr>
                                                            <tr>
                                                                <td>Partial Payment	</td>
                                                                <td></td>
                                                                <td></td>
                                                                <td class="text-xs-center"></td>
                                                            </tr>
                                                            <tr>
                                                                <td>Cash</td>
                                                                <td></td>
                                                                <td></td>
                                                                <td class="text-xs-center"></td>
                                                            </tr>
                                                            <tr>
                                                                <td>Cheque</td>
                                                                <td></td>
                                                                <td></td>
                                                                <td class="text-xs-center"></td>
                                                            </tr>
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                </div>
                                                <div class="col-sm-12 col-md-3 ">
                                                    <p class="gray-head">Reconcile</p>
                                                    <p><a href="#" class="btn btn-sm btn-info">Credit Bills</a><a href="#" class="btn btn-sm btn-success pull-right">Cash & Cheque</a></p>
                                                </div>
                                            </div>


                                            <div class="row m-t-20">
                                                <div class="col-md-12">
                                                    <div class="table-responsive">
                                                        <table class="table mb-0 font-10 light-gray ">

                                                            <tr class="head">
                                                                <td colspan="11">Current Supply Bills</td>
                                                            </tr>



                                                            <tr class="gray" id="currentSuppluId">
                                                                <th>S No.</th>
                                                                <th>Bill No.</th>
                                                                <th>Allocation No.</th>
                                                                <th>Bill Date</th>
                                                                <th>Retailer Name</th>
                                                                <th>Bill Amt</th>
                                                                <th>Sale Return</th>
                                                                <th>Past Coll.</th>
                                                                <th>Pending Amt</th>
                                                                {{--<th>Staus</th>--}}
                                                                <th>Today's Coll.</th>
                                                                <th>Remark</th>
                                                            </tr>
                                                            @if(isset($currentSupply) && $currentSupply->count() > 0)
                                                                @foreach($currentSupply as $key_supply => $value_supply)
                                                                    <tr @php
                                                                        if($key_supply%2 != 0){
                                                                        echo 'class="odd"';
                                                                        }
                                                                    @endphp>
                                                                        <td>{{$key_supply + 1}}</td>
                                                                        <td>{{$value_supply->billNo}}</td>
                                                                        <td>{{$value_supply->allocationNo}}</td>
                                                                        <td> {{$value_supply->created_at}}</td>
                                                                        <td>{{$value_supply->retailerName}}</td>
                                                                        <td>{{$value_supply->billAmount}}</td>
                                                                        <td>{{$value_supply->saleReturn}}</td>
                                                                        <td>{{$value_supply->pastCollection	}}</td>
                                                                        <td>{{$value_supply->pending_ammount}}</td>
                                                                        <td>{{$value_supply->todayCollection}}</td>
                                                                        <td> <span class="allocationid" data-reactid="{{$value_supply->id }}" data-reactAllocation="{{$value_supply->allocationNo }}"  style= 'cursor: pointer '>  x </span></td>
                                                                    </tr>
                                                                @endforeach
                                                            @endif




                                                        </table>
                                                    </div>
                                                    <br />
                                                    <div class="table-responsive">
                                                        <table class="table mb-0 font-10 light-gray">
                                                            <!--Past Bills-->
                                                            <tr class="head">
                                                                <td colspan="11">Past Bills</td>

                                                            </tr>
                                                            <tr class="gray" id="pastSupplyId">
                                                                <th>S No.</th>
                                                                <th>Bill No.</th>
                                                                <th>Allocation No.</th>
                                                                <th>Bill Date</th>
                                                                <th>Retailer Name</th>
                                                                <th>Bill Amt</th>
                                                                <th>Sale Return</th>
                                                                <th>Past Collection</th>
                                                                <th>Pending Amt</th>
                                                                <th>Today's Collection</th>
                                                                <th>Remark</th>
                                                            </tr>

                                                            @if(isset($pastSupply) && $pastSupply->count() > 0)
                                                                @foreach($pastSupply as $key_supply => $value_supply)
                                                                    <tr @php
                                                                        if($key_supply%2 != 0){
                                                                        echo 'class="odd"';
                                                                        }

                                                                    @endphp>
                                                                        <td>{{$key_supply + 1}}</td>
                                                                        <td>{{$value_supply->billNo}}</td>
                                                                        <td>{{$value_supply->allocationNo}}</td>
                                                                        <td> {{$value_supply->created_at}}</td>
                                                                        <td>{{$value_supply->retailerName}}</td>
                                                                        <td>{{$value_supply->billAmount}}</td>
                                                                        <td>{{$value_supply->saleReturn}}</td>
                                                                        <td>{{$value_supply->pastCollection	}}</td>
                                                                        <td>{{$value_supply->pending_ammount}}</td>
                                                                        <td>{{$value_supply->todayCollection}}</td>
                                                                        <td> <span class="allocationidpast" data-reactid="{{$value_supply->id }}" data-reactAllocation="{{$value_supply->allocationNo }}"  style= 'cursor: pointer '>  x </span></td>

                                                                    </tr>
                                                                @endforeach
                                                            @endif

                                                        </table>
                                                    </div>
                                                    <br />
                                                    <div class="table-responsive">
                                                        <table class="table mb-0 font-10 light-gray">
                                                            <!--Bounced Cheques -->
                                                            <tr class="head">
                                                                <td colspan="11">Bounced Cheques</td>

                                                            </tr>

                                                            <tr class="gray" id="bounceChequeAllocationId">
                                                                <th>S No.</th>
                                                                <th>Cheque No.</th>
                                                                <th>Cheque Date</th>
                                                                <th>Retailer Name</th>
                                                                <th>Principal Amt</th>
                                                                <th>Penalty</th>
                                                                <th>Past Collection</th>
                                                                <th>Pending Amt</th>
                                                                <th>Today's Collection</th>
                                                                <th>Remark</th>
                                                            </tr>


                                                        </table>
                                                    </div>
                                                    <br />

                                                    <div class="table-responsive">
                                                        <table class="table mb-0 font-10 light-gray">
                                                            <!--Delivery Challan -->
                                                            <tr class="head">
                                                                <td colspan="10">Temporary Bills</td>
                                                            </tr>

                                                            <tr class="gray" id="allocatedtemporarybills">
                                                                <th>S No.</th>
                                                                <th>Bill No.</th>
                                                                <th>Bill Date</th>
                                                                <th>Retailer Name</th>
                                                                <th>Bill Amt</th>
                                                                <th>Sale Return</th>
                                                                <th>Past Collection</th>
                                                                <th>Pending Amt</th>
                                                                <th>Today's Collection</th>
                                                                <th>Remark</th>
                                                            </tr>


                                                        </table>
                                                    </div>




                                                </div>
                                            </div>

                                        </div>

                                        <div class="col-md-3">
                                            <div class="table-responsive">
                                                <form id="formData"  method="post" action="{{ url('/storebill')}}" enctype="multipart/form-data">
                                                    <div class="hidden-employee">
                                                        <input type="hidden" name="allocationno" value="{{session()->get( 'allocationno' )}}">

                                                    </div>
                                                    <table class="table gray font-10 m-b-10">
                                                        <thead>
                                                        <tr>
                                                            <th class="text-xs-center" colspan="4">Current Supply</th>
                                                        </tr>
                                                        </thead>
                                                        <tbody>
                                                        <tr>
                                                            <td>To</td>
                                                            <td class="text-xs-right">
                                                                <input id="from "  type="text"  name="billTo" autocomplete="off" class="td-input toValue unallocatatedBills"/ >
                                                            </td>
                                                            <td>From</td>
                                                            <td class="text-xs-right">
                                                                <input id="  to"  type="text" name="billFrom" autocomplete="off" class="td-input fromValue unallocatatedBills"/>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td colspan="2">Bill No.</td>
                                                            <td colspan="2" class="text-xs-right"><input id="Text9" class=" singleValue unallocatatedBills" autocomplete="off" name="billno" type="text" /></td>
                                                        </tr>

                                                        <tr>
                                                            {{csrf_field()}}

                                                            {{--<td> <input type="file" name="upload"></td>--}}
                                                            {{--<td colspan="2" class="text-xs-left"><input class="btn btn-success btn-sm addNewAllocation" value=" AddCurrent Bills" type="submit"> </td>--}}
                                                            <td colspan="2" class="text-xs-left"><button class="btn btn-success btn-sm addNewAllocation" > AddCurrent Bills</button> </td>
                                                        </tr>
                                                        </tbody>
                                                    </table>
                                                </form>
                                            </div>

                                            <div class="table-responsive">
                                                <form class="pastallocationform" method="post">
                                                    {{csrf_field()}}

                                                    <table class="table gray font-10 m-b-10">

                                                        <div class="hidden-employee">
                                                            <input type="hidden" name="allocationno" value="{{session()->get( 'allocationno' )}}">
                                                        </div>

                                                        <tr><td colspan="2"><input id="Text15" class="pastallocation pastallocationtext" name="pastBill" autocomplete="off" type="text" /></td></tr>

                                                        <tr>
                                                            {{--<td><input id="Text18" class="pastallocation" type="text" /></td>--}}
                                                            <td><button class="btn btn-success btn-sm pastAllocation">Add Past Bills</button></td>
                                                        </tr>
                                                        <thead>
                                                        <tr>
                                                            <th class="text-xs-center" colspan="2">Past Bills</th>
                                                        </tr>
                                                        </thead>
                                                        <tbody>

                                                        </tbody>
                                                    </table>
                                                </form>

                                            </div>

                                            <div class="table-responsive">
                                                <form class="bouncechequeallocationform" method="post">
                                                    {{csrf_field()}}

                                                    <table class="table gray font-10 m-b-10">

                                                        <div class="hidden-employee">
                                                            <input type="hidden" name="allocationno" value="{{session()->get( 'allocationno' )}}">
                                                        </div>

                                                        <tr><td colspan="2"><input id="Text15" class="pendingbouncecheque"  name="bounce_cheque" autocomplete="off" type="text" /></td></tr>

                                                        <tr>
                                                            <td><button class="btn btn-success btn-sm bounceallocation">Add Cheque</button></td>
                                                        </tr>
                                                        <thead>
                                                        <tr>
                                                            <th class="text-xs-center" colspan="2">Bounce Cheque Allocation</th>
                                                        </tr>
                                                        </thead>
                                                        <tbody>

                                                        </tbody>
                                                    </table>
                                                </form>

                                            </div>

                                            <div class="table-responsive">
                                                <form class="temporarybillallocationform" method="post">
                                                    {{csrf_field()}}

                                                    <table class="table gray font-10 m-b-10">

                                                        <div class="hidden-employee">
                                                            <input type="hidden" name="allocationno" value="{{session()->get( 'allocationno' )}}">
                                                        </div>

                                                        <tr><td colspan="2"><input id="Text18" class="temporybillsuggest" name="temp_bill" autocomplete="off" type="text" /></td></tr>

                                                        <tr>
                                                            <td><button class="btn btn-success btn-sm allocateTempBill">Add Bill</button></td>
                                                        </tr>
                                                        <thead>
                                                        <tr>
                                                            <th class="text-xs-center" colspan="2">Temporary Bill Allocation</th>
                                                        </tr>
                                                        </thead>
                                                        <tbody>

                                                        </tbody>
                                                    </table>
                                                </form>

                                            </div>

                                        </div>

                                    </div>








                                </div>

                            </div>
                        </div>
                    </div>

            </div>
            </section>
            <!-- // Basic form layout section end -->
        </div>
    </div>
    </div>
    <!-- ////////////////////////////////////////////////////////////////////////////-->


    <footer class="footer footer-static footer-light navbar-shadow">
        <p class="clearfix blue-grey lighten-2 text-sm-center mb-0 px-2">
<span class="float-md-left d-xs-block d-md-inline-block">Copyright  &copy; 2017
<a href="#" target="_blank" class="text-bold-800 grey darken-2">Smart Distributor </a>, All rights reserved. </span>

    </footer>
@endsection