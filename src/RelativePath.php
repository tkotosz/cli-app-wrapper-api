<?php

namespace Tkotosz\CliAppWrapperApi;

use InvalidArgumentException;

final class RelativePath
{
    /** @var string */
    private $path;

    public static function fromString(string $path): RelativePath
    {
        if (strpos($path, DIRECTORY_SEPARATOR) === 0) {
            throw new InvalidArgumentException(
                sprintf('Expected relative path, absolute path given: "%s"', $path)
            );
        }

        return new self(rtrim($path, DIRECTORY_SEPARATOR));
    }

    public function append(RelativePath $path): RelativePath
    {
        return self::fromString($this->path . DIRECTORY_SEPARATOR . $path->toString());
    }

    public function prepend(RelativePath $path): RelativePath
    {
        return self::fromString($path->toString() . DIRECTORY_SEPARATOR . $this->path);
    }

    public function sameAs(RelativePath $absolutePath): bool
    {
        return $this->path === $absolutePath->path;
    }

    public function dirName(): RelativePath
    {
        return RelativePath::fromString(dirname($this->path));
    }

    public function fileName(): FileName
    {
        return FileName::fromString(basename($this->path));
    }

    public function toString(): string
    {
        return $this->path;
    }

    public function __toString()
    {
        return $this->toString();
    }

    private function __construct(string $path)
    {
        $this->path = $path;
    }
}