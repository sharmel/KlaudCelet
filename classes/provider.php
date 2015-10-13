<?php
class Provider{
    
    public $name;
    public $description;
    public $image;
    public $service_model;
    public $deploy_model;
    public $location;
    public $criteria;
    public $sub_method;
    public $suitability;
    public $industry;
    public $cloud_id;
    public $services;
    
    public function __construct($name='',$description='',$image='',$service_model='', $deploy_model='',$location='',$criteria='',$sub_method='', $suitability='',
                              $industry='', $cloud_id='', $services = array()){
        
        $this->name =$name;
        $this->description=$description;
        $this->image=$image;
        $this->service_model=$service_model;
        $this->deploy_model=$deploy_model;
        $this->location=$location;
        $this->criteria=$criteria;
        $this->sub_method=$sub_method;
        $this->suitability=$suitability;
        $this->industry=$industry;
        $this->cloud_id=$cloud_id;
        $this->services=$services;
    
    
    }
    
}
