<?php

use PHPUnit\Framework\TestCase;
use RT\Client\Auth\JWTAuth;
use RT\Client\Request;

final class JWTAuthTest extends TestCase
{
    private $token = 'test';

    public function testGetHeader()
    {
        $BasicAuth = new JWTAuth($this->token);
        $headers = $BasicAuth->getHeader();

        $this->assertArrayHasKey('Authorization', $headers);
        $this->assertSame($headers['Authorization'], 'Bearer ' . $this->token);
    }
}
