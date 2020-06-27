<?php

namespace Tkotosz\CliAppWrapperApi\Api\V1\Model;

class WorkingMode
{
    private const MODE_LOCAL = 'local';
    private const MODE_GLOBAL = 'global';

    /** @var string */
    private $mode;

    public static function local(): WorkingMode
    {
        return new self(self::MODE_LOCAL);
    }

    public static function global(): WorkingMode
    {
        return new self(self::MODE_GLOBAL);
    }

    public function isGlobal(): bool
    {
        return $this->mode === self::MODE_GLOBAL;
    }

    public function isLocal(): bool
    {
        return $this->mode === self::MODE_LOCAL;
    }

    public function toString(): string
    {
        return $this->mode;
    }

    public function __toString()
    {
        return $this->toString();
    }

    private function __construct(string $mode)
    {
        $this->mode = $mode;
    }
}