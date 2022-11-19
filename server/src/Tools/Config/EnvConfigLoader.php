<?php

namespace HahneSoftware\IMS\Server\Tools\Config;

class EnvConfigLoader implements ConfigLoaderInterface
{
    const CONFIG_PREFIX = 'IMS_';

    public function loadConfig(): Config
    {
        $envs = $this->loadEnvs($this::CONFIG_PREFIX);

        $config = new Config();

        foreach ($envs as $key => $value) {

            $key = str_replace(self::CONFIG_PREFIX, '', $key);
            $key = str_replace('_', '.', $key);

            $config->set($key, $value);
        }

        return $config;
    }

    public function loadNamedConfig(string $name): Config
    {
        // TODO: Implement loadNamedConfig() method.
    }

    private function loadEnvs(string $prefix): array
    {
        $envs = [];
        foreach ($_ENV as $key => $value) {
            if (str_starts_with($key, $prefix)) {
                $envs[$key] = $value;
            }
        }
        return $envs;
    }
}