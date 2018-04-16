@extends('Users.userapp')
@section('pagetitle')
    TempBills
@endsection
@section('main-content')


    <body data-open="hover" data-menu="horizontal-menu" data-col="2-columns" class="horizontal-layout horizontal-menu 2-columns   menu-expanded">


    @include('Users.header')

    <div class="app-content content container-fluid">
        <div class="content-wrapper">
            <div class="content-header row">
                <div class="content-header-left col-md-6 col-xs-12 mb-2">
                    <h3 class="content-header-title mb-0">Bills</h3>
                    <div class="row breadcrumbs-top">
                        <div class="breadcrumb-wrapper col-xs-12">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="index.htm">Home</a></li>
                                <li class="breadcrumb-item"><a href="#">Bills Allocation</a></li>
                                <li class="breadcrumb-item active"><a href="#">Receipts</a></li>
                            </ol>
                        </div>
                    </div>
                </div>

            </div>
            <div class="content-body"><!-- Basic form layout section start -->
                <section id="basic-form-layouts">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title" id="basic-layout-form">Temp Bill</h4>
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

                                    <div class="row">
                                        <div class="col-sm-12">
                                            <div class="row">
                                                <div class="col-sm-1 ">

                                                </div>

                                                <div class="col-sm-6  text-sm-left pull-left">

                                                    <div class="table-responsive">
                                                        <table class="table mb-0 font-10 light-gray " style="border:1px solid #ccc;">
                                                            <tr>
                                                                <td class="gray-head">Date</td>
                                                                <td>19-Mar-2018</td>
                                                            </tr>
                                                            <tr>
                                                                <td class="gray-head">Serial No</td>
                                                                <td> S-12546 </td>
                                                            </tr>

                                                            <tr class="odd">
                                                                <td class="gray-head">Salesman</td>
                                                                <td>  <select>
                                                                        <option>Billing</option>
                                                                        <option>Purchase</option>
                                                                        <option>Sales Return</option>
                                                                    </select></td>
                                                            </tr>


                                                            <tr>
                                                                <td class="gray-head">Search</td>
                                                                <td> <input type="text" name="tempBillSearch" ></td>
                                                            </tr>

                                                        </table>
                                                    </div>


                                                </div>

                                                <div class="col-sm-3 col-md-3  text-sm-left pull-left">


                                                </div>
                                                <div class="col-sm-2 col-md-2  text-sm-left pull-left">

                                                    <a class="btn btn-info ">Just Print</a>
                                                    <a class="btn btn-info ">Just Finalize Bill</a>


                                                </div>
                                            </div>

                                            <br>
                                            <div class="col-sm-1"></div>
                                            <div class="col-sm-8">
                                                <div class="table-responsive">
                                                    <table class="table gray font-10 m-b-10 table-bordered" style="width:100%;">
                                                        <thead>
                                                        <tr>
                                                            <td colspan="5" style="height:80px;"><div align="right">Current Date : <br>
                                                                    SL1386</div></td>
                                                        </tr>
                                                        <tr class="gray">
                                                            <th width="5%">S.No.</th>
                                                            <th style="width:80%!important;">Item</th>
                                                            <th width="5%">Qty.</th>
                                                            <th width="5%">Rate</th>
                                                            <th width="5%">Amount</th>
                                                        </tr>
                                                        </thead>
                                                        <tbody>
                                                        <tr>
                                                            <td style="height:400px; vertical-align:text-top;">1</td>
                                                            <td style="vertical-align:text-top; text-align:left;">-</td>
                                                            <td style="vertical-align:text-top; text-align:right;">-</td>
                                                            <td style="vertical-align:text-top; text-align:right;">-</td>
                                                            <td style="vertical-align:text-top; text-align:right;">000/-</td>
                                                        </tr>

                                                        <tr class="tblfooter">
                                                            <td><strong>Total</strong></td>
                                                            <td>-</td>
                                                            <td>-</td>
                                                            <td>-</td>
                                                            <td>-</td>
                                                        </tr>
                                                        </tbody>
                                                    </table>
                                                </div>
                                                <br>








                                            </div>

                                        </div>



                                    </div>



                                    <hr />







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