<?php

namespace Tkotosz\CliAppWrapperApi;

class ApplicationConfig
{
    /** @var array */
    private $config;

    public static function fromArray(array $config): self
    {
        // TODO validation
        return new self($config);
    }

    public function appName(): string
    {
        return $this->config['app_name'];
    }

    public function appPackage(): string
    {
        return $this->config['app_package'];
    }

    public function appVersion(): string
    {
        return $this->config['app_version'];
    }

    public function appExtensionsPackageType(): string
    {
        return $this->config['app_extensions']['package_type'];
    }

    public function appExtensionsExtensionClassConfigField(): string
    {
        return $this->config['app_extensions']['extension_class_config_field'];
    }

    public function appDir(): string
    {
        return $this->config['app_dir'];
    }

    public function appFactory(): string
    {
        return $this->config['app_factory'];
    }

    public function repositories(): array
    {
        return $this->config['repositories'] ?? [];
    }

    public function isGlobalModeEnabled(): bool
    {
        return $this->config['global_mode_enabled'] ?? false;
    }

    public function localWorkingDir(): string
    {
        return getcwd();
    }

    public function globalWorkingDir(): string
    {
        if ($path = getenv('XDG_CONFIG_HOME')) {
            return $path;
        }

        return getenv('HOME') ?: (getenv('HOMEDRIVE') . DIRECTORY_SEPARATOR . getenv('HOMEPATH'));
    }

    public function localApplicationDir(): string
    {
        return $this->localWorkingDir() . DIRECTORY_SEPARATOR . $this->appDir();
    }

    public function globalApplicationDir(): string
    {
        return $this->globalWorkingDir() . DIRECTORY_SEPARATOR . $this->appDir();
    }

    private function __construct(array $config)
    {
        $this->config = $config;
    }
}