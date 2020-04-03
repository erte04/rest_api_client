<?php

require_once('../vendor/autoload.php');


use RT\Client\Auth\BasicAuth;
use RT\Client\Auth\JWTAuth;
use RT\Client\Request;

$Request = new Request();
$BasicAuth = new JWTAuth('test');
$Request->addHeader($BasicAuth->getHeader());
$Response = $Request->request('Get', 'http://httpbin.org/bearer');

echo 'Status: ' . $Response->getStatusCode();
var_dump($Response->getBody());
var_dump($Response->getHeaders());
