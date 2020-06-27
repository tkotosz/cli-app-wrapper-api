<?php

namespace Tkotosz\CliAppWrapperApi\Api\V1\Model;

use InvalidArgumentException;

final class ApplicationCommandResult
{
    /** @var int */
    private $code;

    public static function success(): ApplicationCommandResult
    {
        return new self(0);
    }

    public static function failure(int $code = 1): ApplicationCommandResult
    {
        if ($code === 0) {
            throw new InvalidArgumentException('Error code must not be 0');
        }

        return new self($code);
    }

    public static function fromInt(int $code): ApplicationCommandResult
    {
        return ($code === 0) ? self::success() : self::failure($code);
    }

    public function isSuccess(): bool
    {
        return $this->code === 0;
    }

    public function isFailure(): bool
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