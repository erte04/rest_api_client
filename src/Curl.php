<?php

namespace RT\Client;

use Nyholm\Psr7\Response;
use Psr\Http\Message\RequestInterface;
use Psr\Http\Message\ResponseInterface;

class Curl
{
    private $curlHandle;

    public function __construct()
    {
        $this->curlHandle = curl_init();
    }

    public function exec(RequestInterface $request): ResponseInterface
    {
        curl_setopt($this->curlHandle, CURLOPT_URL, $request->getUri());
        curl_setopt($this->curlHandle, CURLOPT_RETURNTRANSFER, true);
        curl_setopt_array($this->curlHandle, $this->setOptions($request));

        $curl_data = curl_exec($this->curlHandle);

        if (!curl_errno($this->curlHandle)) {
            $info = curl_getinfo($this->curlHandle);
        }

        curl_close($this->curlHandle);
        return new Response($info['http_code'], [], $curl_data);
    }




    private function setOptions(RequestInterface $request): array
    {
        $options = [];
        switch (strtoupper($request->getMethod())) {
            case 'GET':
                $options[CURLOPT_HTTPGET] = true;
                break;
            case 'POST':
                $options[CURLOPT_POST] = 1;
            case 'PUT':
            case 'PATCH':
            case 'DELETE':
                $options[CURLOPT_HTTPHEADER] = ['Content-Type: application/json', 'Content-Length: ' . strlen($request->getBody()->__toString())];
                $options[CURLOPT_POSTFIELDS] = $request->getBody()->__toString();
                $options[CURLOPT_CUSTOMREQUEST] = strtoupper($request->getMethod());
                break;
        }

        return $options;
    }
}
