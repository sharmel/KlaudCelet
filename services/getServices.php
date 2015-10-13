<?php

require_once '../classes/providerRepository.php';

header('Content-type: application/json');
echo ")]}'\n";

//if(isset($_GET['cloud_id'])) {
    //echo "yes";
    $services = Providers::getService();
    //echo $services;
    echo json_encode($services);
//}
