<?php

require_once('../vendor/autoload.php');

use RT\Client\Request;

$Request = new Request();
$data = json_encode(['name' => 'test', 'job' => 'developer']);
$Response = $Request->request('put', 'https://reqres.in/api/users/1', $data);

echo 'Status: ' . $Response->getStatusCode();
var_dump($Response->getBody(true));
var_dump($Response->getHeaders());
