<?php

namespace Flugg\Responder\Http;

/**
 * Value object class holding information about an error response.
 *
 * @package flugger/laravel-responder
 * @author Alexander Tømmerås <flugged@gmail.com>
 * @license The MIT License
 */
class ErrorResponse extends Response
{
    /**
     * Error code representing the error response.
     *
     * @var int|string
     */
    protected $code;

    /**
     * Error message describing the error response.
     *
     * @var string|null
     */
    protected $message = null;

    /**
     * Get the error code.
     *
     * @return int|string
     */
    public function code()
    {
        return $this->code;
    }

    /**
     * Get the error message.
     *
     * @return string|null
     */
    public function message(): ?string
    {
        return $this->message;
    }

    /**
     * Set the error code.
     *
     * @param int|string $code
     * @return $this
     */
    public function setCode($code)
    {
        $this->code = $code;

        return $this;
    }

    /**
     * Set the error message.
     *
     * @param string $message
     * @return $this
     */
    public function setMessage(string $message)
    {
        $this->message = $message;

        return $this;
    }

    /**
     * Verify that the status code is valid.
     *
     * @param int $status
     * @return bool
     */
    protected function isValidStatusCode(int $status): bool
    {
        return $status >= 400 && $status < 600;
    }
}
