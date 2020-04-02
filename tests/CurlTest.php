<?php

use Nyholm\Psr7\Request;
use PHPUnit\Framework\TestCase;
use RT\Client\Curl;

final class CurlTest extends TestCase
{
    private $url = 'https://reqres.in/api';
    private $curl;

    protected function setUp(): void
    {
        $this->curl = new Curl();
    }

    public function testCurlGetList()
    {
        $Response = $this->curl->exec(new Request('Get', $this->url . '/users'));

        $this->assertSame(200, $Response->getStatusCode());
        $data = json_decode($Response->getBody(), true);
        $this->assertArrayHasKey('page', $data);
        $this->assertArrayHasKey('per_page', $data);
        $this->assertArrayHasKey('total_pages', $data);
        $this->assertArrayHasKey('data', $data);
    }

    public function testCurlGet()
    {
        $Response = $this->curl->exec(new Request('Get', $this->url . '/users/1'));

        $this->assertSame(200, $Response->getStatusCode());
        $data = json_decode($Response->getBody(), true);
        $this->assertIsInt($data['data']['id']);
        $this->assertIsString($data['data']['email']);
        $this->assertIsString($data['data']['first_name']);
        $this->assertIsString($data['data']['last_name']);
        $this->assertIsString($data['data']['avatar']);
    }

    public function testCurlNotFound()
    {
        $Response = $this->curl->exec(new Request('Get', $this->url . '/users/85'));
        $this->assertSame(404, $Response->getStatusCode());
    }


    public function testCurlPOST()
    {
        $body = json_encode(['name' => 'test', 'job' => 'developer']);
        $Response = $this->curl->exec(new Request('Post', $this->url . '/users', [], $body));
        $this->assertSame(201, $Response->getStatusCode());
        $data = json_decode($Response->getBody(), true);
        $this->assertArrayHasKey('id', $data);
        $this->assertIsString($data['name']);
        $this->assertIsString($data['job']);
        $this->assertIsString($data['createdAt']);
    }


    public function testCurlPUT()
    {
        $this->checkEdit('put');
    }


    public function testCurlPATCH()
    {
        $this->checkEdit('patch');
    }

    private function checkEdit($method)
    {
        $body = json_encode(['name' => 'test', 'job' => 'developer']);
        $Response = $this->curl->exec(new Request($method, $this->url . '/users/1', [], $body));
        $this->assertSame(200, $Response->getStatusCode());
        $data = json_decode($Response->getBody(), true);
        $this->assertIsString($data['name']);
        $this->assertIsString($data['job']);
        $this->assertIsString($data['updatedAt']);
    }


    public function testCurlDELETE()
    {
        $Response = $this->curl->exec(new Request('Delete', $this->url . '/users/1'));
        $this->assertSame(204, $Response->getStatusCode());
    }
}
