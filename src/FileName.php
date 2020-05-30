<?php

namespace Tkotosz\CliAppWrapperApi;

use InvalidArgumentException;

final class FileName
{
    /** @var string */
    private $fileName;

    public static function fromString(string $fileName): FileName
    {
        if (strpos($fileName, DIRECTORY_SEPARATOR) !== false) {
            throw new InvalidArgumentException(
                sprintf('Expected file name, file path given: "%s"', $fileName)
            );
        }

        return new self($fileName);
    }

    public function toString(): string
    {
        return $this->fileName;
    }

    public function __toString()
    {
        return $this->toString();
    }

    private function __construct(string $fileName)
    {
        $this->fileName = $fileName;
    }
}