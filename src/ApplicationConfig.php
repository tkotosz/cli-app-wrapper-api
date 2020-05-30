<?php

namespace Tkotosz\CliAppWrapperApi;

use InvalidArgumentException;

class ApplicationConfig
{
    private const REQUIRED_CONFIGS = ['app_name', 'app_package', 'app_version', 'app_dir', 'app_factory'];
    private const DEFAULT_CONFIGS = [
        'repositories' => [],
        'global_mode_enabled' => false,
        'app_extensions' => [
            'package_type' => null,
            'extension_class_config_field' => null
        ],
        'local_working_directory_resolvers' => ['cwd']
    ];

    /** @var array */
    private $config;

    public static function fromArray(array $config): self
    {
        foreach (self::REQUIRED_CONFIGS as $key) {
            if (empty($config[$key])) {
                throw new InvalidArgumentException(sprintf('Config "%s" required but not found', $key));
            }
        }

        return new self($config + self::DEFAULT_CONFIGS);
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

    public function appExtensionsPackageType(): ?string
    {
        return $this->config['app_extensions']['package_type'] ?? null;
    }

    public function appExtensionsExtensionClassConfigField(): ?string
    {
        return $this->config['app_extensions']['extension_class_config_field'] ?? null;
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
        return $this->config['repositories'];
    }

    public function isGlobalModeEnabled(): bool
    {
        return $this->config['global_mode_enabled'];
    }

    public function allowsExtensions(): bool
    {
        return $this->appExtensionsPackageType() !== null && $this->appExtensionsExtensionClassConfigField() !== null;
    }

    public function localWorkingDirectoryResolvers(): array
    {
        return array_filter(
            array_unique(array_merge($this->config['local_working_directory_resolvers'], ['cwd'])),
            function (string $resolver) {
                return in_array($resolver, ['git', 'cwd']); // only these 2 possible for now
            }
        );
    }

    private function __construct(array $config)
    {
        $this->config = $config;
    }
}