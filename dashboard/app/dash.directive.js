;(function(undefined){

    angular.module('dashApp').directive("fileInput", function($parse){  
        return{  
             link: function($scope,element,attrs){
                $scope.drag = "Drag and drop a file (png,jpg)(Optional) Height : 539px, Width:720px Default image size"; 
               element.on("change", function(event){  
                 var files = event.target.files; 
                 //console.log( event.target.files);      
                 $parse(attrs.fileInput).assign($scope, element[0].files);
                 $scope.drag =   files[0].name;  
                 $scope.$apply();  
              });  
   
             }  
        }  
   });

    angular.module('dashApp').directive('direc', function($parse){
            return {
                restrict: 'EA',
                link:function(scope,ele,attr){
                    
                }
            }
    });

}.call(this));