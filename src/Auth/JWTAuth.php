<?php

namespace RT\Client\Auth;

class JWTAuth implements AuthInterface
{
    private $token;

    public function __construct(string $token)
    {
        $this->token = $token;
    }

    public function getHeader(): array
    {
        $headers = ['Authorization' => 'Bearer ' . $this->token];
        return $headers;
    }
}
