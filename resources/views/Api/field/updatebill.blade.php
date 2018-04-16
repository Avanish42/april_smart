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
    URL::   {{url('/').'/api/update-bill-by-id'}}

</h1>
<form method="POST" enctype="multipart/form-data" action="{{url('/api/update-bill-by-id')}}" >

    Id(id) ::<span style="color: red">* </span><input type="text" name="id">

    <br />
    <br />
    AllocationNo(allocationNo) ::<span style="color: red">* </span><input type="text" name="allocationNo">

    <br />
    <br />
    Bill No(billNo) ::<span style="color: red">* </span><input type="text" name="billNo">

    <br />
    <br />
    Is Allocated(isAllocated) ::<span style="color: red">* </span><input type="text" name="isAllocated">

    <br />
    <br />
    Is Past(isPast) ::<span style="color: red">* </span><input type="text" name="isPast">

    <br />
    <br />

    Retailer Name(retailerName) ::<span style="color: red">* </span><input type="text" name="retailerName">

    <br />
    <br />

    Bill Amount(billAmount) ::<span style="color: red">* </span><input type="text" name="billAmount">

    <br />
    <br />
    Sale Return(saleReturn) ::<span style="color: red">* </span><input type="text" name="saleReturn">

    <br />
    <br />
    Past Collection(pastCollection) ::<span style="color: red">* </span><input type="text" name="pastCollection">

    <br />
    <br />
    Status Id(status_id) ::<span style="color: red">* </span><input type="text" name="status_id">

    <br />
    <br />

    Today Collection(todayCollection) ::<span style="color: red">* </span><input type="text" name="todayCollection">

    <br />
    <br />
    Delivary Status(delivaryStatus) ::<span style="color: red">* </span><input type="text" name="delivaryStatus">

    <br />
    <br />
    Sales Man(salesMan) ::<span style="color: red">* </span><input type="text" name="salesMan">

    <br />
    <br />
    Retailer Hierarchy(retailerHierarchy) ::<span style="color: red">* </span><input type="text" name="retailerHierarchy">

    <br />
    <br />
    Retailer Code(retailerCode) ::<span style="color: red">* </span><input type="text" name="retailerCode">

    <br />
    <br />
    Gross Amount(grossAmount) ::<span style="color: red">* </span><input type="text" name="grossAmount">

    <br />
    <br />
    Scheme Discount(schemeDiscount) ::<span style="color: red">* </span><input type="text" name="schemeDiscount">

    <br />
    <br />
    Replacement(replacement) ::<span style="color: red">* </span><input type="text" name="replacement">

    <br />
    <br />
    DistributerDiscount(distributerDiscount) ::<span style="color: red">* </span><input type="text" name="replacement">

    <br />
    <br />
    DistributerDiscount(cashDiscount) ::<span style="color: red">* </span><input type="text" name="cashDiscount">

    <br />
    <br />
    Window Display(windowDisplay) ::<span style="color: red">* </span><input type="text" name="windowDisplay">

    <br />
    <br />
    Tax Amount(taxAmount) ::<span style="color: red">* </span><input type="text" name="taxAmount">

    <br />
    <br />
    Debit Adjust(debitAdjust) ::<span style="color: red">* </span><input type="text" name="debitAdjust">

    <br />
    <br />
    Tax Adjust(taxAdjust) ::<span style="color: red">* </span><input type="text" name="taxAdjust">

    <br />
    <br />
    Net Amount(netAmount) ::<span style="color: red">* </span><input type="text" name="netAmount">

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