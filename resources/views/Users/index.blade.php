
@extends('Users.userapp')
@section('pagetitle')
    Smart Distributer
@endsection
@section('main-content')
    <body data-open="hover" data-menu="horizontal-menu" data-col="1-column" class="horizontal-layout horizontal-menu 1-column login  menu-expanded blank-page blank-page  pace-done">
    <!-- ////////////////////////////////////////////////////////////////////////////-->
    <div class="app-content content container-fluid">
        <div class="content-wrapper">
            <div class="content-header row">
            </div>
            <div class="content-body">
                <section class="flexbox-container">
                    <div class="col-md-4 offset-md-4 col-xs-10 offset-xs-1 box-shadow-3 p-0">
                        <div class="card border-grey border-lighten-3 px-1 py-1 m-0">
                            <div class="card-header no-border">
                                <div class="card-title text-xs-center">
                                    <img src="images/logo.png" alt="branding logo">
                                </div>
                                <h6 class="card-subtitle line-on-side text-muted text-xs-center font-small-3 pt-2"><span>Easily Using</span></h6>
                            </div>
                            <div class="card-body collapse in">
                                <div class="text-xs-center">
                                    <a href="#" class="btn btn-social-icon mr-1 mb-1 btn-outline-facebook"><span class="fa fa-facebook"></span></a>
                                    <a href="#" class="btn btn-social-icon mr-1 mb-1 btn-outline-twitter"><span class="fa fa-twitter"></span></a>
                                    <a href="#" class="btn btn-social-icon mr-1 mb-1 btn-outline-google"><span class="fa fa-google-plus"></span></a>
                                </div>
                                <p class="card-subtitle line-on-side text-muted text-xs-center font-small-3 mx-2 my-1"><span>OR Using Account Details</span></p>
                                <div class="card-block">
                                    <form class="form-horizontal" method="post" action="{{url('/authenticate')}}" novalidate>
                                        {{csrf_field()}}
                                        <fieldset class="form-group position-relative has-icon-left">
                                            <input type="text" class="form-control" id="user-name" name="email" placeholder="Your Username" required>
                                            <div class="form-control-position">
                                                <i class="ft-head"></i>
                                            </div>
                                        </fieldset>
                                        <fieldset class="form-group position-relative has-icon-left">
                                            <input type="password" class="form-control" id="user-password" name="password" placeholder="Enter Password" required>
                                            <div class="form-control-position">
                                                <i class="fa fa-key"></i>
                                            </div>
                                        </fieldset>
                                        <fieldset class="form-group row">
                                            <div class="col-md-6 col-xs-12 text-xs-center text-sm-left">
                                                <fieldset>
                                                    <label class="custom-control custom-checkbox">
                                                        <input type="checkbox" class="custom-control-input">
                                                        <span class="custom-control-indicator"></span>
                                                        <span class="custom-control-description">Remember Me</span>
                                                    </label>
                                                </fieldset>

                                            </div>
                                            <div class="col-md-6 col-xs-12 float-sm-left text-xs-center text-sm-right"><a href="#" class="card-link">Forgot Password?</a></div>
                                        </fieldset>
                                        {{--<button type="submit" class="btn btn-outline-primary btn-block"><i class="fa fa-unlock-alt"></i> Login</button>--}}
                                        <input type="submit" class="btn btn-outline-primary btn-block"  value="Login"><i class="fa fa-unlock-alt"></i>
                                    </form>
                                </div>
                                <p class="card-subtitle text-muted text-xs-center font-small-3 mx-2 my-1"><span>New User ?</span> <a href="#" class="card-link">Sign Up</a></p>

                            </div>
                        </div>
                    </div>
                </section>

            </div>
        </div>
    </div>
    <!-- ////////////////////////////////////////////////////////////////////////////-->


    <!-- BEGIN VENDOR JS-->
    {{--<script src="js/vendors.min.js" type="text/javascript"></script>--}}

    {{--<script type="text/javascript" src="js/jquery.sticky.js"></script>--}}

    {{--<script src="js/icheck.min.js" type="text/javascript"></script>--}}
    {{--<!-- END PAGE VENDOR JS-->--}}
    {{--<!-- BEGIN STACK JS-->--}}
    {{--<script src="js/app-menu.min.js" type="text/javascript"></script>--}}
    {{--<script src="js/app.min.js" type="text/javascript"></script>--}}


@endsection