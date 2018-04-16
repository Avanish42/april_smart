@extends('app')
@section('pagetitle')
    Show Penalty
@endsection

@section('main-content')

    <section class="content">
        <div class="container-fluid">
            <div class="block-header">
                <h2>
                    All Penalty
                </h2>
            </div>
            <!-- Basic Examples -->
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">

                    <div class="card">
                        <div class="header">
                            <h2>
                                All Cheque Penalty
                            </h2>

                        </div>
                        <div class="body">
                            <table class="table table-bordered table-striped table-hover js-basic-example dataTable" >
                                <thead>
                                <tr>
                                    <th>id</th>
                                    <th>Name</th>
                                    <th>Amount</th>
                                    <th>Discription</th>
                                    <th>Edit</th>
                                    <th>delete</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($penalty as $key => $value)
                                    <tr>

                                        <td>{{ $value['id']}}</td>
                                        <td>{{ $value['name'] }}</td>
                                        <td>{{ $value['amount'] }}</td>
                                        <td>{{ $value['description'] }}</td>
                                        <td><a href="{{url('ChequePenalty/edit').'/'.$value['id']}}"> <button type="submit" class="btn btn-primary m-t-15 waves-effect">Edit</button></a></td>
                                        <td><a href="{{url('ChequePenalty/delete').'/'.$value['id']}}"> <button type="submit" class="btn btn-primary m-t-15 waves-effect">Delete</button></a></td>
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

