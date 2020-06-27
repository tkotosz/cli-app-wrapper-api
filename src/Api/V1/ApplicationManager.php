<?php

namespace Tkotosz\CliAppWrapperApi\Api\V1;

use Tkotosz\CliAppWrapperApi\Api\V1\Model\ApplicationCommandResult;
use Tkotosz\CliAppWrapperApi\Api\V1\Model\ApplicationConfig;
use Tkotosz\CliAppWrapperApi\Api\V1\Model\ApplicationDirectory;
use Tkotosz\CliAppWrapperApi\Api\V1\Model\Extensions;
use Tkotosz\CliAppWrapperApi\Api\V1\Model\ExtensionSource;
use Tkotosz\CliAppWrapperApi\Api\V1\Model\ExtensionSources;
use Tkotosz\CliAppWrapperApi\Api\V1\Model\WorkingDirectory;
use Tkotosz\CliAppWrapperApi\Api\V1\Model\WorkingMode;

interface ApplicationManager
{
    public function getApplicationConfig(): ApplicationConfig;

    public function getWorkingMode(): WorkingMode;

    public function getWorkingDirectory(): WorkingDirectory;

    public function getLocalWorkingDirectory(): WorkingDirectory;

    public function getGlobalWorkingDirectory(): WorkingDirectory;

    public function getApplicationDirectory(): ApplicationDirectory;

    public function getLocalApplicationDirectory(): ApplicationDirectory;

    public function getGlobalApplicationDirectory(): ApplicationDirectory;

    public function installExtension(string $extensionPackage, string $extensionVersion = null): ApplicationCommandResult;

    public function removeExtension(string $extensionPackage): ApplicationCommandResult;

    public function findInstalledExtensions(): Extensions;

    public function findAvailableExtensions(): Extensions;

    public function addExtensionSource(ExtensionSource $extensionSource): ApplicationCommandResult;

    public function removeExtensionSource(string $name): ApplicationCommandResult;

    public function findExtensionSources(): ExtensionSources;

    public function update(): ApplicationCommandResult;
}