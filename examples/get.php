<?php

require_once('../vendor/autoload.php');

use RT\Client\Request;

$Request = new Request();
$Request->addHeader(['asdad' => 'test']);
$Response = $Request->request('get', 'https://reqres.in/api/users');

echo 'Status: ' . $Response->getStatusCode();
var_dump($Response->getBody(true));
var_dump($Response->getHeaders());
