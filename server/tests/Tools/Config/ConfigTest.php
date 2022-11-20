<?php

namespace Tools\Config;

use HahneSoftware\IMS\Server\Tools\Config\Config;
use PHPUnit\Framework\TestCase;

class ConfigTest extends TestCase
{
    public function testReturnsValueForKey(): void
    {
        $config = new Config(['test' => 'value']);
        $this->assertEquals('value', $config->get('test'));
        $this->assertNotEquals('notvalue', $config->get('test'));
    }

    public function testReturnsValueForNestedKey(): void
    {
        $config = new Config(['test' => ['nested' => 'value']]);
        $this->assertEquals('value', $config->get('test.nested'));
        $this->assertNotEquals('notvalue', $config->get('test'));
        $this->assertNotEquals('notvalue', $config->get('test.nested'));
    }

    public function testReturnValueForDeeplyNestedKey(): void {
        $config = new Config(['test' => ['nested' => ['deeply' => 'value']]]);
        $this->assertEquals('value', $config->get('test.nested.deeply'));
        $this->assertNotEquals('notvalue', $config->get('test'));
        $this->assertNotEquals('notvalue', $config->get('test.nested'));
        $this->assertNotEquals('notvalue', $config->get('test.nested.deeply'));
    }

    public function testSetValueForKey(): void
    {
        $config = new Config([]);
        $config->set('test', 'value');
        $this->assertEquals('value', $config->get('test'));
        $this->assertNotEquals('notvalue', $config->get('test'));
    }

    public function testSetValueForNestedKey(): void
    {
        $config = new Config([]);
        $config->set('test.nested', 'value');
        $this->assertEquals('value', $config->get('test.nested'));
        $this->assertNotEquals('notvalue', $config->get('test'));
        $this->assertNotEquals('notvalue', $config->get('test.nested'));
    }
}
