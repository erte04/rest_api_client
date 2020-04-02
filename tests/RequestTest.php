<?php

use PHPUnit\Framework\TestCase;
use RT\Client\Request;

final class RequestTest extends TestCase
{
    private $url = 'https://reqres.in/api';

    public function testRequest()
    {
        $Request = new Request();
        $Response = $Request->request('GET', $this->url . '/users');
        $this->assertSame(200, $Response->getStatusCode());
    }
}
