@extends('Users.userapp')
@section('pagetitle')
    Smart Distributer
@endsection
@section('main-content')

    <body data-open="hover" data-menu="horizontal-menu" data-col="2-columns"
          class="horizontal-layout horizontal-menu 2-columns   menu-expanded">
    @include('Users.header')

    <div class="app-content content container-fluid">
        <div class="content-wrapper">
            <div class="content-header row">
                <div class="content-header-left col-md-6 col-xs-12 mb-2">
                    <h3 class="content-header-title mb-0">Cheque Register</h3>
                    <div class="row breadcrumbs-top">
                        <div class="breadcrumb-wrapper col-xs-12">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="index.htm">Home</a></li>
                                <li class="breadcrumb-item"><a href="#">Cheque Detail</a></li>
                                <li class="breadcrumb-item active"><a href="#">Cheque Register</a></li>
                            </ol>
                        </div>
                    </div>
                </div>

            </div>
            <div class="content-body"><!-- Basic form layout section start -->
                <section id="basic-form-layouts">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title" id="basic-layout-form">In-completed Registered Cheque</h4>
                        </div>
                        <div class="card-body collapse in">
                            <div class="card-block">
                                <div class="card-text">
                                    <div class="row">
                                        <div class="col-sm-12">
                                            @if ($errors->any())
                                                <div class="alert alert-danger">
                                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                                    <ul>
                                                        @foreach ($errors->all() as $error)
                                                            <li>{{ $error }}</li>
                                                        @endforeach
                                                    </ul>
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
                                                <div class="row ajaxsuccess" style="display: none">
                                                    <div class="alert alert-success alert-dismissable ">
                                                        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                                                        <strong>Success!</strong><p class="successmessage"></p>
                                                    </div>
                                                </div>

                                            <div class="table-responsive">
                                                <table class="table gray font-12 table-bordered">
                                                    <thead>
                                                        <tr>
                                                        <th>Date</th>
                                                        <th>Retailer Name</th>
                                                        <th class="text-xs-right">Cheque Number</th>
                                                        <th class="text-xs-right">Cheque Date</th>
                                                        <th class="text-xs-right">Cheque Amount</th>
                                                        <th>Bank Name</th>
                                                        <th>Amount</th>
                                                        <th>Bill No.</th>
                                                        <th>Allocation Number</th>
                                                        <th>Remark</th>
                                                        <th>Action</th>
                                                    </tr>
                                                    </thead>
                                                    <tbody>
                                                    @foreach($cheques as $key_cheq => $value_cheq)
                                                        @if($value_cheq->is_completed == 0)
                                                            <form method="post" action="{{ url('/complete-registered-check')}}" enctype="multipart/form-data">
                                                  {{csrf_field()}}
                                                    <tr>
                                                        <input type="hidden" name="id" value="{{$value_cheq->id}}">
                                                        <td>{{date('d-M-Y',strtotime($value_cheq->created_at)) }}</td>
                                                        <td>{{$value_cheq->retailer_name}}</td>
                                                        <td class="text-xs-right"><input type="text" style="width: 70px;" name="cheque_number"></td>
                                                        <td class="text-xs-right"><input type="text"  class="cheque_datepicker"  style="width: 70px;"  name="Cheque_Date"></td>
                                                        <td class="text-xs-right">{{$value_cheq->amount}}</td>
                                                        <td><input type="text" name="bank_name" class="bank_name_suggest" autocomplete="off"></td>
                                                        <td>{{$value_cheq->amount}}</td>
                                                        <td>{{$value_cheq->billno}}</td>
                                                        <td>{{$value_cheq->allocationNo}}</td>
                                                        <td><input type="text" name="remark"></td>
                                                        <td><input type="submit" value="Save" class="btn btn-sm btn-info"></td>
                                                    </tr>
                                                            </form>
                                                    @endif
                                                        @endforeach

                                                    </tbody>

                                                </table>
                                            </div>

                                        </div>
                                        {{--<div class="col-sm-2 text-xl-right">--}}
                                            {{--<p><a class="btn btn-primary btn-min-width mr-1 mb-1">Club</a></p>--}}
                                            {{--<p><a class="btn btn-info btn-min-width mr-1 mb-1">Submit</a></p>--}}
                                        {{--</div>--}}
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

@endsection