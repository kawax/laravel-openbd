<?php

use PHPUnit\Framework\TestCase;

use Revolution\OpenBD\OpenBD;

use GuzzleHttp\Client;
use GuzzleHttp\Handler\MockHandler;
use GuzzleHttp\HandlerStack;
use GuzzleHttp\Psr7\Response;

class OpenBDTest extends TestCase
{
    /**
     * @var OpenBD
     */
    protected $openbd;

    public function setUp(): void
    {
        parent::setUp();

        $this->setClientHandler('test');
    }

    /**
     * @param  string  $body
     */
    public function setClientHandler(string $body)
    {
        $mock = new MockHandler(
            [
                new Response(200, [], $body),
            ]
        );

        $handler = HandlerStack::create($mock);
        $client = new Client(['handler' => $handler]);

        $this->openbd = new OpenBD($client);
    }

    public function testInstance()
    {
        $this->assertInstanceOf('Revolution\OpenBD\OpenBD', $this->openbd);
    }

    public function testGet()
    {
        $this->setClientHandler(file_get_contents(__DIR__.'/stubs/get.json'));

        $response = $this->openbd->get(['978-4-7808-0204-7']);

        //                dd($response);

        $this->assertArrayHasKey('onix', $response[0]);
    }

    public function testConverge()
    {
        $this->setClientHandler(file_get_contents(__DIR__.'/stubs/coverage.json'));

        $response = $this->openbd->coverage();

        //                        dd($response);

        $this->assertEquals(45, count($response));
        $this->assertContains('9780001971714', $response);
    }

    public function testSchema()
    {
        $this->setClientHandler(file_get_contents(__DIR__.'/stubs/schema.json'));

        $response = $this->openbd->schema();

        //                dd($response);

        $this->assertArrayHasKey('additionalProperties', $response);
    }
}
