<?php

namespace RT\Client;

use Nyholm\Psr7\Request as Psr7Request;

class Request implements RequestInterface
{
    public function request(
        string $method,
        string $url,
        string $data = null,
        array $headers = []
    ): ResponseInterface {

        $curl = new Curl();
        $ResponsePsr7 = $curl->exec(new Psr7Request($method, $url, $headers, $data));
        return new Response($ResponsePsr7);
    }
}
