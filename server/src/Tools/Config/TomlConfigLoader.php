<?php

namespace HahneSoftware\IMS\Server\Tools\Config;

use Yosymfony\Toml\Toml;

class TomlConfigLoader implements ConfigLoaderInterface
{
    private array $tomlConfig;

    public function __construct(array $tomlConfig)
    {
        $this->tomlConfig = $tomlConfig;
    }

    public static function getTomlConfigFromString(string $tomlString): TomlConfigLoader
    {
        $tomlConfig = Toml::Parse($tomlString);

        return new TomlConfigLoader($tomlConfig);
    }

    public static function getTomlConfigFromFile(string $tomlFilePath): TomlConfigLoader
    {
        $tomlConfig = Toml::ParseFile($tomlFilePath);

        return new TomlConfigLoader($tomlConfig);
    }

    public function loadConfig(): Config
    {
        return new Config($this->tomlConfig);
    }

    public function loadNamedConfig(string $name): Config
    {
        return new Config($this->tomlConfig[$name]);
    }
}