<!DOCTYPE html>
<html>

@include("Users.comman.header")

{{--<body class="theme-red">--}}
<script type="text/javascript">
    var APP_URL = {!! json_encode(url('/')) !!}
    var token = '{!! csrf_token() !!}'

</script>

@if(session('status') && session('status') == 101)
    <script type="text/javascript">
        var status = {!! json_encode(session('status')) !!}
        var message = {!! json_encode(session('message')) !!}
    </script>
@endif
@yield('main-content')
<div class="loading"></div>
@include("Users.comman.footer")
</body>
</html>