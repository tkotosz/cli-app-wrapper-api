<?php

namespace Tkotosz\CliAppWrapperApi;

class Extension
{
    /** @var string */
    private $name;

    /** @var string */
    private $version;

    /** @var string */
    private $extensionClass;

    public static function fromValues(string $name, string $version, string $extensionClass): Extension
    {
        return new self($name, $version, $extensionClass);
    }

    public function name(): string
    {
        return $this->name;
    }

    public function version(): string
    {
        return $this->version;
    }

    public function extensionClass(): string
    {
        return $this->extensionClass;
    }

    private function __construct(string $name, string $version, string $extensionClass)
    {
        $this->name = $name;
        $this->version = $version;
        $this->extensionClass = $extensionClass;
    }
}