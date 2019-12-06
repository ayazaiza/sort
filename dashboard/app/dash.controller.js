;(function(undefined) {
    var app = angular.module('dashApp');

    app.filter('startFrom', function() {
        return function(input, start) {
            if(input) {
                start = +start; //parse to int
                return input.slice(start);
            }
            return [];
        }

    });
    
    angular.module('dashApp').controller('loginCtrl', function(dashFac,$scope,$rootScope, $localStorage,
        $sessionStorage,$stateParams,$window,$state){

        $scope.login = {};

        $scope.loginsubmit = () => {
            if($scope.loginForm.$valid){
               // console.log($scope.login);
                dashFac.getPost('req/login.php',$scope.login).then( (res) => {
                    if(res.data != 1 ){         
                            dashFac.setloginValid(res.data);
                        $localStorage.userCred = res.data;
                        $state.go('dashboard');
                    }else{
                        alert();
                    }
                   
                });
            }
        }


    });
    
    angular.module('dashApp').controller('allUsersCtrl', function(dashFac,$scope,$rootScope,$stateParams,$window,$state){

        $scope.allusers = [];

        
      //  console.log('$rootScope.user');

        const loadAllUsers = () => {
            dashFac.getReq('req/alluserslist.php').then((res) => {
                //console.log(res.data);
                $scope.allusers = res.data;
                //console.log($scope.allusers);
              // console.log(permission);
               //console.log($state.current.data.permission);
            });
        }

        $scope.$evalAsync(loadAllUsers());
        //loadAllUsers();

        const id = $stateParams.uid;

        $scope.active  = (t) => {
            dashFac.getPost('req/updateuserstatus.php',t)
            .then((res) => {
                loadAllUsers();
           
                
            })
        }

        $scope.updaterole = () => {
          dashFac.getPost('req/updaterole.php',{uid:id,role:$scope.role})
            .then((res) => {
                //console.log(res.data);
                $window.location.reload();
                $state.go("allUsers");
            })
        }

        
    });
    
    angular.module('dashApp').controller('dashCtrl1', function(dashFac,$localStorage,$scope,$stateParams,$window){
        $scope.permission = dashFac.loginValid.role;
        console.log($scope.permission);
    });
    
    angular.module('dashApp').controller('dashCtrl', function(dashFac,$localStorage,$scope,$stateParams,$window){
$scope.permission = '';
        var load =  () => {

       dashFac.getReq('req/getallitems.php').then(function(res){
        $scope.list = res.data.data;
        $scope.currentPage = 1; //current page
        $scope.entryLimit = 50; //max no of items to display in a page
        $scope.filteredItems = $scope.list.length; //Initially for no filter  
        $scope.totalItems = $scope.list.length;
        //console.log(dashFac.loginValid);
        console.log($localStorage.userCred);
       
    });


 
    $scope.setPage = function(pageNo) {
        $scope.currentPage = pageNo;
    };
    $scope.filter = function() {
        $timeout(function() { 
            $scope.filteredItems = $scope.filtered.length;
        }, 10);
    };
    $scope.sort_by = function(predicate) {
        $scope.predicate = predicate;
        $scope.reverse = !$scope.reverse;
    };
}

    load();

    $scope.active = function(test){
            
        dashFac.getPost('req/active2.php',test).then(function(res){
            console.log(res);
            load();
        });
    }

    $scope.delete = function(d){ 
        console.log(d);
        if ($window.confirm("Please confirm? Are You sure to Delete This category")) {
            //$scope.Message = "You clicked YES.";
            dashFac.getPost('req/delete2.php', d).then(function(resp){
                // $window.location.reload();
                load();
             });
        } else {

             
        }
        

    }



    });

    angular.module('dashApp').controller('addnewproviderCtrl',function(dashFac,$scope,$stateParams){

        
        var parent = {req:'yes',par:'parent'};
        var sub = {req:'yes',par:'sub_type'};

        $scope.validate = true;

        var load = function(){
            dashFac.getPost('req/getallcategories.php',sub).then(function(resp){
                $scope.subCates =  resp.data;
                console.log(resp.data);
            });


        dashFac.getPost('req/getallcategories.php',parent).then(function(resp){
                $scope.mainCates =   resp.data;
                console.log(resp.data);
            });

        }

      load();

      $scope.item = {};
      $scope.msg = '';

      $scope.send  = () => {
        $scope.validate = false;
          if($scope.myForm.$valid){
            console.log($scope.item);
            var form_data = new FormData();
            angular.forEach($scope.files, function(file) {
                form_data.append('file', file);
              });       
              var obj = JSON.stringify($scope.item);
              form_data.append('item', obj);

              dashFac.getPost('req/insertitem.php',form_data).then((res) => {
                    console.log(res);
                    $scope.item = {};
                    $scope.myForm.$valid = true;
                    $scope.msg = res.data;
                   $window.location.reload();
              });


          }else{
              alert();
          }
      }

    });

    
    angular.module('dashApp').controller('addnewuserCtrl',function(dashFac,permission,$scope,$stateParams,$window,$state){

        $scope.reg = {};
        
        $scope.error ='';

        console.log(permission);
        $scope.submit = () => {

            if($scope.registerForm.$valid){
                if($scope.reg.pwd === $scope.reg.cpwd ){

                    console.log($scope.reg);

                    dashFac.getPost('req/register.php', $scope.reg)
                            .then((res) => {

                                //console.log(res.data);

                                $scope.error = res.data;

                                if($scope.reg.email === res.data){
                                    $scope.reg.email = ''; 
                                }
                                if($scope.reg.uname === res.data){
                                    $scope.reg.uname = ''; 
                                }

                            })

                }else{
                    $scope.reg.pwd = $scope.reg.cpwd = '';
                }
               
            }else{
                alert('Please fill all fields');
            }
            
           
        }


    });

     
    angular.module('dashApp').controller('itemUpdateCtrl',function(dashFac,$scope,$stateParams ,$state){

        var unid = $stateParams.uid;
        $scope.item = {};

        var parent = {req:'yes',par:'parent'};
        var sub = {req:'yes',par:'sub_type'};

        //$scope.validate = true;
        angular.element("#name").focus();
        var load = function(){
            dashFac.getPost('req/getallcategories.php',sub).then(function(resp){
                $scope.subCates =  resp.data;
                console.log(resp.data);
            });


        dashFac.getPost('req/getallcategories.php',parent).then(function(resp){
                $scope.mainCates =   resp.data;
                console.log(resp.data);
            });

        }

      load();

            let call = (a) => {
            dashFac.findById('req/getsingleitem.php',{id:a})
                .then(res => {
                    $scope.item =  res.data;
                    console.log($scope.item);
                });
        }

        call(unid);


        $scope.send  = () => {
           
              if($scope.myForm.$valid){
                console.log($scope.item);
                var form_data = new FormData();
                angular.forEach($scope.files, function(file) {
                    form_data.append('file', file);
                  });       
                  var obj = JSON.stringify($scope.item);
                  form_data.append('item', obj);
    
                  dashFac.getPost('req/updateitem.php',form_data).then((res) => {
                        console.log(res);
                        $scope.item = {};
                        $scope.myForm.$valid = true;
                        $scope.msg = res.data;
                        $state.go("dashboard");
                      // $window.location.reload();
                  });
    
    
              }else{
                  alert();
              }
          }

    



    });

    angular.module('dashApp').controller('addnewMainCategoryCtrl',function(dashFac,$scope,$stateParams,$window){

        var parent = {req:'yes',par:'parent'};
        var sub = {req:'yes',par:'sub_type'};
        var load = function(){

            // dashFac.getPost('req/getallcategories.php',sub).then(function(resp){
            //     $scope.tabs =   resp.data;
            //     console.log($scope.tabs);
            // });


            dashFac.getPost('req/getallcategories.php',parent).then(function(resp){
                    $scope.cates =   resp.data;
                    console.log($scope.cates);
                });

        }

        load();

        $scope.up = function(d){              
            $scope.menu = d.name;
            $scope.position =d.position;
            $scope.updateId = d.id;
            angular.element("#menu").focus();
        }


        $scope.active = function(test){
            
            dashFac.getPost('req/active.php',test).then(function(res){
                console.log(res);
                load();
            });
        }

        $scope.delete = function(d){ 
            console.log(d);
            if ($window.confirm("Please confirm? Are You sure to Delete This category")) {
                //$scope.Message = "You clicked YES.";
                dashFac.getPost('req/delete.php', d).then(function(resp){
                    // $window.location.reload();
                    load();
                 });
            } else {

                 
            }
            

        }
    

        $scope.msg = '';
        $scope.add =  function(){
            console.log($scope.updateId);
            if($scope.myForm.$valid){

                var form_data = new FormData();
                angular.forEach($scope.files, function(file) {
                    form_data.append('file', file);
                  });

                var post = {
                    menu:$scope.menu,
                    parent:'yes',
                    position:$scope.position,
                    updateId:$scope.updateId
                }
               
                var obj = JSON.stringify(post);
                form_data.append('catereq', obj);
               
                 // console.log(obj);
                  dashFac.getPost('req/maincategory.php',form_data).then(function(resp){
                      console.log(resp.data);
                      $scope.menu = '';
                      $scope.position ='';
                      $scope.msg = resp.data;
                      //load();
                     $window.location.reload();
                  })
          
            }
            

            
            
        }

       


    });
    angular.module('dashApp').controller('addnewSubCategoryCtrl',function(dashFac,$scope,$stateParams,$window){

        $scope.msg = '';
        
        $scope.name = '';
        var parent = {req:'yes',par:'parent'};
        var sub = {req:'yes',par:'sub_type'};

        var load = function(){
            dashFac.getPost('req/getallcategories.php',sub).then(function(resp){
                $scope.tabs =   resp.data;
                console.log($scope.tabs);
            });


        dashFac.getPost('req/getallcategories.php',parent).then(function(resp){
                $scope.cates =   resp.data;
                console.log($scope.cates);
            });

        }
      load();
      $scope.cate_id = [];

      $scope.change = function(categ){
          //console.log(categ);
          var fill = $scope.cates;
          //console.log(fill);
        $scope.cate_id =  fill.filter((id) => {
            if(id.name === categ){
                return id;
            }
        });
        console.log($scope.cate_id[0].id);

      }

      

        $scope.up = function(d){              
                $scope.menu = d.name;
                $scope.name =d.parent;
                $scope.updateId = d.id;
                console.log(d.parent_id);
                $scope.cate_id.push({id:d.parent_id});
                angular.element("#menu").focus();
                console.log($scope.cate_id[0].id);
              
            }


            $scope.active = function(test){
            
                dashFac.getPost('req/active.php',test).then(function(res){
                    console.log(res);
                    load();
                });
            }

       
            $scope.delete = function(d){ 
                console.log(d);
                if ($window.confirm("Please confirm? Are You sure to Delete This category")) {
                    //$scope.Message = "You clicked YES.";
                    dashFac.getPost('req/delete.php', d).then(function(resp){
                        // $window.location.reload();
                        load();
                     });
                } else {
    
                     
                }
                
    
            }


    //Update Data

            


   //Insert new data
       $scope.addsub = function(){
           //console.log($scope.name);
           if($scope.name === undefined){
            alert('Please Select parent Category');
           }else{
            if($scope.myForm.$valid){

                var form_data = new FormData();
                angular.forEach($scope.files, function(file) {
                    form_data.append('file', file);
                  });

                  //if()
                  console.log($scope.cate_id[0].id);
                var post = {
                    menu:$scope.menu,
                    parent:$scope.name,
                    position:'null',
                    sub_type:'yes',
                    updateId:$scope.updateId,
                    parent_id:$scope.cate_id[0].id
                }
               
                var obj = JSON.stringify(post);
                form_data.append('catereq', obj);
               
                 // console.log(obj);
                  dashFac.getPost('req/maincategory.php',form_data).then(function(resp){
                      console.log(resp.data);
                      $scope.menu = '';
                      $scope.msg = resp.data;
                      $window.location.reload();
                      
                      
                  })
          
            }
           }
       }



    });
}.call(this));