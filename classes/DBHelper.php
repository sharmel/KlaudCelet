<?php
require_once 'DBClass.php';
require_once 'provider.php';
require_once 'services.php';

class DBHelper {
    public static function resetDB() {
        DBClass::execute('DROP TABLE AWS_GCP');
        DBClass::execute('DROP TABLE Cloud_Services');
        DBClass::execute('CREATE TABLE AWS_GCP (
  Provider_Name varchar(250),
  Description varchar(650),
  Deployment_Model varchar(250),
  Service_Model varchar(250),
  Provider_Image varchar(50),
  Server_Location varchar(650),
  Subscription_Method varchar(125),
  Criteria varchar(650),
  Suitability int(7),
  Industry varchar(650),
  cloud_id int(7) PRIMARY KEY
)');
        
        DBClass::execute('CREATE TABLE Cloud_Services ( 
  service_name varchar(215),
  service_description varchar(650),
  provider_name varchar(250),
  cloud_id int(7)
  
)');
        
    }
    
      public static function getProviders() {
        $providers = array();

        $db_countries = DBClass::query('SELECT * FROM AWS_GCP');
        foreach ($db_countries as $db_country) {
            $services = self::getService();
            $provider = new Provider($db_country->Provider_Name,$db_country->Description,$db_country->Provider_Image, $db_country->Service_Model,$db_country->Deployment_Model,$db_country->Server_Location,$db_country->Criteria,$db_country->Subscription_Method,$db_country->Suitability, $db_country->Industry,$db_country->cloud_id, $services);
            array_push($providers, $provider);
        }

        return $providers;
    }
    

//    public static function getProviders() {
//        $providers = array();
//
//        $db_countries = DBClass::query('SELECT * FROM AWS_GCP');
//        foreach ($db_countries as $db_country) {
//            $services = self::getService(new Provider($db_country->Provider_Name, $db_country->Provider_Name,$db_country->Description,$db_country->Provider_Image, $db_country->Service_Model,$db_country->Deployment_Model,$db_country->Server_Location,$db_country->Criteria,$db_country->Subscription_Method,$db_country->Suitability, $db_country->Industry,$db_country->cloud_id));
//            $provider = new Provider($db_country->Provider_Name,$db_country->Description,$db_country->Provider_Image, $db_country->Service_Model,$db_country->Deployment_Model,$db_country->Server_Location,$db_country->Criteria,$db_country->Subscription_Method,$db_country->Suitability, $db_country->Industry,$db_country->cloud_id, $services);
//            array_push($providers, $provider);
//        }
//
//        return $providers;
//    }
    
    
//    $services = self::getService(new Provider($db_country->Provider_Name, $db_country->Provider_Name,$db_country->Description,$db_country->Provider_Image, $db_country->Service_Model,$db_country->Deployment_Model,$db_country->Server_Location,$db_country->Criteria,$db_country->Subscription_Method,$db_country->Suitability, $db_country->Industry,$db_country->cloud_id));

//    public static function getService(Provider $provider) {
//        $service_new = array();
//
//    $db_services = DBClass::query('SELECT * FROM Cloud_Services WHERE cloud_id=?',  array($provider->cloud_id));
//        foreach ($db_services as $db_service) {
//            $new = new Service($db_service->service_name,$db_service->service_description,$db_service->provider_name,$db_service->cloud_id);
//            
//            array_push($service_new, $new);
//        }
//
//        return $service_new;
//    }
    
    public static function getService() {
        $service_new = array();

    $db_services = DBClass::query('SELECT * FROM Cloud_Services');
        foreach ($db_services as $db_service) {
            $new = new Service($db_service->service_name,$db_service->service_description,$db_service->provider_name,$db_service->cloud_id);
            
            array_push($service_new, $new);
        }

        return $service_new;
    }


    public static function addService(Service $service, Provider $provider) {
        return DBClass::execute(
            'INSERT INTO Cloud_Services (service_name, service_description,provider_name,cloud_id) VALUES (?, ?,?,?)',
            array($service->service_name, $service->service_description,$service->provider_name, $provider->cloud_id));
    }

    public static function addProvider(Provider $provider) {
        $result = DBClass::execute(
            'INSERT INTO AWS_GCP (Provider_Name,Description, Provider_Image,Service_Model,Deployment_Model,Server_Location,Criteria, Subscription_Method,Suitability,Industry,cloud_id) VALUES (?, ?,?,?,?,?,?,?,?,?,?)', array($provider->name, $provider->description,$provider->image, $provider->service_model,$provider->deploy_model,  $provider->location,$provider->criteria,$provider->sub_method, $provider->suitability, $provider->industry,$provider->cloud_id));
         //if (count($provider->services) > 0) {
             //echo $provider->services;
            foreach ($provider->services as $service) {
                self::addService($service, $provider);
                
                 //echo $result;
            }
       //}
        //echo $result;
        return $result;
    }

}