<?php

namespace Tkotosz\CliAppWrapperApi\Api\V1\Model;

class ExtensionSource
{
    /** @var string */
    private $name;

    /** @var string */
    private $type;

    /** @var string */
    private $url;

    public static function fromValues(string $name, string $type, string $url): ExtensionSource
    {
        return new self($name, $type, $url);
    }

    public function name(): string
    {
        return $this->name;
    }

    public function type(): string
    {
        return $this->type;
    }

    public function url(): string
    {
        return $this->url;
    }

    private function __construct(string $name, string $type, string $url)
    {
        $this->name = $name;
        $this->type = $type;
        $this->url = $url;
    }
}