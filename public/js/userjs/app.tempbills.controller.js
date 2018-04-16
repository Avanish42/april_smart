(function () {
    "use strict";
    angular
        .module('app')
        .controller('tempBill',tempBill);

    tempBill.$inject=['httpService']


    function tempBill(httpService)
    {
        var vm=this;

        vm.name=httpService.name;
        // console.log(httpService.name);
        // vm.getdata1=httpService.getData(bill,'https://jsonplaceholder.typicode.com/posts/1');
        // console.log($http({
        //     method:'GET',
        //     url:'https://jsonplsaceholder.typicode.com/posts/1'
        // }))



    }


})();


