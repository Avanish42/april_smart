(function(){
    "use strict"

    angular
        .module('app')
        .service('httpService',httpService)

   httpService.$inject=['$http'];

    function httpService($http)
    {
        var o = {
            name:"avanish",
            city:"Delhi"
        };
        return o;
    }
})();