<?php
//making a RestFul API service

require '../classes/providerRepository.php';


header('Content-type: application/json');
echo ")]}'\n";


$provider = Providers::getProviders();

echo json_encode($provider);
