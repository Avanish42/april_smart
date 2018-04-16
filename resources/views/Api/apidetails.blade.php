<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Api-Panel</title>
    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <link rel="stylesheet" href="/resources/demos/style.css">
    <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    <script>
        $( function() {
            $( "#accordion" ).accordion();
        } );
    </script>
</head>
<body>

<div id="accordion">
    <h3>Field Staff</h3>
    <div>

        <p><a href="{{url('/field-staff-login-form')}}">Field Staff Login</a></p>
        <p><a href="{{url('/current-allocation-form')}}">Current Allocation by current date</a></p>
        <p><a href="{{url('/update-bill-form')}}">Update bill by Id</a></p>
        <p><a href="{{url('/bill-product-form')}}">Bill product by bill no</a></p>
        <p><a href="{{url('/cash-collection-form')}}">Cash Collection</a></p>
        <p><a href="{{url('/check-register-form')}}">Check Register</a></p>
        <p><a href="{{url('/sale-return-form')}}">Sale Return</a></p>


    </div>


</div>



</body>
</html>