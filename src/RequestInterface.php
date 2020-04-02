<?php

namespace RT\Client;

interface RequestInterface
{
    public function request(
        string $method,
        string $url,
        string $data = null,
        array $headers = []
    ): ResponseInterface;
}
