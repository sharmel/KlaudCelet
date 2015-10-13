(function() {
    //module
    var app = angular.module('provider_list', ['ngRoute','ngAnimate', 'ui.bootstrap']);
    
    
    //Using AngularJs service instead of using PHP RestFul API service
    
    app.factory('providerService', function($http){ 
     var baseUrl = 'services/';  
        
        return {
         getProviders: function(){
             return $http.get(baseUrl + 'getProviders.php');
             
         },
         getProvider: function(cloud_id) {
              return $http.get(baseUrl + 'getProvider.php?cloud_id=');
          },
        getService: function(cloud_id) {
              return $http.get(baseUrl + 'getServices.php?cloud_id=');
          }
            
        };
        
    })
    
    //controller (binds the model and the view)
    
    app.controller('ProviderController', function(providerService,$scope) {

        var that = this;
        
        //this: current function i.e here where it is being called

        providerService.getProviders().success(function(data) {            
            //$scope.data=data;
            that.providers = data;
            //console.log(that.provider);     
        });

    });
    
    
    app.config(function($routeProvider) {
        
        $routeProvider
            .when('/', {
            templateUrl: 'partials/main-view.html',
            controller:'ProviderController'      
           
})
        .when('/services/:cloud_id', {
            templateUrl: 'partials/services-list.html',
            controller: 'ViewController'
        })
        
        .when('/buy-rent', {
            templateUrl:'partials/buy-rent.html',
            controller: 'BuyRentController'
            
        })
        .when('/migrate', {
            templateUrl:'partials/migrate.html',
            controller: 'MigrateController'
            
        })
        .when('/about', {
            templateUrl:'partials/about.html',
            controller: 'AboutController'
            
        })
        
        
    });

    
    app.controller('ViewController', function($rootScope, $scope, $http, $routeParams, providerService) {
  
    
        
        $scope.find =function(){
            $scope.id = 1;
                //$routeParams.cloud_id;
           //console.log($scope.id);
           
            providerService.getProviders().then(function(data) {
                //console.log(data.data[0].cloud_id);
                
                for(i = 0; i < data.data.length; i++){
                    
                if($scope.id == data.data[i].cloud_id){
                   
                       $scope.data =data.data[i];
                   
                    //$scope.services=$scope.data['services'];
                    
                      //console.log($scope.data['services']);
                 
                    
                    //$scope.providers= data;
                    //$scope.services=data;
                }    
                }
              
             
                    
        });
        
        }
        
//        $scope.findOne =function(){
//            $scope.id = $routeParams.cloud_id;
//           //console.log($scope.id);
//           
//            providerService.getProviders().then(function(data) {
//                //console.log(data.data[0].cloud_id);
//                
//                for(i = 0; i < data.data.length; i++){
//                    
//                if($scope.id == data.data[i].cloud_id){
//                   
//                       $scope.data = data.data[i]; 
//                     // console.log($scope.data);
//                }    
//                } 
//        });
//        
//        }   
         
    });
    app.controller('BuyRentController', ['$scope', function($scope) {
      $scope.master = {};

      $scope.submit = function(user) {
          
    
        $scope.master = angular.copy(user);
          
          console.log(user.alignment + user.maturity);    
          
      };

      $scope.reset = function() {
        $scope.user = angular.copy($scope.master);
      };

      $scope.reset();
        
        
    }]);
    
    
    
    
        app.controller('MigrateController', function($rootScope, $uibModal, $scope, $http, $routeParams, providerService) {
            
                 $scope.master = {};

      $scope.submit = function(industry) {
          
          //add variables to scope/industry
          
//          $scope.industry = [
//          
//              {nos: 8},
//              {noc: 4},
//              {ar: 4}
//              
//          ];
          
          industry.nos=8;
          industry.noc=4;
          industry.ar=4;
          industry.tos=5;
          industry.scb=7;
          industry.dop=6;
          industry.pba=9;
          industry.top=5;
          industry.pu=6;
          industry.au=8;
          industry.adh=5;
          industry.wv=8;
          industry.cl=7;
          industry.ds=6;
          industry.cc=4;
          
          
          industry.l= (industry.servers*industry.nos)+(industry.countries*industry.noc)+(industry.revenue*industry.ar);
          industry.averageUse=(industry.service*industry.tos)+(4-industry.customer)*industry.scb;
          
          industry.peakUsage=(industry.peak*industry.dop)+(industry.averagePeak*industry.pba);
          
          industry.workVariability= (industry.peakUsage*industry.pu)+(industry.averageUse*industry.au)+(industry.data_handling*industry.adh);
          
          industry.SI=(industry.l*industry.cl)+(industry.workVariability*industry.wv)+(industry.sensitivity*industry.ds*industry.data_handling)+(industry.criticality*industry.cc)*(65-industry.l);
          console.log(industry.l);
          console.log(industry.averageUse);
          console.log(industry.peakUsage);
          console.log(industry.workVariability);
          console.log(industry.SI);
    
        $scope.master = angular.copy(industry);
          
          console.log(industry.nos + industry.servers); 
          
//          $uibModal.open({
//              templateUrl: 'modalContent.html',
//             controller: 'ModalController'
//          
//          });
          
      };

      $scope.clear = function() {
        $scope.industry = angular.copy($scope.master);
      };

      $scope.clear();
        
            
    });
    app.controller('ModalController', function($scope,$modalInstance
                  ){
    
        $scope.cancel = function () {
        $modalInstance.dismiss();
            
  };    
    });
    app.controller('AboutController', function($rootScope, $scope, $http, $routeParams) {
            
   $http.get('http://ipinfo.io/json').success(function(data) {
       $scope.location = data;
       //$scope.country = 'fr';
       //if (data.country != 'FR') $scope.country = "en";
   });
        
    $scope.tabs = [
    { title:'Thesis', content:'This is a directory of cloud services providers and their services. You can use this application to determine whether to migrate or not and either to buy a private cloud or rent a public cloud.' }
//    { title:'Dynamic Title 2', content:'' }
  ];  
         
    });
    
    //custom directive
    
   app.directive('migrateForm', function() {
  return {
//      
        restrict: 'A',
////      template: 'Name: {{customer.name}} Address: {{customer.address}}',
        templateUrl: 'js/Directives/migration-form.html'
//      
//      
};
        });

})();