<?php
class Service{

    public $service_name;
    public $service_description;
    public $provider_name;
    public $cloud_id;

    
    public function __construct($service_name='',$service_description='',$provider_name='', $cloud_id=''){
        
        $this->service_name =$service_name;
        $this->service_description=$service_description;
        $this->provider_name=$provider_name;
        $this->cloud_id=$cloud_id;
        
    
    
    }

}