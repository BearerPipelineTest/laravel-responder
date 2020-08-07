<?php

namespace Flugg\Responder\Tests\Unit;

use Flugg\Responder\ErrorMessageRegistry;
use Flugg\Responder\Tests\UnitTestCase;

/**
 * Unit tests for the [Flugg\Responder\ErrorMessageRegistry] class.
 *
 * @see \Flugg\Responder\ErrorMessageRegistry
 */
class ErrorMessageRegistryTest extends UnitTestCase
{
    /**
     * Class being tested.
     *
     * @var \Flugg\Responder\ErrorMessageRegistry
     */
    protected $messageRegistry;

    /**
     * Setup the test environment.
     *
     * @return void
     */
    public function setUp(): void
    {
        parent::setUp();

        $this->messageRegistry = new ErrorMessageRegistry();
    }

    /**
     * Assert that [resolve] returns registered error message.
     */
    public function testResolveMethodReturnsMessage()
    {
        $this->messageRegistry->register($code = 'error_occured', $message = 'An error has occured.');

        $result = $this->messageRegistry->resolve($code);

        $this->assertEquals($message, $result);
    }

    /**
     * Assert that [resolve] returns null if no error messages are registered.
     */
    public function testResolveMethodReturnsNull()
    {
        $message = $this->messageRegistry->resolve('error_occured');

        $this->assertNull($message);
    }

    /**
     * Assert that [register] accepts an array of error messages.
     */
    public function testRegisterMethodCanSetMultipleMessages()
    {
        $this->messageRegistry->register($messages = [
            'error_occured' => 'An error has occured.',
            'another_error_occured' => 'Yet another error occured.',
        ]);

        foreach ($messages as $code => $message) {
            $result = $this->messageRegistry->resolve($code);
            $this->assertEquals($message, $result);
        }
    }
}
