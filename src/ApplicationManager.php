<?php

namespace Tkotosz\CliAppWrapperApi;

interface ApplicationManager
{
    public function getApplicationConfig(): ApplicationConfig;

    public function getWorkingDirectory(): string;

    public function init(): int;

    public function updateExtensions(): int;

    public function installExtension(string $extensionPackage, string $extensionVersion = null): int;

    public function removeExtension(string $extensionPackage): int;

    public function findInstalledExtensions(): Extensions;

    public function findAvailableExtensions(): Extensions;
}