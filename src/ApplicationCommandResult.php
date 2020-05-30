<?php

namespace Tkotosz\CliAppWrapperApi;

use InvalidArgumentException;

final class ApplicationCommandResult
{
    /** @var int */
    private $code;

    public static function success()
    {
        return new self(0);
    }

    public static function failure(int $code = 1)
    {
        if ($code === 0) {
            throw new InvalidArgumentException('Error code must not be 0');
        }

        return new self($code);
    }

    public function isSuccess(): bool
    {
        return $this->code === 0;
    }

    public function isError(): bool
    {
        return $this->code !== 0;
    }

    public function toInt(): int
    {
        return $this->code;
    }

    private function __construct(int $code)
    {
        $this->code = $code;
    }
}