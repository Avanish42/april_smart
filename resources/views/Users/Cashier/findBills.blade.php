
@extends('Users.userapp')
@section('pagetitle')
    Allocation
@endsection
@section('main-content')
    {{--<h1>this is section</h1>--}}
    <body data-open="hover" data-menu="horizontal-menu" data-col="2-columns" class="horizontal-layout horizontal-menu 2-columns   menu-expanded">

    <!-- navbar-fixed-top-->
    <nav class="header-navbar navbar navbar-with-menu navbar-static-top navbar-dark bg-gradient-x-grey-blue navbar-border navbar-brand-center">
        <div class="navbar-wrapper">
            <div class="navbar-header">
                <ul class="nav navbar-nav">
                    <li class="nav-item mobile-menu hidden-md-up float-xs-left">
                        <a href="#" class="nav-link nav-menu-main menu-toggle hidden-xs"><i class="ft-menu font-large-1"></i></a>
                    </li>
                    <li class="nav-item"><a href="index.html" class="navbar-brand"><img alt="stack admin logo" src="images/logo.png" class="brand-logo">

                    <li class="nav-item hidden-md-up float-xs-right">
                        <a data-toggle="collapse" data-target="#navbar-mobile" class="nav-link open-navbar-container"><i class="fa fa-ellipsis-v"></i></a>
                    </li>
                </ul>
            </div>
            <div class="navbar-container content container-fluid">
                <div id="navbar-mobile" class="collapse navbar-toggleable-sm">
                    <ul class="nav navbar-nav">
                        <li class="nav-item hidden-sm-down"><a href="#" class="nav-link nav-menu-main menu-toggle hidden-xs"><i class="ft-menu"></i></a></li>
                        <!--<li class="dropdown nav-item mega-dropdown"><a href="#" data-toggle="dropdown" class="dropdown-toggle nav-link">Mega</a>
                        <ul class="mega-dropdown-menu dropdown-menu row">
                        <li class="col-md-2">
                        <h6 class="dropdown-menu-header text-uppercase mb-1"><i class="fa fa-newspaper-o"></i> News</h6>
                        <div id="mega-menu-carousel-example">
                        <div><img src="../../../app-assets/images/slider/slider-2.png" alt="First slide" class="rounded img-fluid mb-1"><a href="#" class="news-title mb-0">Poster Frame PSD</a>
                        <p class="news-content"><span class="font-small-2">January 26, 2016</span></p>
                        </div>
                        </div>
                        </li>
                        <li class="col-md-3">
                        <h6 class="dropdown-menu-header text-uppercase"><i class="fa fa-random"></i> Drill down menu</h6>
                        <ul class="drilldown-menu">
                        <li class="menu-list">
                        <ul>
                        <li><a href="layout-2-columns.html" class="dropdown-item"><i class="ft-file"></i> Page layouts & Templates</a></li>
                        <li><a href="#"><i class="ft-align-left"></i> Multi level menu</a>
                        <ul>
                        <li><a href="#" class="dropdown-item"><i class="fa fa-bookmark-o"></i>  Second level</a></li>
                        <li><a href="#"><i class="fa fa-lemon-o"></i> Second level menu</a>
                        <ul>
                        <li><a href="#" class="dropdown-item"><i class="fa fa-heart-o"></i>  Third level</a></li>
                        <li><a href="#" class="dropdown-item"><i class="fa fa-file-o"></i> Third level</a></li>
                        <li><a href="#" class="dropdown-item"><i class="fa fa-trash-o"></i> Third level</a></li>
                        <li><a href="#" class="dropdown-item"><i class="fa fa-clock-o"></i> Third level</a></li>
                        </ul>
                        </li>
                        <li><a href="#" class="dropdown-item"><i class="fa fa-hdd-o"></i> Second level, third link</a></li>
                        <li><a href="#" class="dropdown-item"><i class="fa fa-floppy-o"></i> Second level, fourth link</a></li>
                        </ul>
                        </li>
                        <li><a href="color-palette-primary.html" class="dropdown-item"><i class="ft-camera"></i> Color pallet system</a></li>
                        <li><a href="sk-2-columns.html" class="dropdown-item"><i class="ft-edit"></i> Page starter kit</a></li>
                        <li><a href="changelog.html" class="dropdown-item"><i class="ft-minimize-2"></i> Change log</a></li>
                        <li><a href="http://support.pixinvent.com/" class="dropdown-item"><i class="fa fa-life-ring"></i> Customer support center</a></li>
                        </ul>
                        </li>
                        </ul>
                        </li>
                        <li class="col-md-3">
                        <h6 class="dropdown-menu-header text-uppercase"><i class="fa fa-list-ul"></i> Accordion</h6>
                        <div id="accordionWrap" role="tablist" aria-multiselectable="true">
                        <div class="card no-border box-shadow-0 collapse-icon accordion-icon-rotate">
                        <div id="headingOne" role="tab" class="card-header p-0 pb-2 no-border"><a data-toggle="collapse" data-parent="#accordionWrap" href="#accordionOne" aria-expanded="true" aria-controls="accordionOne">Accordion Item #1</a></div>
                        <div id="accordionOne" role="tabpanel" aria-labelledby="headingOne" aria-expanded="true" class="card-collapse collapse in">
                        <div class="card-body">
                        <p class="accordion-text text-small-3">Caramels dessert chocolate cake pastry jujubes bonbon. Jelly wafer jelly beans. Caramels chocolate cake liquorice cake wafer jelly beans croissant apple pie.</p>
                        </div>
                        </div>
                        <div id="headingTwo" role="tab" class="card-header p-0 pb-2 no-border"><a data-toggle="collapse" data-parent="#accordionWrap" href="#accordionTwo" aria-expanded="false" aria-controls="accordionTwo" class="collapsed">Accordion Item #2</a></div>
                        <div id="accordionTwo" role="tabpanel" aria-labelledby="headingTwo" aria-expanded="false" class="card-collapse collapse">
                        <div class="card-body">
                        <p class="accordion-text">Sugar plum bear claw oat cake chocolate jelly tiramisu dessert pie. Tiramisu macaroon muffin jelly marshmallow cake. Pastry oat cake chupa chups.</p>
                        </div>
                        </div>
                        <div id="headingThree" role="tab" class="card-header p-0 pb-2 no-border"><a data-toggle="collapse" data-parent="#accordionWrap" href="#accordionThree" aria-expanded="false" aria-controls="accordionThree" class="collapsed">Accordion Item #3</a></div>
                        <div id="accordionThree" role="tabpanel" aria-labelledby="headingThree" aria-expanded="false" class="card-collapse collapse">
                        <div class="card-body">
                        <p class="accordion-text">Candy cupcake sugar plum oat cake wafer marzipan jujubes lollipop macaroon. Cake dragée jujubes donut chocolate bar chocolate cake cupcake chocolate topping.</p>
                        </div>
                        </div>
                        </div>
                        </div>
                        </li>
                        <li class="col-md-4">
                        <h6 class="dropdown-menu-header text-uppercase mb-1"><i class="fa fa-envelope-o"></i> Contact Us</h6>
                        <form>
                        <fieldset class="form-group">
                        <label for="inputName1" class="col-sm-3 form-control-label">Name</label>
                        <div class="col-sm-9">
                        <div class="position-relative has-icon-left">
                        <input type="text" id="inputName1" placeholder="John Doe" class="form-control">
                        <div class="form-control-position"><i class="fa fa-user-o pl-1"></i></div>
                        </div>
                        </div>
                        </fieldset>
                        <fieldset class="form-group">
                        <label for="inputEmail1" class="col-sm-3 form-control-label">Email</label>
                        <div class="col-sm-9">
                        <div class="position-relative has-icon-left">
                        <input type="email" id="inputEmail1" placeholder="john@example.com" class="form-control">
                        <div class="form-control-position pl-1"><i class="fa fa-envelope-o"></i></div>
                        </div>
                        </div>
                        </fieldset>
                        <fieldset class="form-group">
                        <label for="inputMessage1" class="col-sm-3 form-control-label">Message</label>
                        <div class="col-sm-9">
                        <div class="position-relative has-icon-left">
                        <textarea id="inputMessage1" rows="2" placeholder="Simple Textarea" class="form-control"></textarea>
                        <div class="form-control-position pl-1"><i class="fa fa-commenting-o"></i></div>
                        </div>
                        </div>
                        </fieldset>
                        <div class="col-sm-12 mb-1">
                        <button type="button" class="btn btn-primary float-xs-right"><i class="fa fa-paper-plane-o"></i> Send</button>
                        </div>
                        </form>
                        </li>
                        </ul>
                        </li>-->
                        <li class="nav-item hidden-sm-down"><a href="#" class="nav-link nav-link-expand"><i class="ficon ft-maximize"></i></a></li>
                        <li class="nav-item nav-search"><a href="#" class="nav-link nav-link-search"><i class="ficon ft-search"></i></a>
                            <div class="search-input">
                                <input type="text" placeholder="Search here..." class="input">
                            </div>
                        </li>
                    </ul>
                    <ul class="nav navbar-nav float-xs-right">

                        <li class="dropdown dropdown-notification nav-item">
                            <a href="#" data-toggle="dropdown" class="nav-link nav-link-label"><i class="ficon ft-bell"></i><span class="tag tag-pill tag-default tag-danger tag-default tag-up">5</span></a>
                            <ul class="dropdown-menu dropdown-menu-media dropdown-menu-right">
                                <li class="dropdown-menu-header">
                                    <h6 class="dropdown-header m-0"><span class="grey darken-2">Notifications</span><span class="notification-tag tag tag-default tag-danger float-xs-right m-0">5 New</span></h6>
                                </li>
                                <li class="list-group scrollable-container"><a href="javascript:void(0)" class="list-group-item">
                                        <div class="media">
                                            <div class="media-left valign-middle"><i class="ft-plus-square icon-bg-circle bg-cyan"></i></div>
                                            <div class="media-body">
                                                <h6 class="media-heading">You have new order!</h6>
                                                <p class="notification-text font-small-3 text-muted">Lorem ipsum dolor sit amet, consectetuer elit.</p><small>
                                                    <time datetime="2015-06-11T18:29:20+08:00" class="media-meta text-muted">30 minutes ago</time></small>
                                            </div>
                                        </div></a><a href="javascript:void(0)" class="list-group-item">
                                        <div class="media">
                                            <div class="media-left valign-middle"><i class="ft-download-cloud icon-bg-circle bg-red bg-darken-1"></i></div>
                                            <div class="media-body">
                                                <h6 class="media-heading red darken-1">99% Server load</h6>
                                                <p class="notification-text font-small-3 text-muted">Aliquam tincidunt mauris eu risus.</p><small>
                                                    <time datetime="2015-06-11T18:29:20+08:00" class="media-meta text-muted">Five hour ago</time></small>
                                            </div>
                                        </div></a><a href="javascript:void(0)" class="list-group-item">
                                        <div class="media">
                                            <div class="media-left valign-middle"><i class="ft-alert-triangle icon-bg-circle bg-yellow bg-darken-3"></i></div>
                                            <div class="media-body">
                                                <h6 class="media-heading yellow darken-3">Warning notifixation</h6>
                                                <p class="notification-text font-small-3 text-muted">Vestibulum auctor dapibus neque.</p><small>
                                                    <time datetime="2015-06-11T18:29:20+08:00" class="media-meta text-muted">Today</time></small>
                                            </div>
                                        </div></a><a href="javascript:void(0)" class="list-group-item">
                                        <div class="media">
                                            <div class="media-left valign-middle"><i class="ft-check-circle icon-bg-circle bg-cyan"></i></div>
                                            <div class="media-body">
                                                <h6 class="media-heading">Complete the task</h6><small>
                                                    <time datetime="2015-06-11T18:29:20+08:00" class="media-meta text-muted">Last week</time></small>
                                            </div>
                                        </div></a><a href="javascript:void(0)" class="list-group-item">
                                        <div class="media">
                                            <div class="media-left valign-middle"><i class="ft-file icon-bg-circle bg-teal"></i></div>
                                            <div class="media-body">
                                                <h6 class="media-heading">Generate monthly report</h6><small>
                                                    <time datetime="2015-06-11T18:29:20+08:00" class="media-meta text-muted">Last month</time></small>
                                            </div>
                                        </div></a></li>
                                <li class="dropdown-menu-footer"><a href="javascript:void(0)" class="dropdown-item text-muted text-xs-center">Read all notifications</a></li>
                            </ul>
                        </li>
                        <li class="dropdown dropdown-notification nav-item"><a href="#" data-toggle="dropdown" class="nav-link nav-link-label"><i class="ficon ft-mail"></i><span class="tag tag-pill tag-default tag-warning tag-default tag-up">3</span></a>
                            <ul class="dropdown-menu dropdown-menu-media dropdown-menu-right">
                                <li class="dropdown-menu-header">
                                    <h6 class="dropdown-header m-0"><span class="grey darken-2">Messages</span><span class="notification-tag tag tag-default tag-warning float-xs-right m-0">4 New</span></h6>
                                </li>
                                <li class="list-group scrollable-container"><a href="javascript:void(0)" class="list-group-item">
                                        <div class="media">
                                            <div class="media-left"><span class="avatar avatar-sm  rounded-circle"><i class="ft-head"></i></span></div>
                                            <div class="media-body">
                                                <h6 class="media-heading">Margaret Govan</h6>
                                                <p class="notification-text font-small-3 text-muted">I like your portfolio, let's start the project.</p><small>
                                                    <time datetime="2015-06-11T18:29:20+08:00" class="media-meta text-muted">Today</time></small>
                                            </div>
                                        </div></a><a href="javascript:void(0)" class="list-group-item">
                                        <div class="media">
                                            <div class="media-left"><span class="avatar avatar-sm  rounded-circle"><i class="ft-head"></i></span></div>
                                            <div class="media-body">
                                                <h6 class="media-heading">Bret Lezama</h6>
                                                <p class="notification-text font-small-3 text-muted">I have seen your work, there is</p><small>
                                                    <time datetime="2015-06-11T18:29:20+08:00" class="media-meta text-muted">Tuesday</time></small>
                                            </div>
                                        </div></a><a href="javascript:void(0)" class="list-group-item">
                                        <div class="media">
                                            <div class="media-left"><span class="avatar avatar-sm  rounded-circle"><i class="ft-head"></i></span></div>
                                            <div class="media-body">
                                                <h6 class="media-heading">Carie Berra</h6>
                                                <p class="notification-text font-small-3 text-muted">Can we have call in this week ?</p><small>
                                                    <time datetime="2015-06-11T18:29:20+08:00" class="media-meta text-muted">Friday</time></small>
                                            </div>
                                        </div></a><a href="javascript:void(0)" class="list-group-item">
                                        <div class="media">
                                            <div class="media-left"><span class="avatar avatar-sm  rounded-circle"><i class="ft-head"></i></span></div>
                                            <div class="media-body">
                                                <h6 class="media-heading">Eric Alsobrook</h6>
                                                <p class="notification-text font-small-3 text-muted">We have project party this saturday night.</p><small>
                                                    <time datetime="2015-06-11T18:29:20+08:00" class="media-meta text-muted">last month</time></small>
                                            </div>
                                        </div>
                                    </a>
                                </li>
                                <li class="dropdown-menu-footer"><a href="javascript:void(0)" class="dropdown-item text-muted text-xs-center">Read all messages</a></li>
                            </ul>
                        </li>
                        <li class="dropdown dropdown-user nav-item">
                            <a href="#" data-toggle="dropdown" class="dropdown-toggle nav-link dropdown-user-link"><span class="avatar">
<i class="ft-head"></i> </span><span class="user-name">Amitav</span></a>
                            <div class="dropdown-menu dropdown-menu-right">
                                <a href="#" class="dropdown-item"><i class="ft-mail"></i> My Inbox</a>
                                <a href="#" class="dropdown-item"><i class="ft-cog"></i> Change Password</a>
                                <div class="dropdown-divider"></div><a href="{{ route('logout') }}"  onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();" class="dropdown-item"><i class="ft-power"></i> Logout</a>


                                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                    {{ csrf_field() }}
                                </form>


                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </nav>

    <!-- ////////////////////////////////////////////////////////////////////////////-->


    <!-- Horizontal navigation-->
    <div role="navigation" data-menu="menu-wrapper" class="header-navbar navbar navbar-horizontal navbar-fixed navbar-without-dd-arrow navbar-shadow menu-border navbar-brand-center navbar-light">
        <!-- Horizontal menu content-->
        <div data-menu="menu-container" class="navbar-container main-menu-content">
            <!-- include ../../../includes/mixins-->
            <ul id="main-menu-navigation" data-menu="menu-navigation" class="nav navbar-nav">
                <li class="nav-item"><a href="index.htm" class="nav-link"><i class="fa fa-dashboard"></i><span>Dashboard</span></a></li>
                <li data-menu="dropdown" class="dropdown nav-item"><a href="#" data-toggle="dropdown" class="dropdown-toggle nav-link"><i class="ft-paper"></i><span>Bills Allocation</span></a>
                    <ul class="dropdown-menu">
                        <li><a href="#" data-toggle="dropdown" class="dropdown-item">New Allocations</a></li>
                        <li data-menu="dropdown-submenu" class="dropdown dropdown-submenu"><a href="#" data-toggle="dropdown" class="dropdown-item dropdown-toggle">Pending Allocations</a>
                            <ul class="dropdown-menu">
                                <li data-menu=""><a href="signed_bills.htm" data-toggle="dropdown" class="dropdown-item">Signed bills</a></li>
                                <li data-menu=""><a href="receipts.htm" data-toggle="dropdown" class="dropdown-item">Receipts</a></li>
                            </ul>
                        </li>
                    </ul>
                </li>
                <li data-menu="dropdown" class="dropdown nav-item"><a href="#" data-toggle="dropdown" class="dropdown-toggle nav-link"><i class="ft-layout"></i><span>Temporary Bills</span></a>
                    <ul class="dropdown-menu">
                        <li><a href="#" data-toggle="dropdown" class="dropdown-item">Billing</a></li>
                        <li><a href="#" data-toggle="dropdown" class="dropdown-item">Product & Salesmen Wise</a></li>
                        <li><a href="#" data-toggle="dropdown" class="dropdown-item">Retailerwise Balances</a></li>
                    </ul>
                </li>
                <li data-menu="dropdown" class="dropdown nav-item"><a href="#" data-toggle="dropdown" class="dropdown-toggle nav-link"><i class="ft-layout"></i><span>Cheque Detail</span></a>
                    <ul class="dropdown-menu">
                        <li><a href="cheque_register.htm" data-toggle="dropdown" class="dropdown-item">Cheque Register</a></li>
                        <li><a href="cheque_bounce.htm" data-toggle="dropdown" class="dropdown-item">Cheque Bounce Register</a></li>
                        <li><a href="pending_bounce_cheque.htm" data-toggle="dropdown" class="dropdown-item">Pending Bounce Cheques</a></li>
                    </ul>
                </li>
            </ul>
        </div>
        <!-- /horizontal menu content-->
    </div>
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
                                <li class="breadcrumb-item active"><a href="#">Unallocated Bills</a></li>
                            </ol>
                        </div>
                    </div>
                </div>

            </div>
            <div class="content-body"><!-- Basic form layout section start -->
                <section id="basic-form-layouts">
                    <div class="card">
                        <div class="card-header">
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
                                            <div class="alert alert-danger alert-dismissable">
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

                                    <div class="row">
                                        <div class="col-md-11">



                                            <div class="row m-t-20">
                                                <div class="col-md-12">
                                                    <div class="table-responsive">
                                                        <table class="table mb-0 font-10 light-gray ">

                                                            <tr class="head">
                                                                <td colspan="11"> Bills Allocation History</td>
                                                            </tr>
                                                            <tr class="gray">
                                                                <th>S No.</th>
                                                                <th>Bill No.</th>
                                                                <th>Allocation No.</th>
                                                                <th>Bill Date</th>
                                                                <th>Retailer Name</th>
                                                                <th>Bill Amt</th>
                                                                <th>Employee</th>
                                                                <th>Remark</th>
                                                            </tr>
                                                            {{--                                                            {{dd($unallocatedBilldata)}}--}}
                                                            @if(isset($billdata) && $billdata->count() > 0)
                                                                @foreach($billdata as $key_supply => $value_supply)
                                                                    <tr @php
                                                                        if($key_supply%2 != 0){
                                                                        echo 'class="odd"';
                                                                        }
                                                                    @endphp>
                                                                        <td>{{$key_supply + 1}}</td>
                                                                        <td>{{$value_supply->billNo}}</td>
                                                                        <td>{{$value_supply->allocationNo}}</td>
                                                                        <td>{{$value_supply->created_at}}</td>
                                                                        <td>{{$value_supply->retailerName}}</td>
                                                                        <td>{{$value_supply->billAmount}}</td>

                                                                        <td>
                                                                              @foreach ($value_supply->field as $k =>$v)
                                                                                          {{$v->name}}
                                                                            @endforeach
                                                                        </td>
                                                                        <td>x</td>
                                                                    </tr>
                                                                @endforeach
                                                            @endif
                                                        </table>
                                                    </div>
                                                    <br />

                                                    <br/>
                                                    <br />
                                                    <br />
                                                    <table class="table mb-0 font-10 light-gray ">

                                                        <tr class="head">
                                                            <td colspan="11">Bills details</td>
                                                        </tr>
                                                        <tr class="gray">
                                                            <th>S No.</th>
                                                            <th>retailerHierarchy</th>
                                                           <th> productName</th>
                                                            <th>date</th>
                                                            <th>MRP</th>
                                                            <th>netAmount</th>
                                                            <th>brandCaption</th>
                                                            <th>Remark</th>
                                                        </tr>
                                                        {{--                                                            {{dd($unallocatedBilldata)}}--}}
                                                        @if(isset($billproduct) && $billproduct->count() > 0)
                                                            @foreach($billproduct as $key_supply => $value_supply)
                                                                <tr @php
                                                                    if($key_supply%2 != 0){
                                                                    echo 'class="odd"';
                                                                    }
                                                                @endphp>
                                                                    <td>{{$key_supply + 1}}</td>
                                                                    <td>{{$value_supply->retailerHierarchy}}</td>
                                                                    <td>{{$value_supply->productName}}</td>
                                                                    <td>{{$value_supply->created_at}}</td>

                                                                    <td>{{$value_supply->MRP}}</td>
                                                                    <td>{{$value_supply->netAmount}}</td>


                                                                    <td>{{$value_supply->brandCaption}}</td>

                                                                    </td>
                                                                    <td>x</td>
                                                                </tr>
                                                            @endforeach
                                                        @endif
                                                    </table>




                                                </div>
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