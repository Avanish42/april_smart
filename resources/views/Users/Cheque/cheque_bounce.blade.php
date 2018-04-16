@extends('Users.userapp')
@section('pagetitle')
    Smart Distributer
@endsection
@section('main-content')

      <body data-open="hover" data-menu="horizontal-menu" data-col="2-columns" class="horizontal-layout horizontal-menu 2-columns   menu-expanded">

    @include('Users.header')

    <div class="app-content content container-fluid">
        <div class="content-wrapper">
            <div class="content-header row">
                <div class="content-header-left col-md-6 col-xs-12 mb-2">
                    <h3 class="content-header-title mb-0">Cheque Bounce Register</h3>
                    <div class="row breadcrumbs-top">
                        <div class="breadcrumb-wrapper col-xs-12">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="index.htm">Home</a></li>
                                <li class="breadcrumb-item"><a href="#">Cheque Detail</a></li>
                                <li class="breadcrumb-item active"><a href="#">Cheque Bounce Register</a></li>
                            </ol>
                        </div>
                    </div>
                </div>

            </div>
            <div class="content-body"><!-- Basic form layout section start -->
                <section id="basic-form-layouts">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title" id="basic-layout-form">Cheque Bounce Add Penalty</h4>
                            <a class="heading-elements-toggle"><i class="fa fa-ellipsis-v font-medium-3"></i></a>
                            <div class="heading-elements">
                                <ul class="list-inline mb-0">
                                    <li><a data-action="expand"><i class="ft-maximize"></i></a></li>
                                </ul>
                            </div>
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
                                            <div class="table-responsive">
                                                <table class="table gray font-10 table-bordered">
                                                    <thead>

                                                    <tr>
                                                        <th>Date</th>
                                                        <th>Retailer Name</th>
                                                        <th class="text-xs-right">Cheque Number</th>
                                                        <th class="text-xs-right">Cheque Date</th>
                                                        <th class="text-xs-right">Cheque Amount</th>
                                                        <th>Bank Name</th>
                                                        <th>Bill No.</th>
                                                        <th>Reason</th>
                                                        <th>Penalty</th>
                                                        <th>Remark</th>
                                                        <th>Action</th>
                                                    </tr>
                                                    </thead>
                                                    <tbody>
                                                    @foreach($uncleared_check_without_penalty as $key_unclear => $value_unclear)
                                                    <tr>
                                                        <form method="post" action="{{url('/update-bounce-check')}}">
                                                            {{csrf_field()}}
                                                        <td>{{$value_unclear->created_at}}</td>
                                                        <td>{{$value_unclear->retailer_name}}</td>
                                                        <td class="text-xs-right">{{$value_unclear->cheque_number}}</td>
                                                        <td class="text-xs-right">{{$value_unclear->Cheque_Date}}</td>
                                                        <td class="text-xs-right">{{$value_unclear->amount}}</td>
                                                        <td>{{$value_unclear->bank_name}}</td>
                                                        <td>{{$value_unclear->billno}}</td>
                                                        <td>
                                                            <select id="penaltySelect" name="penalty_id">
                                                                <option value="">Please Select Penalty</option>
                                                             @foreach($penalties as $key_penalty => $value_penalty)
                                                                <option value="{{$value_penalty->id}}">{{$value_penalty->name}}</option>
                                                                 @endforeach
                                                            </select>
                                                        </td>
                                                        <td>
                                                            <input class="penaltyBox" type="text" style="width:60px">
                                                            <input type="hidden" name="id" value="{{$value_unclear->id}}" style="width:60px">
                                                        </td>
                                                        <td>
                                                            <input  type="text" name="remark" style="width:60px">
                                                        </td>
                                                        <td>
                                                            <input type="submit" value="Update" class="btn btn-sm btn-primary">
                                                        </td>
                                                        </form>
                                                    </tr>
                                                    @endforeach

                                                    </tbody>

                                                </table>
                                            </div>

                                        </div>
                                        {{--<div class="col-sm-2 text-xl-right">--}}
                                            {{--<p><a class="btn btn-success btn-min-width mr-1 mb-1">Submit</a></p>--}}
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