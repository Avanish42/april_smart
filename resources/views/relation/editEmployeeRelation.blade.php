@extends('app')
@section('pagetitle')
    Add Employee
@endsection

@section('main-content')
    {{--<h1>this is h1</h1>--}}
    <section class="content">
        <div class="container-fluid">
            <div class="block-header">
                <h2>Employee</h2>
            </div>


            <!-- Horizontal Layout -->
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>
                                Add Roles to Employee
                            {{--{{print_r($allrole)}}--}}
                            {{--{{print_r($employee[0])}}--}}
                                {{--{{ $employee[0]['name'] }}--}}
                                </h2>

                        </div>
                        <div class="body">
                            <form method="POST" enctype="multipart/form-data"  id="add_attribute" action="{{ url('/Relation/updateEmployeeRelation')  }}">
                                {{csrf_field()}}



                                <div class="row clearfix">
                                    <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                        <label for="email_address_2">Current Status</label>
                                    </div>
                                    <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                                        <div class="form-group">
                                            <div class="form-line">
                                                <input type="text" name="id" value="{{$employee[0]['id']}}" hidden>
                                                <h5>{{"Name: ". $employee[0]['name']   }}</h5>
                                                <h5>{{"Email: ". $employee[0]['email']   }}</h5>
{{--                                               {{print_r($employee[0]['roles'])}}--}}

                                                <div>
                                                    @if($employee[0]['roles'])
                                                        <ul>
                                                            @foreach($employee[0]['roles'] as $k=>$v)
                                                                <li><span class="label label-success"> {{ ($v['display_name']) }}</span> </li>
                                                            @endforeach
                                                        </ul>
                                                    @else
                                                        <ul><li ><span class="label label-danger">  {{"None"}}</span></li></ul>
                                                    @endif
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <hr>


                        <div class="row">
                            <div class="col-md-6">
                                <h3>Add Roles </h3>
                                <p>(You  assign  these new roles to employee - Please check the box for add role )</p>

                                <hr>
                                <div class="demo-checkbox">
                                    @foreach($allrole as $k=>$v)

                                        <input type="checkbox" id="md_checkbox_21{{$k}}" class="filled-in chk-col-blue" name="addroles[]" value={{$v['name'] }}  >
                                        <label for="md_checkbox_21{{$k}}">{{ $v['display_name']}}</label><br>
                                    @endforeach

                                </div>
                            </div>

                            <div class="col-md-6">
                                <h3>Remove Role </h3>
                                <p>(You already assign these roles to employee - Please check the box for remove role )</p>
                                <hr>

                                <div class="demo-checkbox">
                                    @foreach($employee[0]['roles'] as $k=>$v)

                                        <input type="checkbox" id="md_checkbox_21{{$k+20}}" class="filled-in chk-col-red" name="removeroles[]" value={{$v['name'] }}  >
                                        <label for="md_checkbox_21{{$k+20}}">{{ $v['display_name']}}</label><br>
                                    @endforeach

                                </div>
                            </div>
                        </div>



                                <div class="row clearfix">
                                    <div class="col-lg-offset-2 col-md-offset-2 col-sm-offset-4 col-xs-offset-5">
                                        <button  type="submit" class="btn btn-primary m-t-15 waves-effect">Submit</button>
                                        <button  type="reset" class="btn btn-primary m-t-15 waves-effect">Reset</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <!-- #END# Horizontal Layout -->



            <!-- #END# Inline Layout | With Floating Label -->

        </div>
    </section>
@endsection
