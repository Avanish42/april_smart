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
    URL::   {{url('/').'/api/cash-collection'}}

</h1>
<form method="POST" enctype="multipart/form-data" action="{{url('/api/cash-collection')}}" >

    Bill ID(bill_id) ::<span style="color: red">* </span><input type="text" name="bill_id">

    <br />
    <br />

    User ID(user_id) ::<span style="color: red">* </span><input type="text" name="user_id">

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