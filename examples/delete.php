<?php

require_once('../vendor/autoload.php');

use RT\Client\Request;

$Request = new Request();
$Response = $Request->request('delete', 'https://reqres.in/api/users/1');

echo 'Status: ' . $Response->getStatusCode();
var_dump($Response->getBody(true));
var_dump($Response->getHeaders());
