<?php

namespace Tkotosz\CliAppWrapperApi;

final class ApplicationDirectory
{
    /** @var AbsolutePath */
    private $path;

    public static function fromAbsolutePath(AbsolutePath $path): ApplicationDirectory
    {
        return new self($path);
    }

    public static function fromString(string $directory): ApplicationDirectory
    {
        return self::fromAbsolutePath(AbsolutePath::fromString($directory));
    }

    public function sameAs(ApplicationDirectory $applicationDirectory): bool
    {
        return $this->path->sameAs($applicationDirectory->path);
    }

    public function path(): AbsolutePath
    {
        return $this->path;
    }

    public function pathTo(RelativePath $path): AbsolutePath
    {
        return $this->path->append($path);
    }

    public function pathToFile(FileName $fileName): AbsolutePath
    {
        return $this->path->append(RelativePath::fromString($fileName->toString()));
    }

    public function toString(): string
    {
        return $this->path;
    }

    public function __toString()
    {
        return $this->toString();
    }

    private function __construct(AbsolutePath $directory)
    {
        $this->path = $directory;
    }
}