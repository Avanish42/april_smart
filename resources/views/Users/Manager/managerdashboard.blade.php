
@extends('Users.userapp')
@section('pagetitle')
    Allocation
@endsection
@section('main-content')
    <br>
    <br>
    <br>



                <div class="text-center">
            <h1>Welcome to Manager Dashboard</h1>

        <button type="submit" class="btn btn-default"><a href="/create-allocation-no"> <button class="btn btn-lg">Create New Allocation</button> </a></button>
        <button type="submit" class="btn btn-default"><a href="/unallocatedBills"> <button class="btn btn-lg">Unallocated Bills </button></a></button>


    </div>
    <div >
        <button type="submit" class="btn btn-default"><a href="javascript:void(0)"> <button class="btn btn-lg">upload The  Sheet </button></a></button>

        <form method="post" action="{{url('/sheetUpload')}}" enctype="multipart/form-data">
            {{csrf_field()}}
            <input  type="file" name="sheet">
            <input type="submit" value="Upload">
        </form>
    </div>

    <div>
        <button type="submit" class="btn btn-default"><a href="javascript:void(0)"> <button class="btn btn-lg">upload The  details bills </button></a></button>

        <form method="post" action="{{url('/billDetailsUpload')}}" enctype="multipart/form-data">
            {{csrf_field()}}
            <input  type="file" name="billdetails">
            <input type="submit" value="Upload">
        </form>
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
    {{--<div class="text-center">--}}
    {{--<form method="post" action="{{ url('/searchAllocation') }}" >--}}
    {{--{{csrf_field()}}--}}
    {{--<h3> Search By Allocation No</h3>--}}
    {{--<input type="text" name="allocation">--}}
    {{--<input type="submit" value="Search">--}}
    {{--</form>--}}
    {{--</div>--}}
    <br>
    <br>
    <br>

    {{--<div class="text-center">--}}

    </div>

            {{--<form method="post" action="{{ url('/searchBill') }}" >--}}
            {{--{{csrf_field()}}--}}
            {{--<h3> Search By Bill No.</h3>--}}
            {{--<input type="text" name="BillNo">--}}
            {{--<input type="submit" value="Search">--}}
            {{--</form>--}}
            {{--</div>--}}

@endsection