<?php

require_once 'DBHelper.php';
require_once 'provider.php';
require_once 'services.php';

class Providers{
 
    //private static $providers = array();
    //private static $providers = array(); 
    
    public static function init() {
        DBHelper::resetDB();
        DBHelper::addProvider(
            new Provider('Google Cloud Platform','Google Cloud Platform is a set of modular cloud-based services that allow you to create anything from simple websites to complex applications.','download.png','PaaS','Public cloud','North America','Low cost','Pay Per Use',1,'Energy & Environment',1, array(
                new Service('BigQuery', 'Querying massive datasets can be time consuming and expensive without the right hardware and infrastructure. Google BigQuery solves this problem by enabling super-fast, SQL-like queries against append-only tables, using the processing power of Google"s infrastructure','Google Cloud Platform'),new Service('App Engine', 'Google App Engine is a platform for building scalable web apps and mobile backends. App Engine provides you with built-in services and APIs, like a NoSQL datastore, memcache, and a user authentication API, common to most apps.','Google Cloud Platform')    
            )));
        DBHelper::addProvider(
            new Provider('Amazon Web Services','AWS began offering its technology infrastructure platform in 2006. Since then.','Amazon_Inc_1571001.png','SaaS','Public cloud','USA West California','DRP','Pay Per Use',1,'Media & Entertainment',2, array(
            new Service('Amazon Simple Storage Service', 'Amazon Simple Storage Service (Amazon S3), provides developers and IT teams with secure, durable, highly-scalable object storage.','Amazon Web Services'),new Service('Elastic Compute Cloud (EC2)', 'Amazon Elastic Compute Cloud (Amazon EC2) is a web service that provides resizable compute capacity in the cloud. It is designed to make web-scale cloud computing easier for developers.','Amazon Web Services')
                        )));
        
        
        DBHelper::addProvider(
            new Provider('CloudSigma', 'CloudSigma"s virtualization is based on KVM and includes full CPU instruction set, flexible CPU provisioning, NUMA topology exposure and QEMU VIRTIO (para-visualization).', 'CloudSigma.jpg','IaaS','Hybrid cloud ', 'North America', 'Low cost','Pay Per Use', 1, 'Banking & Finance', 3));
        
        DBHelper::addProvider(
            new Provider('WorkXpress', 'WorkXpress is a robust platform as a service (PaaS) offering you the ability to build your own complex database apps 100% visually.','WorkXpress_6551902.jpg', 'PaaS', 'Hybrid cloud ', 'North America','Cloud storage',  'Pay Per Use and Fixed Rate',1, 'Energy & Environment', 4));
        
        DBHelper::addProvider(
            new Provider('Lunacloud', 'Lunacloud is a provider that not only delivers real cloud services that meet all the essential characteristics of Cloud Computing but strives to exceed your expectations by being technologically advanced and design mindfully.','Lunacloud_1571955.png', 'PaaS', 'Hybrid cloud ', 'Europe', 'Hourly Rate','Fixed Rate', 1, 'Media & Entertainment', 5));
        
        
        DBHelper::addProvider(
            new Provider('Windows Azure', 'With Windows Azure, you can spin up new Windows Server and Linux virtual machines in minutes and adjust your usage as your needs change.','Microsoft_1571003.png', 'PaaS', 'Private cloud ', 'Europe', 'Products','Pay Per Use', 0, 'Information and Communication Technology', 6));
        
        DBHelper::addProvider(
            new Provider('EngineYard', 'Engine Yard is the leading cloud application management platform empowering developers and DevOps to provision, manage, monitor and control applications in the public and private cloud.','Engine_Yard_Inc_6337183.png', 'PaaS','Private cloud ', 'North America', 'SLA','Fixed Rate', 0, 'Healthcare & Pharmaceuticals', 7));
        
        
        
        DBHelper::addProvider(
            new Provider('Rackspace', 'Whether you’re building a corporate website or a demanding application, our public cloud can power your most critical workloads.','Rackspace_59596.png','IaaS', 'Hybrid cloud ','North America', 'Managed cloud', 'Pay Per Use and Fixed Rate', 1, 'Transportation & Logistics', 8));
        
        DBHelper::addProvider(
            new Provider('FireHost', 'FireHost provides secure cloud hosting without sacrificing the redundancy and speed you would expect from an enterprise managed cloud hosting provider.','FireHost_Inc_6362185.jpg','IaaS', 'Private cloud ', 'Europe', 'DRP', 'Fixed Rate', 1, 'Retail & Customer Services', 9));
        
        DBHelper::addProvider(
            new Provider('Skyvia', 'Skyvia is a cloud service for data integration and backup.','Skyvia_6926251.png','PaaS', 'Private cloud ', 'North America', 'Cloud storage','Fixed Rate', 1, 'Customer Relationship Management', 10));
        
        
    }
    
    public static function getProviders(){
        return DBHelper::getProviders();
    }
//    public static function getProvider($cloud_id) {
//        return DBHelper::getProvider(new Provider('', $cloud_id));
//}
    
//    public static function getService($cloud_id) {
//        return DBHelper::getService(new Provider($cloud_id));
//}
    public static function getService() {
        return DBHelper::getService();
}
    public static function addService($name, $countryCode) {
        return DBHelper::addService(new Service($name), new Provider('', $countryCode));
    }
    }
