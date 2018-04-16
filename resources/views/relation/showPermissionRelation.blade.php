@extends('app')
@section('pagetitle')
     Roles Permission
@endsection

@section('main-content')
    <section class="content">
        <div class="container-fluid">
            <div class="block-header">
                <h2>
                      Roles <-> Permission
                </h2>
            </div>
            <!-- Basic Examples -->
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">

                    <div class="card">
                        <div class="header">
                            <h2> Roles
                            </h2>
                            <h2 style="float: right"><button class="bth btn-primary" >Add New Permission To Role</button> </h2>
                        </div>
                        <div class="body">
                            <table class="table table-bordered table-striped table-hover js-basic-example dataTable" >
                                <thead>
                                <tr>
                                    <th>Role Name</th>
                                    <th>Permission</th>
                                    <th>Edit Permission</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($role as $key => $value)
                                    <tr>
                                        <td>{{ $value['display_name'] }}</td>
                                        <td>

                                            @if($value['perms'] )
                                                <ul>
                                                    @foreach($value['perms'] as $k=>$v)
                                                        <li><span class="label label-success"> {{ ($v['display_name']) }}</span> </li>
                                                    @endforeach
                                                </ul>
                                            @else
                                                <ul><li ><span class="label label-danger">  {{"None"}}</span></li></ul>
                                            @endif
                                        </td>
                                        <td><a href="{{url('Relation/editPermissionRelation').'/'.$value['id']}}"> <button type="submit" class="btn btn-primary m-t-15 waves-effect">Edit</button></a></td>

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

