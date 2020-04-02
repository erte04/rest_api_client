<?php

require_once('vendor/autoload.php');

use RT\Client\Auth\BasicAuth;
use RT\Client\Request;

$Request = new Request();
$BasicAuth = new BasicAuth('test', 'test');
$Request->addHeader($BasicAuth->getHeader());
$Response = $Request->request('Get', 'http://httpbin.org/basic-auth/test/test');

var_dump($Response->getBody());
var_dump($Response->getStatusCode());
var_dump($Response->getHeaders());
