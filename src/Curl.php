<?php

namespace RT\Client;

use Psr\Http\Message\RequestInterface;
use Psr\Http\Message\ResponseInterface;

class Curl
{
    private $curlHandle;

    public function __construct()
    {
        $this->curlHandle = curl_init();
    }

    public function exec(RequestInterface $request): ResponseInterface{

    }
}