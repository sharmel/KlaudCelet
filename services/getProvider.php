<?php

require_once '../classes/providerRepository.php';

header('Content-type: application/json');
echo ")]}'\n";

if (isset($_GET['cloud_id'])) {
    $provider = Providers::getProvider($_GET['cloud_id']);
    echo json_encode($provider);
}
