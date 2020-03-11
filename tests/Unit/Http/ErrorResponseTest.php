<?php

namespace Flugg\Responder\Tests\Unit\Http;

use Flugg\Responder\Exceptions\InvalidStatusCodeException;
use Flugg\Responder\Http\ErrorResponse;
use Flugg\Responder\Tests\UnitTestCase;

/**
 * Unit tests for the [Flugg\Responder\Http\ErrorResponse] class.
 *
 * @package flugger/laravel-responder
 * @author Alexander Tømmerås <flugged@gmail.com>
 * @license The MIT License
 */
class ErrorResponseTest extends UnitTestCase
{
    /**
     * Class being tested.
     *
     * @var ErrorResponse
     */
    protected $response;

    /**
     * Setup the test environment.
     *
     * @return void
     */
    public function setUp(): void
    {
        parent::setUp();

        $this->response = new ErrorResponse;
    }

    /**
     * Assert that [setCode] and [code] sets and gets error code respectively.
     */
    public function testSetAndGetCode()
    {
        $result = $this->response->setCode($code = 'error_occured');

        $this->assertSame($this->response, $result);
        $this->assertEquals($code, $this->response->code());
    }

    /**
     * Assert that [setMessage] and [message] sets and gets error message respectively.
     */
    public function testSetAndGetMessage()
    {
        $result = $this->response->setMessage($message = 'An error has occured.');

        $this->assertSame($this->response, $result);
        $this->assertEquals($message, $this->response->message());
    }

    /**
     * Assert that [setStatus] and [status] sets and gets status codes respectively.
     */
    public function testSetAndGetStatusCode()
    {
        $this->response->setStatus($status = 400);

        $this->assertEquals($status, $this->response->status());
    }

    /**
     * Assert that [setStatus] throws an exception when given a success status code.
     */
    public function testSetStatusThrowsExceptionForInvalidStatusCodes()
    {
        $this->expectException(InvalidStatusCodeException::class);

        $this->response->setStatus(201);
    }

    /**
     * Assert that [setHeaders] and [headers] sets and gets status codes respectively.
     */
    public function testSetAndGetHeaders()
    {
        $this->response->setHeaders($headers = ['x-foo' => 123]);

        $this->assertEquals($headers, $this->response->headers());
    }

    /**
     * Assert that [setMeta] and [meta] sets and gets meta data respectively.
     */
    public function testSetAndGetMeta()
    {
        $this->response->setMeta($meta = ['foo' => 123]);

        $this->assertEquals($meta, $this->response->meta());
    }
}
