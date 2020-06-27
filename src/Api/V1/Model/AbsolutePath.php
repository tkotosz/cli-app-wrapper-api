<?php

namespace Tkotosz\CliAppWrapperApi\Api\V1\Model;

use InvalidArgumentException;

final class AbsolutePath
{
    /** @var string */
    private $path;

    public static function fromString(string $path): AbsolutePath
    {
        if (strpos($path, DIRECTORY_SEPARATOR) !== 0) {
            throw new InvalidArgumentException(
                sprintf('Expected absolute path, relative path given: "%s"', $path)
            );
        }

        return new self(rtrim($path, DIRECTORY_SEPARATOR));
    }

    public function append(RelativePath $path): AbsolutePath
    {
        return self::fromString($this->path . DIRECTORY_SEPARATOR . $path->toString());
    }

    public function sameAs(AbsolutePath $absolutePath): bool
    {
        return $this->path === $absolutePath->path;
    }

    public function dirName(): AbsolutePath
    {
        return AbsolutePath::fromString(dirname($this->path));
    }

    public function fileName(): FileName
    {
        return FileName::fromString(basename($this->path));
    }

    public function toRelativePath(AbsolutePath $basePath): RelativePath
    {
        return RelativePath::fromString(
            preg_replace(
                sprintf('|^%s|', $basePath->toString() . DIRECTORY_SEPARATOR),
                '',
                $this->path
            )
        );
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