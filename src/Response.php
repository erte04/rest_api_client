<?php

namespace RT\Client;

use Nyholm\Psr7\Response as Psr7Response;

class Response implements ResponseInterface
{
    private $response;

    public function __construct(Psr7Response $response)
    {
        $this->response = $response;
    }

    public function getBody(bool $assoc = false)
    {
        return json_decode($this->response->getBody(), $assoc);
    }

    public function getStatusCode(): int
    {
        return $this->response->getStatusCode();
    }

    public function getHeaders(): array
    {
        return $this->response->getHeaders();
    }
}
