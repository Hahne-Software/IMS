<?php

namespace Tools\Config;

use HahneSoftware\IMS\Server\Tools\Config\TomlConfigLoader;
use PHPUnit\Framework\TestCase;

class TomlConfigLoaderTest extends TestCase
{
    public function testReturnsConfigFromString(): void
    {
        $config = TomlConfigLoader::getTomlConfigFromString('test = "value"');
        $this->assertEquals('value', $config->loadConfig()->get('test'));
    }

    public function testReturnsConfigFromFile(): void
    {
        $config = TomlConfigLoader::getTomlConfigFromFile(__DIR__ . '/test.toml');
        $this->assertEquals('value', $config->loadConfig()->get('test'));
    }

    public function testLoadNestedConfig(): void
    {
        $config = TomlConfigLoader::getTomlConfigFromFile(__DIR__ . '/test.toml');
        $this->assertEquals('value_nested', $config->loadConfig()->get('test2.nested'));
        $this->assertEquals('value_nested', $config->loadConfig()->get('test2.nested2'));
    }

    public function testLoadDeeplyNestedConfig(): void
    {
        $config = TomlConfigLoader::getTomlConfigFromFile(__DIR__ . '/test.toml');
        $this->assertEquals('value_deeply_nested', $config->loadConfig()->get('test3.nested.nested'));
        $this->assertEquals('value_deeply_nested', $config->loadConfig()->get('test3.nested.nested2'));
    }
}
