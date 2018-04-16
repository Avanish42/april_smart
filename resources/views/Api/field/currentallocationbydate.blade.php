<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Api-Panel</title>
    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <!-- Jquery Core Js -->
    <script src="{{URL::asset('public/plugins/jquery/jquery.min.js')}}"></script>


</head>
<body>

<h1>
    URL::   {{url('/').'/api/current-allocation-by-date'}}

</h1>
<form method="POST" enctype="multipart/form-data" action="{{url('/api/current-allocation-by-date')}}" >

    Staff Id(staff_id) ::<span style="color: red">*</span>  <select name="staff_id">
        <option >Please select</option>
@foreach($staff as $key_stf => $value_stf)
        <option value="{{$value_stf['id']}}">{{$value_stf['name']}}</option>
        @endforeach


    </select>

    <br />
    <br />




    <button class="btn btn-block btn-lg bg-pink waves-effect" type="submit">Submit</button>

</form>
</br>

<script type="text/javascript">
    $(document).ready(function () {

    });
</script>

</body>
</html>