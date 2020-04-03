<?php

namespace RT\Client;

use Exception;
use Nyholm\Psr7\Request as Psr7Request;
use Nyholm\Psr7\Response as Psr7Response;

class Request implements RequestInterface
{
    private $headers = [];

    public function request(
        string $method,
        string $url,
        string $data = null,
        array $headers = []
    ): ResponseInterface {

        try {
            $curl = new Curl();
            $headers = array_merge($this->headers, $headers);
            $ResponsePsr7 = $curl->exec(new Psr7Request($method, $url, $headers, $data));
            return new Response($ResponsePsr7);
        } catch (Exception $e) {
            $message = ['error' => 1, 'message' => $e->getMessage()];
            return new Response(new Psr7Response(400, [], json_encode($message)));
        }
    }

    public function addHeader(array $header)
    {
        $this->headers = array_merge($this->headers, $header);
    }
}
