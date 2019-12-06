;(function(undefined) {
    angular.module('dashApp').config(function($stateProvider,$urlRouterProvider){

        $urlRouterProvider.otherwise('/dashboard');

        $stateProvider
            .state('login', {
                url:'/login',
                template:require('./templates/login.html'),
                controller:'loginCtrl',
                resolve:{
                    permissions:  (dashFac,$state,$localStorage) => {
                        if(!dashFac.oAuth){
                            if($localStorage.userCred){
                                dashFac.setloginValid($localStorage.userCred);
                                $state.go('dashboard');
                            }else{
                                $state.go('login');
                            }
                          
                        }
                }

            }

            })
            .state('dashboard',{
                url:'/dashboard',
                template:require('./templates/main.html'),
                redirectTo: 'dashboard.home',
                controller:'dashCtrl1',
              
            })
            .state('dashboard.home',{
                url:'/home.htm',
                template:require('./templates/home.html'),
                controller:'dashCtrl',
                resolve:{
                    permissions:  (dashFac,$state,$localStorage) => {
                        if(!dashFac.oAuth){
                            if($localStorage.userCred){
                                dashFac.setloginValid($localStorage.userCred);
                            }else{
                                $state.go('login');
                            }
                          
                        }
                }

            }

            })
            .state('dashboard.addnewprovider',{
                url:'/addnewprovider',
                template:require('./templates/addnewprovider.html'),
                controller:'addnewproviderCtrl',
                 resolve:{
                    permissions:  (dashFac,$state,$localStorage) => {
                        if(!dashFac.oAuth){
                            if($localStorage.userCred){
                                dashFac.setloginValid($localStorage.userCred);
                            }else{
                                $state.go('login');
                            }
                          
                        }
                }

            }
            })
            .state('dashboard.addnewuser', {
                url:'/users/addnewuser',
                template:require('./templates/addnewuser.html'),
                controller:'addnewuserCtrl',
                resolve: {
                    permission: ['dashFac', (dashFac)=>{
                        return dashFac.getReq('req/getallitems.php').then(res => res.data);
                    }],
                    permissions:  (dashFac,$state,$localStorage) => {
                        if(!dashFac.oAuth){
                            if($localStorage.userCred){
                                if($localStorage.userCred.role === 'admin'){
                                    
                                dashFac.setloginValid($localStorage.userCred);
                                }else{
                                    
                                $state.go('dashboard.logout');
                                }
                            }else{
                                $state.go('dashboard.logout');
                            }
                          
                        }
                }                  
                } 
            })
            .state('dashboard.addnewMainCategory',{
                url:'/category/addnewMainCategory',
                template:require('./templates/addnewmaincategory.html'),
                controller:'addnewMainCategoryCtrl',
                resolve:{
                    permissions:  (dashFac,$state,$localStorage) => {
                        if(!dashFac.oAuth){
                            if($localStorage.userCred){
                                dashFac.setloginValid($localStorage.userCred);
                            }else{
                                $state.go('login');
                            }
                          
                        }
                }

            }
            })
            .state('dashboard.addnewSubCategory',{
                url:'/category/addnewSubCategory',
                template:require('./templates/addnewsubcategory.html'),
                controller:'addnewSubCategoryCtrl',
                resolve:{
                    permissions:  (dashFac,$state,$localStorage) => {
                        if(!dashFac.oAuth){
                            if($localStorage.userCred){
                                dashFac.setloginValid($localStorage.userCred);
                            }else{
                                $state.go('login');
                            }
                          
                        }
                }

            }
            })
            .state('dashboard.itemsupdate',{
                url:'/itemsupdate/:uid',
                template:require('./templates/itemupdate.html'),
                controller:'itemUpdateCtrl',
                resolve:{
                    permissions:  (dashFac,$state,$localStorage) => {
                        if(!dashFac.oAuth){
                            if($localStorage.userCred){
                                dashFac.setloginValid($localStorage.userCred);
                            }else{
                                $state.go('login');
                            }
                          
                        }
                }

            }
            })

            .state('dashboard.allUsers',{
                url:'/users/allusers',
                template:require('./templates/allusers.html'),
                controller:'allUsersCtrl',
                resolve:{
                    permissions:  (dashFac,$state,$localStorage) => {
                        if(!dashFac.oAuth){
                            if($localStorage.userCred){
                                if($localStorage.userCred.role === 'admin'){
                                    
                                dashFac.setloginValid($localStorage.userCred);
                                }else{
                                    
                                $state.go('dashboard.logout');
                                }
                            }else{
                                $state.go('dashboard.logout');
                            }
                          
                        }
                }

            }
            })

            .state('dashboard.allUsers.updateRole',{
                url:'/users/updaterole/:uid',
                template:require('./templates/updaterole.html'),
                controller:'allUsersCtrl',
                resolve:{
                    permissions:  (dashFac,$state,$localStorage) => {
                        if(!dashFac.oAuth){
                            if($localStorage.userCred){
                                if($localStorage.userCred.role === 'admin'){
                                    
                                dashFac.setloginValid($localStorage.userCred);
                                }else{
                                    
                                $state.go('dashboard.logout');
                                }
                            }else{
                                $state.go('dashboard.logout');
                            }
                          
                        }
                }

            }
            })

            .state('dashboard.logout',{
                url:'/logout',
                controller: function($scope,$state,dashFac,$localStorage){
                    $scope.logout =  () => {
                        dashFac.logout();
                        $localStorage.$reset();
                        $state.go('login');
                    }

                    $scope.logout();
                }
                // resolve: {
                //     logout: (dashFac,$state,$q,$timeout) => {
                //         var deferred = $q.defer();
                //         $timeout(() => {
                //             dashFac.logout();
                //             if(!dashFac.oAuth){
                //                 return deferred.reject({redirectTo:'login'});
                //             }else{
                //                 return deferred.resolve();
                //             }
                //         })
                        
                //             return deferred.promise;
                //                // $state.go('dashboard');
                            
                        
                      
                //     }
                // }
            })

    });


}.call(this));