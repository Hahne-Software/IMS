<?php

namespace HahneSoftware\IMS\Server\Tools\Config;

class EnvConfigLoader implements ConfigLoaderInterface
{
    const CONFIG_PREFIX = 'IMS_';

    public function loadConfig(): Config
    {
        return $this->loadNamedConfig('');
    }

    public function loadNamedConfig(string $name): Config
    {
        $envs = $this->loadEnvs($this::CONFIG_PREFIX . $name);

        $config = new Config();

        foreach ($envs as $key => $value) {
            // remove prefix
            $key = str_replace(self::CONFIG_PREFIX, '', $key);
            // remove name when named config should be loaded
            $key = str_replace($name, '', $key);
            $key = str_replace('_', '.', $key);

            $config->set($key, $value);
        }

        return $config;
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