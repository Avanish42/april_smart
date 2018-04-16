
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
                                                </div>

                                                <div class="col-sm-4 col-md-2">

                                                    <p>
                                                        <select id="Select1" class="selectemp"  >
                                                            <option>Tag Employee </option>
                                                            @foreach($staff as $s)
                                                                <option value="{{$s['id']}}">{{$s['name']}}</option>
                                                            @endforeach
                                                        </select></p>

                                                    <div class="all dropdown-menu" style="display: block; position: static; width: 100%; margin-top: 0; float: none;">
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



                                                            @if(isset($currentSupply) && $currentSupply->count() > 0)
                                                                @foreach($currentSupply as $key_supply => $value_supply)
                                                                    @if($value_supply->isPast == 1)
                                                                        @continue
                                                                    @endif
                                                                    <tr @php



                                                                        if($key_supply%2 != 0){
                                                                        echo 'class="odd"';
                                                                        }
                                                                    @endphp>
                                                                        <td>{{$key_supply + 1}}</td>
                                                                        <td>{{$value_supply->billNo}}</td>
                                                                        <td>{{$value_supply->allocationNo}}</td>
                                                                        <td> 2-Aug-17</td>
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
                                                                <td colspan="10">Past Bills</td>

                                                            </tr>
                                                            <tr class="gray" id="pastSupplyId">
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

                                                            @if(isset($currentSupply) && $currentSupply->count() > 0)
                                                                @foreach($currentSupply as $key_supply => $value_supply)
                                                                    @if($value_supply->isPast == 0)
                                                                        @continue
                                                                    @endif
                                                                    <tr @php



                                                                        if($key_supply%2 != 0){
                                                                        echo 'class="odd"';
                                                                        }
                                                                    @endphp>
                                                                        <td>{{$key_supply + 1}}</td>
                                                                        <td>{{$value_supply->billNo}}</td>
                                                                        <td>{{$value_supply->allocationNo}}</td>
                                                                        <td> 2-Aug-17</td>
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
                                                            <!--Bounced Cheques -->
                                                            <tr class="head">
                                                                <td colspan="11">Bounced Cheques</td>

                                                            </tr>

                                                            <tr class="gray">
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

                                                            <tr>
                                                                <td>1</td>
                                                                <td>123456</td>
                                                                <td>2-Jul-17</td>
                                                                <td>Baba Sales</td>
                                                                <td>12,243 </td>
                                                                <td>250</td>
                                                                <td>2,213 </td>
                                                                <td>10,280 </td>
                                                                <td>-</td>
                                                                <td>x</td>


                                                            </tr>
                                                            <tr class="odd">
                                                                <td>2</td>
                                                                <td>3344567</td>
                                                                <td>22-Aug-17</td>
                                                                <td>Krishna Sales</td>
                                                                <td>2,341</td>
                                                                <td>250</td>
                                                                <td>-</td>
                                                                <td>2,549</td>
                                                                <td>-</td>
                                                                <td>x</td>

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

                                                            <tr class="gray">
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

                                                            <tr>
                                                                <td>1</td>
                                                                <td>NS1812345324</td>
                                                                <td>2-Aug-17</td>
                                                                <td>Baba Sales</td>
                                                                <td>10,000</td>
                                                                <td>200</td>
                                                                <td>2000</td>
                                                                <td>8,200</td>
                                                                <td>-</td>
                                                                <td>x</td>

                                                            </tr>
                                                            <tr class="odd">
                                                                <td>2</td>
                                                                <td>NS1812345324</td>
                                                                <td>22-Aug-17</td>
                                                                <td>Krishna Sales</td>
                                                                <td>5,000</td>
                                                                <td>500</td>
                                                                <td>1000</td>
                                                                <td>4,500</td>
                                                                <td>-</td>
                                                                <td>x</td>

                                                            </tr>
                                                            <tr>
                                                                <td>3</td>
                                                                <td>NS1812345455</td>
                                                                <td>12-Aug-17</td>
                                                                <td>Sai Sales</td>
                                                                <td>15,345</td>
                                                                <td>-</td>
                                                                <td>5,000</td>
                                                                <td>10,345</td>
                                                                <td>-</td>
                                                                <td>x</td>

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