
@extends('Users.userapp')
@section('pagetitle')
    Allocation
@endsection
@section('main-content')
    <br>
    <br>
    <br>

    <div class="text-center">
        <h1>Welcome to Cashier Dashboard</h1>
        <button type="submit" class="btn btn-default"><a href="/create-allocation-no"> <button class="btn btn-lg">Create New Allocation</button> </a></button>
    </div>
    <br>
    <br>
    <br>


    @if(session('status') && session('status') == 400)
        <div class="row">
            <div class="alert alert-danger alert-dismissable">
                <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                <strong>Warning!</strong> {{session('message')}}
            </div>
        </div>
    @endif
    <br>
    @if(session('status') && session('status') == 100)
        <div class="row">
            <div class="alert alert-success alert-dismissable">
                <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                <strong>Success!</strong> {{session('message')}}
            </div>
        </div>
    @endif
    <div class="text-center">
        <form method="post" action="{{ url('/searchAllocation') }}" >
            {{csrf_field()}}
            {{----}}
            <div class="ui-widget">
                <label for="allocationNo">allocation No.</label>
                <input id="allocationNo" autocomplete="off" name="allocation" >
            </div>
            <input type="submit" value="Search">
        </form>
    </div>
    <br>
    <br>
    <br>

    <div class="text-center">
        <form method="post" action="{{ url('/searchBill') }}" >
            {{csrf_field()}}
            <h3> Search By Bill No.</h3>
            <div class="ui-widget">
                <label for="billNo">Bill No. </label>
                <input id="billNo" autocomplete="off" name="BillNo">
            </div>

            <input type="submit" value="Search">
        </form>

        {{--<div class="ui-widget">--}}
            {{--<label for="billNo">Bill No. </label>--}}
            {{--<input id="billNo" autocomplete="off">--}}
        {{--</div>--}}

        {{--<div class="ui-widget">--}}
            {{--<label for="allocationNo">allocation No.</label>--}}
            {{--<input id="allocationNo" >--}}
        {{--</div>--}}

    </div>

@endsection