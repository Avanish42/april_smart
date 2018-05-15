(function () {
    "use strict";
    var secretEmptyKey = '[$empty$]'
    angular
        .module('app')
        .controller('salesReturn',salesReturn);
    salesReturn.$inject=['httpService','$scope','$compile','$timeout','$http','$window']

    function salesReturn(httpService,$scope,$compile,$timeout,$http,$window)
    {
        console.log(salesreturntempbill);
        var vm=this;
        vm.piecesBox = ['','Pieces/Box','Case'];
        vm.states = [];
        vm.retailers = retailers;
        vm.incvoice = salesreturntempbill.invoice_no;
        vm.billretailer = salesreturntempbill.retailer;
        vm.suplierref = salesreturntempbill.supplier_ref.name
        vm.activeForm = 0;
        vm.returntotalamount = 0;
        vm.totalAmount = salesreturntempbill.bill_amount;
        vm.salesReturntotalAmount = 0;
        vm.submitBill = submitBill;
        vm.retailerchange = retailerchange
        vm.productSelect = productSelect
        vm.bills = {}
        vm.salesreturn = {
            0:{
                'sno':1,
                'products':undefined,
                'pcsboxincase':'',
                'mrp':'',
                'quantity':null,
                'units':'',
                'rate':'',
                'per':'',
                'rate_per_piece':'',
                'amount':'',
                'is_complete':false
            }
        }

        for (var value = 0;value<salesreturntempbill.bill_products.length;value++){
            vm.bills[value] ={  'sno':1,
                    'products':undefined,
                    'pcsboxincase':'',
                    'mrp':'',
                    'quantity':'',
                    'units':'',
                    'rate':'',
                    'per':'',
                    'rate_per_piece':'',
                    'amount':'',
                    'is_complete':false
                }


        }


        for (var value = 0;value<salesreturntempbill.bill_products.length;value++){

            var productTemp = undefined;
                    for(var i = 0;i< products.length;i++){
                        if(salesreturntempbill.bill_products[value].item_name == products[i].item_name){
                            productTemp = products[i];
                        }
                    }
            vm.bills[value].products = productTemp;
            vm.bills[value].sno = value + 1;
            vm.bills[value].pcsboxincase = parseInt(salesreturntempbill.bill_products[value].pcsboxincase)
            vm.bills[value].mrp = parseInt(salesreturntempbill.bill_products[value].item_mrp)
            vm.bills[value].quantity = parseInt(salesreturntempbill.bill_products[value].item_quantity)
            vm.bills[value].units = salesreturntempbill.bill_products[value].item_units
            vm.bills[value].rate = parseInt(salesreturntempbill.bill_products[value].item_rate)
            vm.bills[value].per = salesreturntempbill.bill_products[value].item_per
            vm.bills[value].rate_per_piece = parseInt(salesreturntempbill.bill_products[value].item_rate_per_piece);
            vm.bills[value].amount = parseInt(salesreturntempbill.bill_products[value].item_amount)
            vm.bills[value].is_complete = true
            vm.bills[value].disabledinputtext = true;

        }

        for (var x = 0;x<products.length;x++){
            for(var j = 0; j<salesreturntempbill.bill_products.length;j++){
                if(salesreturntempbill.bill_products[j].item_name == products[x].item_name){
                    vm.states.push(products[x]);
                }
            }
        }

        function submitBill(){
            if(typeof vm.billretailer != 'object'){
                alertNotify('Retailer is required');
                return false;
            }
            if ($window.confirm("Are you sure the sale return is fully completed")) {
                var billarray = $.map(vm.bills, function(value, index) {
                    return [value];
                });
                var salesarray = $.map(vm.salesreturn, function(value, index) {
                    return [value];
                });
                var last = Object.keys(vm.salesreturn)[Object.keys(vm.salesreturn).length-1];
                for (var x in vm.salesreturn) {
                    console.log(vm.salesreturn[x]);
                    if(x == last && x != 0){
                        break;
                    }
                    else{
                        if(!validateRow(vm.salesreturn[x],x)){
                            alertNotify('Invalid Bill seems like you have in-complete row in sales return bill')
                            return false;
                        }
                    }
                }
                // console.log('bills',billarray.length);
                // console.log('sales',salesarray.length);
                // return false
                if(vm.salesreturn[last].is_complete == false && (vm.salesreturn[last].products != undefined || vm.salesreturn[last].quantity != null)){
                    alertNotify('Invalid Bill seems like you have in-complete row in sales return bill')
                    return false;
                }

                deleteLastRow();

                // vm.salesreturn.retailer = vm.billretailer;
                vm.salesreturn.temp_bill_id = salesreturntempbill.id;
                vm.salesreturn.invoice_no = salesreturntempbill.invoice_no;
                vm.salesreturn.salesReturntotalAmount = vm.salesReturntotalAmount;

                $scope.tempbillpost = httpService.sendPostjson(vm.salesreturn,APP_URL+'/temporary-bill-sale-return');
                $scope.tempbillpost.then(function (response) {
                    if(response.data.code == 100){
                        alertNotify(response.data.message);
                        window.location.href = APP_URL+'/tempbill';
                    }
                })

            }


        }

        function retailerchange() {
            if(typeof vm.billretailer !== 'object'){
                vm.suplierref = ''
            }
            else{
                vm.suplierref = vm.billretailer.sales_man.name;
            }
        }

        function alertNotify(message) {
            $.notify({
                    message: message
                },
                {
                    allow_dismiss: true,
                    newest_on_top: true,
                    timer: 1000,
                    type: "danger",
                    placement:{
                        from: 'top',
                        align: 'right'
                    },
                    animate: {
                        enter: 'animated rotateOutInRight',
                        exit: 'animated rotateOutUpRight '
                    }
                });
        }
        function deleteLastRow() {
            var lastIndex = Object.keys(vm.salesreturn)[Object.keys(vm.salesreturn).length-1];
            if(lastIndex == 0){
                return false;
            }
            else{
                if(vm.salesreturn[lastIndex].is_complete == true){
                    return false;
                }
                else{
                    delete vm.salesreturn[lastIndex];
                }

            }
        }
        function validateLastRow(bill){

            if(bill.products != undefined || bill.mrp != '' || bill.pcsboxincase != '' || bill.per != '' || bill.quantity != '' || bill.rate != '' || bill.mrp != '' || bill.pcsboxincase != '' || bill.per != '' || bill.quantity != '' || bill.rate != ''){
                bill.is_complete = false;
                return false;
            }
            else{
                return true;
            }
        }

        $scope.formChangeE = function (bill,key) {
           if(validateRow(bill,key)){
                calculateProductAmount(bill,key)
                calculateTotal()
                if(checkForAppendRow()){
                    var billarray = $.map(vm.bills, function(value, index) {
                        return [value];
                    });
                    var salesarray = $.map(vm.salesreturn, function(value, index) {
                        return [value];
                    });
                 if(salesarray.length < billarray.length){
                        appendNewRow()
                    }
                }
            }
        }
        Object.size = function(obj) {
            var size = 0, key;
            for (key in obj) {
                if (obj.hasOwnProperty(key)) size++;
            }
            return size;
        };

        function checkForAlreadyExistBill(bill,key){
            var allowobject = 0;
            var size = Object.size(vm.salesreturn);
            for(var y = 0; y<size;y++){
                if(bill.products.item_name ==  vm.salesreturn[y].products.item_name){
                       allowobject++;
                }
            }
            return (allowobject > 1 ? true :false);
        }

        function productSelect(item, model, label) {
            if(checkForAlreadyExistBill(item)){
                alertNotify('Product you choose is already been deducted from bill, Please add different product from listed product.')
                bill.products = undefined;
                return false;
            }
            else{
                return true;
            }

        }

        $scope.formChangeEPro = function (bill,key) {

            if(typeof bill.products === 'object') {
                if(checkForAlreadyExistBill(bill,key)){
                    alertNotify('Product you choose is already been deducted from bill, Please add different product from listed product.')
                    bill.products = undefined;
                    return false;
                }
                else{
                    for (var y = 0; y < salesreturntempbill.bill_products.length; y++) {
                    if (bill.products.item_name == salesreturntempbill.bill_products[y].item_name) {
                        bill.units = salesreturntempbill.bill_products[y].item_units
                        bill.rate = parseInt(salesreturntempbill.bill_products[y].item_rate)
                        bill.per = salesreturntempbill.bill_products[y].item_per
                        bill.rate_per_piece = parseInt(salesreturntempbill.bill_products[y].item_rate_per_piece)
                        bill.amount = parseInt(salesreturntempbill.bill_products[y].item_amount)
                    }
                }
                bill.pcsboxincase = bill.products.item_quantity
                bill.mrp = bill.products.item_price
            }
            }
            else{
                bill.pcsboxincase = '';bill.mrp = '';bill.quantity = null;bill.units = '';bill.rate = '';bill.per='';bill.rate_per_piece='';bill.amount='';bill.is_complete=false;
                return false;
            }

            if(validateRow(bill,key)){
                calculateProductAmount(bill,key)
                calculateTotal()
                if(checkForAppendRow()){
                    var billarray = $.map(vm.bills, function(value, index) {
                        return [value];
                    });
                    var salesarray = $.map(vm.salesreturn, function(value, index) {
                        return [value];
                    });

                    if(salesarray.length < billarray.length){
                        appendNewRow()
                    }

                }
            }
        }

        function calculateTotal() {
            var total = 0;
            angular.forEach(vm.salesreturn,function (value,key) {
                total = total + value.amount;
            });
            vm.salesReturntotalAmount = total;
            vm.returntotalamount = vm.totalAmount - vm.salesReturntotalAmount
        }
        function appendNewRow() {
            var newobj = ++Object.keys(vm.salesreturn)[Object.keys(vm.salesreturn).length-1];
            var incrementval = vm.salesreturn[Object.keys(vm.salesreturn)[Object.keys(vm.salesreturn).length-1]].sno;
            vm.salesreturn[newobj] = {
                'sno':++incrementval,
                'products':undefined,
                'pcsboxincase':'',
                'mrp':'',
                'quantity':null,
                'units':'',
                'rate':'',
                'per':'',
                'rate_per_piece':'',
                'amount':'',
                'is_complete':false
            }
        }

        function checkForAppendRow() {
            var appendRow = true;
            angular.forEach(vm.salesreturn,function (value,key) {
                if(!value.is_complete){
                    appendRow = false
                }
            });
            return appendRow;
        }
        function checkForQuantity(bill,key) {
            var allowentity = true;
            for (var r = 0;r<salesreturntempbill.bill_products.length;r++){
                  if(bill.products.item_name == salesreturntempbill.bill_products[r].item_name){
                          if(bill.quantity > parseInt(salesreturntempbill.bill_products[r].item_quantity)){
                              allowentity = false;
                          }
                  }
            }

            return allowentity;
        }

        function calculateProductAmount(bill,key) {

             if(checkForQuantity(bill,key) == false){
                alertNotify('Can not allow the more quantity than current bill quantity')
                 bill.quantity = null;
                 return false;
            }
            // if(bill.quantity < )

            var noOfPiece;
            var perPicPrice;
            if(bill.units == 'Pieces/Box'){
                noOfPiece = bill.quantity
            }
            if(bill.units == 'Case'){
                noOfPiece = bill.pcsboxincase * bill.quantity;
            }
            if(bill.per == 'Pieces/Box'){
                perPicPrice = bill.rate
                bill.rate_per_piece =  perPicPrice ;
            }
            if(bill.per == 'Case'){
                perPicPrice = bill.rate / bill.pcsboxincase;
                bill.rate_per_piece = perPicPrice;
            }

            bill.amount = noOfPiece * perPicPrice;
            bill.is_complete = true;
            return true;
        }

        function validateRow(bill,key){
            if(bill.products == undefined || bill.mrp == '' || bill.pcsboxincase == '' || bill.per == '' || bill.quantity == '' || bill.rate == '' || bill.mrp < 0 || bill.pcsboxincase < 0 || bill.per < 0 ||  bill.quantity == null || bill.rate < 0){
                bill.is_complete = false;
                return false;
            }
            else{
                return true;
            }
        }



        $scope.opened = true;

        $scope.stateComparator = function (state, viewValue) {
            return viewValue === secretEmptyKey || (''+state).toLowerCase().indexOf((''+viewValue).toLowerCase()) > -1;
        };

        $scope.onFocus = function (e) {
            $timeout(function () {
                $(e.target).trigger('input');
                $(e.target).trigger('change'); // for IE
            });
        };

        $scope.open = function() {
            $scope.opened = true;
        }
        $scope.close = function() {
            $scope.opened = false;
        }

    }


})();


