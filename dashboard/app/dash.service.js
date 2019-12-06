;(function(undedined){

    angular.module('dashApp').factory('dashFac',function($rootScope,$http){
        var allsort = {};
        const baseUrl = '/sort/dashboard/';
        
        allsort.loginValid = {};
        allsort.oAuth = false;

        allsort.setloginValid = (data) => {
            allsort.loginValid = data;
            allsort.oAuth = true;
        };

        allsort.logout = () => {
            allsort.loginValid = {};
            allsort.oAuth = false;
            return;
        }

        allsort.getReq = function(url){
            return $http.get(url)
                        .then(function(resp){
                            return resp;
                        });
        };

        allsort.getPost = function(url,data){
            return $http({
                method: 'post',
                url: baseUrl+url,
                data:data,
                headers: {'Content-Type': undefined},
            }).then(function(resp){
                return resp;
            })
        };

        allsort.findById = function(url,data){
            return $http(
                {
                    method:'post',
                    url:baseUrl+url,
                    data:data
                }
            ).then(resp => resp);
        }

        allsort.permissions = {};

        allsort.setPermission = function(data){
            allsort.permissions = data;
        }

        // var getPer =  function(){
        //     $http.post(baseUrl+'req/per.php',)
        // }

        


        return allsort;

    });

}.call(this));
