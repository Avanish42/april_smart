(function () {
    "use strict";
    var secretEmptyKey = '[$empty$]'
    angular
        .module('app')
        .controller('addpurchase',addpurchase);
    addpurchase.$inject=['httpService','$scope','$compile','$timeout','$http','$window']

    function addpurchase(httpService,$scope,$compile,$timeout,$http,$window)
    {

        var vm=this;
        vm.piecesBox = ['','Pieces/Box','Case'];
        vm.states = products
        vm.retailers = retailers;
        vm.incvoice = tempInvoice;
        vm.suplierref = ''
        vm.activeForm = 0;
        vm.totalAmount = '';
        vm.bills = {
            0:{  'sno':1,
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
            },

        }
        vm.submitBill = submitBill;
        vm.retailerchange = retailerchange

        function submitBill(){
            if(typeof vm.billretailer != 'object'){
                alertNotify('Retailer is required');
                return false;
            }
            if ($window.confirm("Are you sure the bill is fully completed")) {
                var last = Object.keys(vm.bills)[Object.keys(vm.bills).length-1];
                for (var x in vm.bills) {
                    if(x == last && x != 0){
                        break;
                    }
                    else{
                        if(!validateRow(vm.bills[x],x)){
                            alertNotify('Invalid Bill seems like you have in-complete row in bill')
                            return false;
                        }
                    }
                }
                deleteLastRow();
                vm.bills.retailer = vm.billretailer;
                vm.bills.invoice = vm.incvoice;
                vm.bills.totalAmount = vm.totalAmount;

                $scope.tempbillpost = httpService.sendPostjson(vm.bills,APP_URL+'/add-purchase');
                $scope.tempbillpost.then(function (response) {
                    if(response.data.code == 100){
                        alertNotify(response.data.message);
                        location.reload();
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
            var lastIndex = Object.keys(vm.bills)[Object.keys(vm.bills).length-1];
            if(lastIndex == 0){
                return false;
            }
            else{
                delete vm.bills[lastIndex];
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
                    appendNewRow()
                }
            }
        }

        $scope.formChangeEPro = function (bill,key) {

            if(typeof bill.products === 'object'){
                bill.pcsboxincase = bill.products.item_quantity
                bill.mrp = bill.products.item_price
            }
            else{
                bill.pcsboxincase = '';bill.mrp = '';bill.quantity = '';bill.units = '';bill.rate = '';bill.per='';bill.rate_per_piece='';bill.amount='';bill.is_complete=false;
                return false;
            }

            if(validateRow(bill,key)){
                calculateProductAmount(bill,key)
                calculateTotal()
                if(checkForAppendRow()){
                    appendNewRow()
                }
            }
        }

        function calculateTotal() {
            var total = 0;
            angular.forEach(vm.bills,function (value,key) {
                total = total + value.amount;
            });
            vm.totalAmount = total;
        }
        function appendNewRow() {
            var newobj = ++Object.keys(vm.bills)[Object.keys(vm.bills).length-1];
            var incrementval = vm.bills[Object.keys(vm.bills)[Object.keys(vm.bills).length-1]].sno;
            vm.bills[newobj] = {
                'sno':++incrementval,
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

        function checkForAppendRow() {
            var appendRow = true;
            angular.forEach(vm.bills,function (value,key) {
                if(!value.is_complete){
                    appendRow = false
                }
            });
            return appendRow;
        }

        function calculateProductAmount(bill,key) {
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
            if(bill.products == undefined || bill.mrp == '' || bill.pcsboxincase == '' || bill.per == '' || bill.quantity == '' || bill.rate == '' || bill.mrp < 0 || bill.pcsboxincase < 0 || bill.per < 0 || bill.quantity < 0 || bill.rate < 0){
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


