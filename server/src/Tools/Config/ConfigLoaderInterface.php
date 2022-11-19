<?php

namespace HahneSoftware\IMS\Server\Tools\Config;

interface ConfigLoaderInterface
{
    public function loadConfig(): Config;

    public function loadNamedConfig(string $name): Config;
}