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
                                                            <td colspan="2" rowspan="3">
                                                                <div class="pull-left" style="margin-right:30px!important;"><img src="<?php echo url('images/kia_logo.jpg') ?>"></div>
                                                                <div class="pull-left"><strong>KIA Sales</strong><br>
                                                                    HO: 1852-53, Khari Baoli, Delhi 110006<br>
                                                                    BO: B-113, GTK Rd Indl. Area, Delhi - 33<br>
                                                                    Landline: 011 -4103 9004<br>
                                                                    GSTIN/UIN: 07AAPFK9040D1Z9<br>
                                                                    State Name : Delhi, Code : 07<br>
                                                                    E-Mail : info@kiasales.in</div></td>
                                                            <td colspan="3">Invoice No.<br>
                                                                <strong> I/17-18/310</strong></td>
                                                            <td colspan="3">Dated<br>
                                                                <strong>12-Dec-2017</strong></td>
                                                        </tr>
                                                        <tr>
                                                            <td colspan="3">Delivery Note</td>
                                                            <td colspan="3">Mode/Terms of Payment</td>
                                                        </tr>
                                                        <tr>
                                                            <td colspan="3">Supplier’s Ref.</td>
                                                            <td colspan="3">Other Reference(s)</td>
                                                        </tr>
                                                        <tr>
                                                            <td colspan="2" rowspan="4" style="vertical-align:top;">
                                                                <div class="pull-left" style="margin-right:30px!important;">Buyer<br>
                                                                    <strong>Cash</strong><br><br>
                                                                    PAN/IT No<br>
                                                                    State Name<br>
                                                                    Place of Supply</div>
                                                                <div class="pull-left"><br>
                                                                    <br><br>
                                                                    :<br>
                                                                    : Delhi, Code : 07<br>
                                                                    : Delhi</div>  </td>
                                                            <td colspan="3">Buyer’s Order No.</td>
                                                            <td colspan="3">Dated</td>
                                                        </tr>
                                                        <tr>
                                                            <td colspan="3">Despatch Document No.</td>
                                                            <td colspan="3">Delivery Note Date</td>
                                                        </tr>
                                                        <tr>
                                                            <td colspan="3">Despatched through</td>
                                                            <td colspan="3">Destination</td>
                                                        </tr>
                                                        <tr>
                                                            <td colspan="6" style="height:130px; vertical-align:top;">Terms of Delivery</td>
                                                        </tr>
                                                        <tr class="gray">
                                                            <th width="5%" class="light-gray th">S.No.</th>
                                                            <th style="width:80%!important;">Item</th>
                                                            <th width="5%">Qty.</th>
                                                            <th width="5%">Rate</th>
                                                            <th width="5%">Amount</th>
                                                            <th width="5%">Qty.</th>
                                                            <th width="5%">Rate</th>
                                                            <th width="5%">Amount</th>
                                                        </tr>
                                                        </thead>
                                                        <tbody>
                                                        <tr>
                                                            <td style="vertical-align:text-top;">1</td>
                                                            <td style="vertical-align:text-top; text-align:left;">-</td>
                                                            <td style="vertical-align:text-top; text-align:right;">-</td>
                                                            <td style="vertical-align:text-top; text-align:right;">-</td>
                                                            <td style="vertical-align:text-top; text-align:right;">-</td>
                                                            <td style="vertical-align:text-top; text-align:right;">-</td>
                                                            <td style="vertical-align:text-top; text-align:right;">-</td>
                                                            <td style="vertical-align:text-top; text-align:right;">000/-</td>
                                                        </tr>

                                                        <tr class="odd">
                                                            <td style="vertical-align:text-top;">2</td>
                                                            <td style="vertical-align:text-top; text-align:left;">-</td>
                                                            <td style="vertical-align:text-top; text-align:right;">-</td>
                                                            <td style="vertical-align:text-top; text-align:right;">-</td>
                                                            <td style="vertical-align:text-top; text-align:right;">-</td>
                                                            <td style="vertical-align:text-top; text-align:right;">-</td>
                                                            <td style="vertical-align:text-top; text-align:right;">-</td>
                                                            <td style="vertical-align:text-top; text-align:right;">000/-</td>
                                                        </tr>


                                                        <tr>
                                                            <td style="vertical-align:text-top;">3</td>
                                                            <td style="vertical-align:text-top; text-align:left;">-</td>
                                                            <td style="vertical-align:text-top; text-align:right;">-</td>
                                                            <td style="vertical-align:text-top; text-align:right;">-</td>
                                                            <td style="vertical-align:text-top; text-align:right;">-</td>
                                                            <td style="vertical-align:text-top; text-align:right;">-</td>
                                                            <td style="vertical-align:text-top; text-align:right;">-</td>
                                                            <td style="vertical-align:text-top; text-align:right;">000/-</td>
                                                        </tr>

                                                        <tr class="odd">
                                                            <td style="vertical-align:text-top;">4</td>
                                                            <td style="vertical-align:text-top; text-align:left;">-</td>
                                                            <td style="vertical-align:text-top; text-align:right;">-</td>
                                                            <td style="vertical-align:text-top; text-align:right;">-</td>
                                                            <td style="vertical-align:text-top; text-align:right;">-</td>
                                                            <td style="vertical-align:text-top; text-align:right;">-</td>
                                                            <td style="vertical-align:text-top; text-align:right;">-</td>
                                                            <td style="vertical-align:text-top; text-align:right;">000/-</td>
                                                        </tr>

                                                        <tr>
                                                            <td style="vertical-align:text-top;">5</td>
                                                            <td style="vertical-align:text-top; text-align:left;">-</td>
                                                            <td style="vertical-align:text-top; text-align:right;">-</td>
                                                            <td style="vertical-align:text-top; text-align:right;">-</td>
                                                            <td style="vertical-align:text-top; text-align:right;">-</td>
                                                            <td style="vertical-align:text-top; text-align:right;">-</td>
                                                            <td style="vertical-align:text-top; text-align:right;">-</td>
                                                            <td style="vertical-align:text-top; text-align:right;">000/-</td>
                                                        </tr>

                                                        <tr class="odd">
                                                            <td style="vertical-align:text-top;">6</td>
                                                            <td style="vertical-align:text-top; text-align:left;">-</td>
                                                            <td style="vertical-align:text-top; text-align:right;">-</td>
                                                            <td style="vertical-align:text-top; text-align:right;">-</td>
                                                            <td style="vertical-align:text-top; text-align:right;">-</td>
                                                            <td style="vertical-align:text-top; text-align:right;">-</td>
                                                            <td style="vertical-align:text-top; text-align:right;">-</td>
                                                            <td style="vertical-align:text-top; text-align:right;">000/-</td>
                                                        </tr>

                                                        <tr>
                                                            <td style="vertical-align:text-top;">7</td>
                                                            <td style="vertical-align:text-top; text-align:left;">-</td>
                                                            <td style="vertical-align:text-top; text-align:right;">-</td>
                                                            <td style="vertical-align:text-top; text-align:right;">-</td>
                                                            <td style="vertical-align:text-top; text-align:right;">-</td>
                                                            <td style="vertical-align:text-top; text-align:right;">-</td>
                                                            <td style="vertical-align:text-top; text-align:right;">-</td>
                                                            <td style="vertical-align:text-top; text-align:right;">000/-</td>
                                                        </tr>

                                                        <tr class="odd">
                                                            <td style="vertical-align:text-top;">8</td>
                                                            <td style="vertical-align:text-top; text-align:left;">-</td>
                                                            <td style="vertical-align:text-top; text-align:right;">-</td>
                                                            <td style="vertical-align:text-top; text-align:right;">-</td>
                                                            <td style="vertical-align:text-top; text-align:right;">-</td>
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
                    <td colspan="4"><div align="center">Add Product</div></td>
                </tr>

                <tr class="gray">
                    <th>Product Name</th>
                    <th>Product case </th>
                    <th>Cash</th>
                    <th>Pending</th>
                </tr>
                <form action="" method="post">
                <tr>
                    <td><input type="text" name="name" placeholder="Name"></td>
                    <td><input type="text" name="type" placeholder="case/quantity"></td>
                    <td><input type="text" name="price" placeholder="price"></td>
                    <td><input type="reset" value="Reset" name="reset"> </td>
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
                            <th>Reset</th>
                            <th>Save</th>
                        </tr>
                        <form action="" method="post">
                            <tr>
                                <td><input type="text" name="name" placeholder="Name "></td>
                                <td><input type="text" name="beat" placeholder="Beat"></td>
                                <td><input type="reset" value=" Reset" name="save" > </td>
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


@endsection