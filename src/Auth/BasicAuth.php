<?php

namespace RT\Client\Auth;

class BasicAuth implements AuthInterface
{

    private $username;
    private $password;

    public function __construct(string $username, string $password)
    {
        $this->username = $username;
        $this->password = $password;
    }

    public function getHeader(): array
    {
        $headers = ['Authorization' => 'Basic ' . base64_encode($this->username . ':' . $this->password)];
        return $headers;
    }
}
