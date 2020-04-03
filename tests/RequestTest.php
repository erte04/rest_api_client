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


    public function testCurlErrorException()
    {
        $Request = new Request();
        $Response = $Request->request('GET', 'example');
        $data = $Response->getBody(true);
        $this->assertSame(400, $Response->getStatusCode());
        $this->assertArrayHasKey('error', $data);
        $this->assertSame('Could not resolve host: example', $data['message']);
    }
}
