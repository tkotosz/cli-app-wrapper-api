<?php

namespace Tkotosz\CliAppWrapperApi;

final class WorkingDirectory
{
    /** @var AbsolutePath */
    private $path;

    public static function fromAbsolutePath(AbsolutePath $path): WorkingDirectory
    {
        return new self($path);
    }

    public static function fromString(string $directory): WorkingDirectory
    {
        return self::fromAbsolutePath(AbsolutePath::fromString($directory));
    }

    public function sameAs(WorkingDirectory $workingDirectory): bool
    {
        return $this->path->sameAs($workingDirectory->path);
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