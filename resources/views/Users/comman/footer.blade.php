<!-- Jquery Core Js -->
<script src="{{URL::asset('plugins/jquery/jquery.min.js')}}"></script>
<!-- Bootstrap Core Js -->
<script src="{{URL::asset('plugins/bootstrap/js/bootstrap.js')}}"></script>
<script src="{{URL::asset('js/userjs/vendors.min.js')}}"></script>
<script src="{{URL::asset('js/userjs/jquery-ui.min.js')}}"></script>
<script src="{{URL::asset('js/userjs/jquery.sticky.js')}}"></script>
<script src="{{URL::asset('js/userjs/icheck.min.js')}}"></script>
<script src="{{URL::asset('js/userjs/app-menu.min.js')}}"></script>
<script src="{{URL::asset('js/userjs/app.min.js')}}"></script>
<script src="{{URL::asset('js/userjs/jquery.sparkline.min.js')}}"></script>
<script src="{{URL::asset('js/userjs/bootstrap-typeahead.js')}}"></script>
{{--<script type="text/javascript" src="https://cdn.datatables.net/v/dt/dt-1.10.16/datatables.min.js"></script>--}}
<script src="{{URL::asset('plugins/jquery-datatable/jquery.dataTables.js')}}"></script>
<script src="{{ URL::asset('plugins/bootstrap-notify/bootstrap-notify.js') }}"></script>


@if(isset($page) && $page && $page=='cheque-completed')

    <script src="{{URL::asset('plugins/jquery-datatable/extensions/export/dataTables.buttons.min.js')}}"></script>
    <script src="{{URL::asset('plugins/jquery-datatable/extensions/export/buttons.flash.min.js')}}"></script>
    <script src="{{URL::asset('plugins/jquery-datatable/extensions/export/jszip.min.js')}}"></script>
    <script src="{{URL::asset('plugins/jquery-datatable/extensions/export/pdfmake.min.js')}}"></script>
    <script src="{{URL::asset('plugins/jquery-datatable/extensions/export/vfs_fonts.js')}}"></script>
    <script src="{{URL::asset('plugins/jquery-datatable/extensions/export/buttons.html5.min.js')}}"></script>
    <script src="{{URL::asset('plugins/jquery-datatable/extensions/export/buttons.print.min.js')}}"></script>
@endif

<script src="{{URL::asset('js/userjs/combo.js')}}"></script>
<script src="{{URL::asset('js/userjs/userscript.js')}}"></script>
<script>


var Bills = [];
var Allocation = [];
var UnallocatedBills = [];
var pastallocationBills = [];
var bankName = [];
var unallocatedcheques = [];
var products = [];
var retailers = [];
var tempInvoice = '';
</script>
@if(isset($UnallocatedCheques))
    <script type="text/javascript">
        unallocatedcheques = {!! json_encode($UnallocatedCheques) !!}
    </script>
@endif
@if(isset($billarray))
    <script type="text/javascript">
       Bills = {!! json_encode($billarray) !!}
    </script>
@endif
@if(isset($pastallocationBills))
    <script type="text/javascript">
        pastallocationBills = {!! json_encode($pastallocationBills) !!}
    </script>
@endif
@if(isset($UnallocatedBills))
    <script type="text/javascript">
        UnallocatedBills = {!! json_encode($UnallocatedBills) !!}
    </script>
@endif
@if(isset($allocationarray))
    <script type="text/javascript">
            Allocation = {!! json_encode($allocationarray) !!}
    </script>
@endif
@if(isset($bank_name))
    <script type="text/javascript">
        bankName = {!! json_encode($bank_name) !!}
    </script>
@endif
@if(isset($products))
    <script type="text/javascript">
        products = {!! json_encode($products) !!}
    </script>
@endif
@if(isset($retailers))
    <script type="text/javascript">
        retailers = {!! json_encode($retailers) !!}
    </script>
@endif
@if(isset($invoice_no))
    <script type="text/javascript">
        tempInvoice = {!! json_encode($invoice_no) !!}
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






