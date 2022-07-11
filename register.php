<?php
require_once "vendor/autoload.php";
  
use GuzzleHttp\Client;

$client = new Client([
    'base_uri' => 'https://billing.time4vps.com/api',
]);


$resp = $client->post('/signup', [
    'json' => [
        "type" => "typeValue",
        "companyname" => "companynameValue",
        "companyregistrationnumber" => "companyregistrationnumberValue",
        "vateu" => "vateuValue",
        "email" => "emailValue",
        "password" => "passwordValue",
        "firstname" => "firstnameValue",
        "lastname" => "lastnameValue",
        "country" => "countryValue",
        "address1" => "address1Value",
        "city" => "cityValue",
        "emarketing" => "emarketingValue",
        "2faenable" => "2faenableValue",
        "2fasecret" => "2fasecretValue",
        "currency" => "currencyValue"
    ]
]);

echo $resp->getBody();