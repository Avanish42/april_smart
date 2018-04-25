(function () {
    "use strict";
    var secretEmptyKey = '[$empty$]'

    angular
        .module('app')
        .directive('emptyTypeahead',emptyTypeahead);
    emptyTypeahead.$inject=['$parse'];

    function emptyTypeahead(){
        return {
            require: 'ngModel',
            link: function (scope, element, attrs, modelCtrl) {
                // this parser run before typeahead's parser
                modelCtrl.$parsers.unshift(function (inputValue) {
                    var value = (inputValue ? inputValue : secretEmptyKey); // replace empty string with secretEmptyKey to bypass typeahead-min-length check
                    modelCtrl.$viewValue = value; // this $viewValue must match the inputValue pass to typehead directive
                    return value;
                });

                // this parser run after typeahead's parser
                modelCtrl.$parsers.push(function (inputValue) {
                    return inputValue === secretEmptyKey ? '' : inputValue; // set the secretEmptyKey back to empty string
                });
            }
        }
    }
    angular
        .module('app')
        .directive('formOnChange',formOnChange);
    formOnChange.$inject=['$parse'];
    function formOnChange($parse) {
        return {
            require: "form",
            link: function(scope, element, attrs,form){
                var cb = $parse(attrs.formOnChange);
                element.on("change", function(){
                    cb(scope);
                });
            }
        }
    }

    angular
        .module('app')
        .controller('tempBill',tempBill);
    tempBill.$inject=['httpService','$scope','$compile','$timeout','$http']

    function tempBill(httpService,$scope,$compile,$timeout,$http)
    {

        var vm=this;
        vm.piecesBox = ['','Pieces','Box'];
        vm.states = products
        vm.activeForm = 0;
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

             $scope.formChangeE = function (bill,key) {
                    if(validateRow(bill,key)){
                        calculateProductAmount(bill,key)
                    }
             }

        function calculateProductAmount(bill,key) {
            var noOfPiece;
            var perPicPrice;
            if(bill.units == 'Pieces'){
                noOfPiece = bill.quantity
            }
            if(bill.units == 'Box'){
                noOfPiece = bill.pcsboxincase * bill.quantity;
            }
            if(bill.per == 'Pieces'){
                perPicPrice = bill.rate
                bill.rate_per_piece =  perPicPrice ;
            }
            if(bill.per == 'Box'){
                perPicPrice = bill.rate / bill.pcsboxincase;
                bill.rate_per_piece = perPicPrice;
            }

            bill.amount = noOfPiece * perPicPrice;

            return true;
         }


        $scope.formChangeEPro = function (bill,key) {
                    if(bill.products != undefined){
                        bill.pcsboxincase = bill.products.item_quantity
                        bill.mrp = bill.products.item_price
                    }
                     if(validateRow(bill,key)){
                        calculateProductAmount(bill,key)
                    }
             }

            function validateRow(bill,key){
                if(bill.products == undefined || bill.mrp == '' || bill.pcsboxincase == '' || bill.per == '' || bill.quantity == '' || bill.rate == '' || bill.mrp < 0 || bill.pcsboxincase < 0 || bill.per < 0 || bill.quantity < 0 || bill.rate < 0){
                     return false;
                }
                else{
                    return true;
                }
              }

             $scope.productFocus = function (bill) {
                console.log(bill);
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


