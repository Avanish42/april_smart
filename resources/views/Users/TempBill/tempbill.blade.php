@extends('Users.userapp')
@section('pagetitle')
    TempBills
@endsection
@section('main-content')


    <body data-open="hover" ng-app="app" data-menu="horizontal-menu" data-col="2-columns" class="horizontal-layout horizontal-menu 2-columns   menu-expanded">


    @include('Users.header')

    <div ng-controller="tempBill as vm" class="app-content content container-fluid">
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
                            <h4 class="card-title" id="basic-layout-form">Receipts</h4>
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
                                    @if ($errors->any())
                                        <div class="row">
                                            <div class="alert alert-danger">
                                                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                                <ul>
                                                    @foreach ($errors->all() as $error)
                                                        <li>{{ $error }}</li>
                                                    @endforeach
                                                </ul>
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
                                        <div class="row">
                                        <div class="col-sm-12">
                                            <div class="row">
                                                <div class="col-sm-4 col-md-4">
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




                                                            <tr>
                                                                <td class="gray-head">Retailer</td>
                                                                <td></td>
                                                            </tr>

                                                        </table>
                                                    </div></div>

                                                <div class="col-sm-8 col-md-8  text-sm-left pull-left">
                                                    <a class="btn btn-info   ">Print & Finalize</a>
                                                    <a class="btn btn-info active ">Billing</a>
                                                    <a class="btn btn-info ">Add Purchase</a>
                                                    <a class="btn btn-info ">Add Sale Return</a>
                                                    <a class="btn btn-info ">Just Print</a>
                                                    <a class="btn btn-info ">Just Finalize Bill</a>

                                                    <button  style="display: inline" type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModal_product">Add Product</button>
                                                    <button  style="display: inline" type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModal_retailer">Add Retailer</button>
                                                </div>
                                            </div>

                            <br>
                                            <div class="col-sm-12">
                                                <div class="table-responsive">
                                                    <table class="table  light-gray  m-b-10 table-bordered" style="width:80%; margin:auto;">
                                                        <thead>
                                                        <tr>
                                                            <td colspan="4" rowspan="3">
                                                                <div class="pull-left" style="margin-right:30px!important;"><img src="<?php echo url('images/kia_logo.jpg') ?>"></div>
                                                                <div class="pull-left"><strong>KIA Sales</strong><br>
                                                                    HO: 1852-53, Khari Baoli, Delhi 110006<br>
                                                                    BO: B-113, GTK Rd Indl. Area, Delhi - 33<br>
                                                                    Landline: 011 -4103 9004<br>
                                                                    GSTIN/UIN: 07AAPFK9040D1Z9<br>
                                                                    State Name : Delhi, Code : 07<br>
                                                                    E-Mail : info@kiasales.in</div></td>
                                                            <td colspan="3">Invoice No.<br>
                                                              <input type="text" disabled="disabled" name="pcs_box_in_cas" ng-model="vm.incvoice"  class="back-set no-border tempbillpcsboxincase"> </td>
                                                            <td colspan="3">Dated<br>
                                                                <strong>{{Carbon\Carbon::parse(Carbon\Carbon::now())->format('d-M-Y')}}</strong></td>
                                                        </tr>
                                                        <tr>
                                                            <td colspan="3">Retailer Name</td>
                                                            <td colspan="3">
                                                                <input type="text" class="no-border back-set" ng-trim="false" typeahead-on-select="vm.retailerchange()" ng-blur="vm.retailerchange()" ng-model="vm.billretailer" empty-typeahead uib-typeahead="item as item.retailer_name for item in vm.retailers | filter:$viewValue:stateComparator" >
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td colspan="3">Supplier’s Ref.</td>
                                                            <td colspan="3">@{{vm.suplierref}}</td>
                                                        </tr>

                                                        <tr class="gray">
                                                            <th width="5%" class="light-gray th">S.No.</th>
                                                            <th style="width:30%!important;">Item</th>
                                                            <th width="5%">Pcs/ Box in Case</th>
                                                            <th width="20%!important;">MRP</th>
                                                            <th width="5%">Quantity</th>
                                                            <th width="5%">Units</th>
                                                            <th width="5%">Rate</th>
                                                            <th width="5%">Per</th>
                                                            <th width="5%">Rate per piece</th>
                                                            <th width="20%!important;">Amount</th>
                                                        </tr>
                                                        </thead>
                                                        <tbody>
                                                        <tr ng-repeat="(key,bill) in vm.bills">

                                                            <form name="billform" novalidate="" form-on-change="change()" >

                                                            <td style="vertical-align:text-top;">@{{bill.sno}}</td>
                                                            <td style="vertical-align:text-top; text-align:left;">
                                                                {{--<select  class="itemtempbill tempbillitemselect" ng-options="item as item.item_name for item in bill.products track by item.id"  ng-model="bill.pcsboxincase"  name="tempbill_product">--}}

                                                                {{--</select>--}}

                                                                <input type="text" class="no-border back-set" ng-trim="false" ng-blur="formChangeEPro(bill,key)" ng-model="bill.products" empty-typeahead uib-typeahead="item as item.item_name for item in vm.states | filter:$viewValue:stateComparator" >
                                                               </td>

                                                            <td style="vertical-align:text-top; text-align:right;">
                                                                <input type="number" disabled="disabled" name="pcs_box_in_cas" ng-blur="formChangeE(bill,key)" ng-model="bill.pcsboxincase"  style="width: 70px;" class="back-set no-border tempbillpcsboxincase">
                                                            </td>
                                                            <td style="vertical-align:text-top; text-align:right;">
                                                                <input type="number" disabled="disabled" name="mrp_tempbill" ng-blur="formChangeE(bill,key)" ng-model="bill.mrp" style="width: 70px;" class="back-set no-border mrptempbill">
                                                            </td></td>
                                                            <td style="vertical-align:text-top; text-align:right;">
                                                                <input type="number" name="quantity_tempbill" ng-blur="formChangeE(bill,key)" ng-model="bill.quantity" style="width: 70px;" class="back-set no-border mrptempbill">
                                                            </td>
                                                            <td style="vertical-align:text-top; text-align:right;">
                                                                <select class="back-set unititemtypetempbill no-border" ng-change="formChangeE(bill,key)" ng-model="bill.units"  ng-options="item for item in vm.piecesBox" name="unit_item_type_tempbill">

                                                                </select>
                                                            </td>
                                                            <td style="vertical-align:text-top; text-align:right;"><input type="number" name="rate_tempbill" ng-blur="formChangeE(bill,key)" ng-model="bill.rate" style="width: 70px;" class="back-set no-border ratetempbill"></td>
                                                            <td style="vertical-align:text-top; text-align:right;">
                                                                <select class="back-set rateitemtypetempbill no-border" ng-change="formChangeE(bill,key)" ng-model="bill.per" ng-options="item for item in vm.piecesBox" class="no-border" name="per_item_type_tempbill">

                                                                </select></td>
                                                            <td style="vertical-align:text-top; text-align:right;"><input type="number" name="rate_per_tempbill" ng-blur="formChangeE(bill,key)" disabled="disabled" ng-model="bill.rate_per_piece" class="no-border ratepertempbill"></td>
                                                            <td style="vertical-align:text-top; text-align:right;"><input type="number" name="amount_tempbill" ng-model="bill.amount"  disabled="disabled" class="no-border amounttempbill">/-</td>

                                                            </form>
                                                        </tr>


                                                        <tr class="tblfooter">
                                                            <td><strong>Total</strong></td>
                                                            <td>-</td>
                                                            <td>-</td>
                                                            <td>-</td>
                                                            <td>-</td>
                                                            <td>-</td>
                                                            <td>-</td>
                                                            <td>-</td>
                                                            <td>-</td>
                                                            <td>&#x20b9 @{{vm.totalAmount}}/-</td>
                                                        </tr>
                                                        </tbody>
                                                    </table>

                                                    <div class="submit-bill-box" style="width: 95%">
                                                        <input type="button" name="submit Button" ng-click="vm.submitBill()"  value="Submit Bill" class="btn btn-success pull-right">
                                                    </div>
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

            </div>
            </section>
            <!-- // Basic form layout section end -->
        </div>
    </div>
    </div>
    <!-- ////////////////////////////////////////////////////////////////////////////-->
    <!-- Modal -->
    <div class="modal fade" id="myModal_product" role="dialog">
        <div class="modal-dialog">

            <!-- Modal content-->
    <div class="modal-content">
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            <h4 class="modal-title">Add New Product</h4>
        </div>
        <div class="table-responsive">
            <table class="table mb-0 font-10 light-gray ">

                <tr class="head">
                    <td colspan="5"><div align="center">Add Product</div></td>
                </tr>

                <tr class="gray">
                    <th>Product Name</th>
                    <th>Product Configuration</th>
                    <th>Pcs or Box per Case</th>
                    <th>MRP</th>
                    <th>Action</th>
                </tr>
                <form action="{{url('addProduct')}}" method="post">
                <tr>
                    {{csrf_field()}}
                    <td><input type="text" name="item_name" class="suggest_product" required placeholder="Name"></td>
                    <td>
                        <select name="item_type" required>
                            <option value="">Please select Type</option>
                            <option value="pieces">Pieces</option>
                            <option value="box">Box</option>
                        </select>
                    </td>
                    <td><input type="number" name="item_quantity"></td>
                    <td><input type="number" required name="item_price"></td>
                    <td> <input type="submit" value="Save" name="save"> </td>
                </tr>
                </form>

            </table>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
    </div>

    </div>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="myModal_retailer" role="dialog">
        <div class="modal-dialog">

            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Add New Retailer</h4>
                </div>
                <div class="table-responsive">
                    <table class="table mb-0 font-10 light-gray  "  >

                        <tr class="head">
                            <td colspan="4"><div align="center">Add Retailer</div></td>
                        </tr>

                        <tr class="gray">
                            <th>Retailer Name</th>
                            <th>Retailer Beat</th>
                            <th>Salesman</th>
                            <th>Save</th>
                        </tr>
                        <form action="{{url('addRetailer')}}" method="post">
                            <tr>
                                {{csrf_field()}}
                                <td><input type="text" name="retailer_name" autocomplete="off" class="suggest_retailer_name" required placeholder="Retailer Name"></td>
                                <td><input type="text" name="beat" required placeholder="Beat"></td>
                                <td><select name="salesman" required>
                                        <option value="">Select Sales Man</option>
                                        @foreach($staff as $s)
                                            <option value="{{$s['id']}}">{{$s['name']}}</option>
                                        @endforeach
                                    </select></td>
                                <td> <input type="submit" value=" Save" name="save" > </td>
                            </tr>
                        </form>

                    </table>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
    <style>
        .custom-combobox {
            position: relative;
            display: inline-block;
        }
        .custom-combobox-toggle {
            position: absolute;
            top: 0;
            bottom: 0;
            margin-left: -1px;
            padding: 0;
        }
        .ui-autocomplete-input {
            margin: 0;
            padding: 5px 10px;
            outline: 0;
            border: none;
            background: white;
        }
        input[type="text"]:disabled {
            background: white;
        }
        input[type="number"]:disabled {
            background: white;
        }
        .back-set{
            background: #80808026;
        }
    </style>
    <script type="text/ng-template" id="customTemplate.html">
        <a>
            <img ng-src="http://upload.wikimedia.org/wikipedia/commons/thumb/@{{match.model.flag}}" width="16">
            <span ng-bind-html="match.label | uibTypeaheadHighlight:query"></span>
        </a>
    </script>
    <script type="text/ng-template" id="customPopupTemplate.html">
        <div class="custom-popup-wrapper"
             ng-style="@{top: position().top+'px', left: position().left+'px'}"
             style="display: block;"
             ng-show="isOpen() && !moveInProgress"
             aria-hidden="@{{!isOpen()}}">
            <p class="message">select location from drop down.</p>

            <ul class="dropdown-menu" role="listbox">
                <li class="uib-typeahead-match" ng-repeat="match in matches track by $index" ng-class="@{active: isActive($index) }"
                    ng-mouseenter="selectActive($index)" ng-click="selectMatch($index)" role="option" id="@{{::match.id}}">
                    <div uib-typeahead-match index="$index" match="match" query="query" template-url="templateUrl"></div>
                </li>
            </ul>
        </div>
    </script>
@endsection