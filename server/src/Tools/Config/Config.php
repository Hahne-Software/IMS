<?php

namespace HahneSoftware\IMS\Server\Tools\Config;

class Config
{
    private array $config;

    public function __construct(array $config = [])
    {
        $this->config = $config;
    }

    public function get(string $key, $default = null)
    {
        $keys = explode('.', $key);
        $value = $this->config;
        foreach ($keys as $key) {
            if (!isset($value[$key])) {
                return $default;
            }
            $value = $value[$key];
        }
        return $value;
    }

    public function set(string $key, $value): void
    {
        $keys = explode('.', $key);
        $config = &$this->config;
        foreach ($keys as $key) {
            if (!isset($config[$key])) {
                $config[$key] = [];
            }

            // throw exception if nested key is not an array
            if(!is_array($config[$key])) {
                throw new \InvalidArgumentException('The index "' . $key . '" is already used.');
            }

            $config = &$config[$key];
        }
        $config = $value;
    }
}