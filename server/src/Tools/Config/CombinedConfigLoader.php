<?php

namespace HahneSoftware\IMS\Server\Tools\Config;

class CombinedConfigLoader implements ConfigLoaderInterface
{
    private array $configs;
    public function loadConfig(): Config
    {
        // search in $configs for the first config with the key
        // if not found, return default


        // TODO: Implement loadConfig() method.
    }

    public function loadNamedConfig(string $name): Config
    {
        // TODO: Implement loadNamedConfig() method.
    }
}