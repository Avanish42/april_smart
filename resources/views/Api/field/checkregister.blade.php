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
    URL::   {{url('/').'/api/check-register'}}

</h1>
<form method="POST" enctype="multipart/form-data" action="{{url('/api/check-register')}}" >

    Staff Id(user_id) ::<span style="color: red">*</span>  <select name="user_id">
        <option >Please select</option>
        @foreach($staff as $key_stf => $value_stf)
            <option value="{{$value_stf['id']}}">{{$value_stf['name']}}</option>
        @endforeach


    </select>

    <br />
    <br />

    Bill Id(bill_id) ::<span style="color: red">* </span><input type="text" name="bill_id">
    <br />
    <br />

    Retailer Name(retailer_name) ::<span style="color: red">* </span><input type="text" name="retailer_name">

    <br />
    <br />

    Bill No.(billno) ::<span style="color: red">* </span><input type="text" name="billno">

    <br />
    <br />

    Allocation No.(allocationNo) ::<span style="color: red">* </span><input type="text" name="allocationNo">

    <br />
    <br />

    Amount(amount) ::<span style="color: red">* </span><input type="text" name="amount">

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