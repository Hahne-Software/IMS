<?php

namespace Tools\Config;

use HahneSoftware\IMS\Server\Tools\Config\EnvConfigLoader;
use PHPUnit\Framework\TestCase;

class EnvConfigLoaderTest extends TestCase
{
    protected function setUp(): void
    {
        parent::setUp();
        $_ENV['IMS_TEST'] = 'value';
        $_ENV['IMS_TEST2_NESTED'] = 'value_nested';
    }

    protected function tearDown(): void
    {
        parent::tearDown();
        unset($_ENV['IMS_TEST']);
        unset($_ENV['IMS_TEST2_NESTED']);
    }

    public function testLoadConfig(): void
    {
        $config = (new EnvConfigLoader())->loadConfig();
        $this->assertEquals('value', $config->get('TEST'));
        $this->assertNotEquals('notvalue', $config->get('TEST'));
    }

    public function testLoadNestedConfig(): void
    {
        $config = (new EnvConfigLoader())->loadConfig();
        $this->assertEquals('value_nested', $config->get('TEST2.NESTED'));
        $this->assertNotEquals('notvalue', $config->get('TEST2'));
        $this->assertNotEquals('notvalue', $config->get('TEST2.NESTED'));
    }
}
