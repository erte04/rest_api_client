<?php

use Nyholm\Psr7\Response as Psr7Response;
use PHPUnit\Framework\TestCase;
use RT\Client\Response;

final class ResponseTest extends TestCase
{
    public function testResponse()
    {
        $Response = new Response(new Psr7Response(200, []));
        $this->assertSame(200, $Response->getStatusCode());
    }

    public function testResponseWithData()
    {
        $Response = new Response(new Psr7Response(201, [], '{"name": "test", "job": "developer"}'));
        $this->assertSame(201, $Response->getStatusCode());
        $data = $Response->getBody(true);
        $this->assertArrayHasKey('name', $data);
        $this->assertArrayHasKey('job', $data);
        $this->assertSame($data['name'], 'test');
        $this->assertSame($data['job'], 'developer');
    }
}
