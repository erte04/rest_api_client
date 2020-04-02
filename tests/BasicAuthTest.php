<?php

use PHPUnit\Framework\TestCase;
use RT\Client\Auth\BasicAuth;
use RT\Client\Request;

final class BasicAuthTest extends TestCase
{
    private $username = 'test';
    private $password = 'test';

    public function testGetHeader()
    {
        $BasicAuth = new BasicAuth($this->username, $this->password);
        $headers = $BasicAuth->getHeader();

        $this->assertArrayHasKey('Authorization', $headers);
        $this->assertSame($headers['Authorization'], sprintf('Basic %s', base64_encode($this->username . ':' . $this->password)));
    }
}
