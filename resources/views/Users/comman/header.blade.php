<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <meta name="description" content="Smart Distributor">
    <meta name="keywords" content="Smart Distributor">
    <meta name="author" content="Amitav">

    <link rel="shortcut icon" type="image/x-icon" href="images/favicon.png">
    <link href="https://fonts.googleapis.com/css?family=Montserrat:300,300i,400,400i,500,500i%7COpen+Sans:300,300i,400,400i,600,600i,700,700i" rel="stylesheet">

{{--<title>Smart Distributor</title>--}}
<!-- Favicon-->
    <link rel="icon" href="{{URL::asset('favicon.ico')}}" type="image/x-icon">

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:400,700&subset=latin,cyrillic-ext" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet" type="text/css">
    <!-- Bootstrap Core Css -->
    <link href="{{URL::asset('plugins/bootstrap/css/bootstrap.css')}}" rel="stylesheet">
    <link href="{{URL::asset('css/usercss/app.min.css')}}" rel="stylesheet">
    <link href="{{URL::asset('css/usercss/bootstrap-extended.min.css')}}" rel="stylesheet">
    <link href="{{URL::asset('css/usercss/bootstrap.min.css')}}" rel="stylesheet">
    <link href="{{URL::asset('css/usercss/feathericon.css')}}" rel="stylesheet">
    <link href="{{URL::asset('css/usercss/climacons.min.css')}}" rel="stylesheet">
    <link href="{{URL::asset('css/usercss/horizontal-menu.min.css')}}" rel="stylesheet">
    <link href="{{URL::asset('css/usercss/icheck.css')}}" rel="stylesheet">
    <link href="{{URL::asset('css/usercss/morris.css')}}" rel="stylesheet">
    <link href="{{URL::asset('css/usercss/style.css')}}" rel="stylesheet">
    <link href="{{URL::asset('css/usercss/timeline.min.css')}}" rel="stylesheet">
    <link href="{{URL::asset('css/usercss/unslider.css')}}" rel="stylesheet">
    <link href="{{URL::asset('css/usercss/vertical-overlay-menu.min.css')}}" rel="stylesheet">

    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/dt/dt-1.10.12/datatables.min.css"/>


    <script src="{{URL::asset('js/userjs/angular.js')}}"></script>
    <script src="{{URL::asset('js/userjs/app.module.js')}}"></script>
    <script src="{{URL::asset('js/userjs/app.tempbills.service.js')}}"></script>
    <script src="{{URL::asset('js/userjs/app.tempbills.controller.js')}}"></script>



    <title> @yield('pagetitle')</title>


    <style>

        .light-gray thead th, .light-gray tbody td {
            border: 1px solid #a9a7a7;
            vertical-align: middle;
        }

        .light-gray th {
            background: #FFE7CE;
            border: 1px solid #a9a7a7;
        }


        .btn {
            display: inline-block;
            line-height: 1.25;
            text-align: center;
            vertical-align: middle;
            cursor: pointer;
            -webkit-user-select: none;
            -moz-user-select: none;
            -ms-user-select: none;
            user-select: none;
            border: 1px solid transparent;
            padding: .75rem .48rem;
            font-size: 1rem;
            border-radius: .25rem;
            -webkit-transition: all .2s ease-in-out;
            -moz-transition: all .2s ease-in-out;
            -o-transition: all .2s ease-in-out;
            transition: all .2s ease-in-out;
        }

        .tblfooter{
            background:#333333;
            color:#fff;


        }

    </style>

</head>