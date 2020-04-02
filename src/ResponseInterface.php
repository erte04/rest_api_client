<?php

namespace RT\Client;


interface ResponseInterface
{
    public function getBody(bool $assoc = false);
    public function getStatusCode(): int;
}
