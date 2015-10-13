<?php

  $providers = [
    [ "name" => "AWS"],
    [ "name" => "GCP"]
  ];

  $json = json_encode($providers);
//echo $json;

  var_dump(json_decode($json));