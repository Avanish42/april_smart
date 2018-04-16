@extends('Users.userapp')
@section('pagetitle')
    TempBills
@endsection
@section('main-content')

<div ng-app="app"  ng-controller= "tempBill as temp" >

@{{temp.name}}

</div>

@endsection