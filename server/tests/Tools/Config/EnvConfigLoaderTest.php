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
        $_ENV['IMS_TEST2_NESTED2'] = 'value_nested';
        $_ENV['IMS_TEST3_NESTED_NESTED'] = 'value_nested_nested';
    }

    protected function tearDown(): void
    {
        parent::tearDown();
        unset($_ENV['IMS_TEST']);
        unset($_ENV['IMS_TEST2_NESTED']);
        unset($_ENV['IMS_TEST2_NESTED2']);
        unset($_ENV['IMS_TEST3_NESTED_NESTED']);
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
        $this->assertEquals('value_nested', $config->get('TEST2.NESTED2'));
        $this->assertEquals('value_nested_nested', $config->get('TEST3.NESTED.NESTED'));

        $this->assertNotEquals('notvalue', $config->get('TEST2'));
        $this->assertNotEquals('notvalue', $config->get('TEST2.NESTED'));
        $this->assertNotEquals('notvalue', $config->get('TEST3.NESTED.NESTED'));
    }

    public function testDoubleUsedIndexFails(): void
    {
        $this->expectException(\InvalidArgumentException::class);
        $this->expectExceptionMessage('The index "TEST" is already used.');
        $_ENV['IMS_TEST'] = 'value';
        $_ENV['IMS_TEST_NESTED'] = 'value_nested';
        (new EnvConfigLoader())->loadConfig();

        // unset envs
        unset($_ENV['IMS_TEST']);
        unset($_ENV['IMS_TEST_NESTED']);
    }
}
