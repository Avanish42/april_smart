(function(){
    "use strict"

    angular
        .module('app')
        .service('httpService',httpService)

   httpService.$inject=['$http'];

    function httpService($http)
    {
        var o = {
            sendPostjson:sendPostjson,
        };


        function sendPostjson(data1,url) {
            return $http({
                method: 'POST',
                url: url,
                data: data1,
                dataType: 'json',
                headers : {'Content-Type': 'application/json;charset=utf-8;'}
            })
        }

        return o;
    }
})();