<!-- Jquery Core Js -->
<script src="{{URL::asset('plugins/jquery/jquery.min.js')}}"></script>
<!-- Bootstrap Core Js -->
<script src="{{URL::asset('plugins/bootstrap/js/bootstrap.js')}}"></script>
<script src="{{URL::asset('js/userjs/vendors.min.js')}}"></script>
<script src="{{URL::asset('js/userjs/jquery.sticky.js')}}"></script>
<script src="{{URL::asset('js/userjs/icheck.min.js')}}"></script>
<script src="{{URL::asset('js/userjs/app-menu.min.js')}}"></script>
<script src="{{URL::asset('js/userjs/app.min.js')}}"></script>
<script src="{{URL::asset('js/userjs/jquery.sparkline.min.js')}}"></script>
<script src="{{URL::asset('js/userjs/bootstrap-typeahead.js')}}"></script>
<script type="text/javascript" src="https://cdn.datatables.net/v/dt/dt-1.10.16/datatables.min.js"></script>
<script src="{{ URL::asset('plugins/bootstrap-notify/bootstrap-notify.js') }}"></script>
<script src="{{URL::asset('js/userjs/userscript.js')}}"></script>
<script>


var Bills = [];
var Allocation = [];
var UnallocatedBills = [];
var pastallocationBills = [];
</script>
@if(isset($billarray))

    <script type="text/javascript">


        Bills = {!! json_encode($billarray) !!}
        {{--var Allocation= {!! json_encode($allocationarray) !!}--}}


    </script>


@endif
@if(isset($pastallocationBills))

    <script type="text/javascript">


        pastallocationBills = {!! json_encode($pastallocationBills) !!}
        {{--var Allocation= {!! json_encode($allocationarray) !!}--}}


    </script>


@endif
@if(isset($UnallocatedBills))

    <script type="text/javascript">


        UnallocatedBills = {!! json_encode($UnallocatedBills) !!}
        {{--var Allocation= {!! json_encode($allocationarray) !!}--}}


    </script>


@endif

@if(isset($allocationarray))

    <script type="text/javascript">


        {{--        var Bills= {!! json_encode($billarray) !!}--}}
            Allocation = {!! json_encode($allocationarray) !!}


    </script>


@endif



<script type="text/javascript">
    var APP_URL =
            {!! json_encode(url('/')) !!}
    var token = '{!! csrf_token() !!}'
</script>


<script>


    $(document).ready(function () {


    });


</script>




{{--<script src="{{URL::asset('js/userjs/breadcrumbs-with-stats.min.js')}}"></script>--}}
{{--<script src="{{URL::asset('js/userjs/customizer.min.js')}}"></script>--}}





