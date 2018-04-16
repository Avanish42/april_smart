@extends('app')
@section('pagetitle')
    Show Employee
@endsection

@section('main-content')
    <section class="content">
        <div class="container-fluid">
            <div class="block-header">
                <h2>
                    All Employee
                </h2>
            </div>
            <!-- Basic Examples -->
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">

                    <div class="card">
                        <div class="header">
                            <h2>
                                All Employee
                            </h2>

                        </div>
                        <div class="body">
                            <table class="table table-bordered table-striped table-hover js-basic-example dataTable" >
                                <thead>
                                <tr>
                                    <th>id</th>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Role</th>
                                    <th>Edit</th>
                                    <th>delete</th>
                                    <th>Status</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($employee as $key => $value)
                                    <tr>

                                        <td>{{ $value['id']}}</td>
                                        <td>{{ $value['name'] }}</td>
                                        <td>{{ $value['email'] }}</td>

                                        <td>

                                            @if($value['roles'])
                                            <ul>
                                                @foreach($value['roles'] as $k=>$v)
                                                <li><span class="label label-success"> {{ ($v['display_name']) }}</span> </li>
                                                @endforeach
                                            </ul>
                                            @else
                                                <ul><li ><span class="label label-danger">  {{"None"}}</span></li></ul>
                                            @endif
                                        </td>
                                        <td><a href="{{url('Employee/edit').'/'.$value['id']}}"> <button type="submit" class="btn btn-primary m-t-15 waves-effect">Edit</button></a></td>
                                        <td><a href="{{url('Employee/delete').'/'.$value['id']}}"> <button type="submit" class="btn btn-primary m-t-15 waves-effect">Delete</button></a></td>
                                        <td><a href="{{url('Role/status').'/'.$value['id']}}"> <button type="submit" class="btn btn-primary m-t-15 waves-effect">Active</button></a></td>

                                    </tr>

                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <!-- #END# Basic Examples -->
        </div>
    </section>
@endsection

