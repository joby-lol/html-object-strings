<?php

namespace ByJoby\HTML\Helpers;

use PHPUnit\Framework\TestCase;

class AttributesTest extends TestCase
{
    public function testConstruction(): Attributes
    {
        $attributes = new Attributes();
        $this->assertEquals([], $attributes->getArray());
        $attributes = new Attributes(['foo' => 'bar', 'baz' => null]);
        $this->assertEquals(['baz' => null, 'foo' => 'bar'], $attributes->getArray());
        return $attributes;
    }

    public function testInvalidConstructionEmptyName(): Attributes
    {
        $this->expectExceptionMessage('Attribute name must be specified when setting');
        $attributes = new Attributes(['' => 'foo']);
    }

    public function testInvalidConstructionInvalidName(): Attributes
    {
        $this->expectExceptionMessage('Invalid character in attribute name');
        $attributes = new Attributes(['a=b' => 'foo']);
    }

    /**
     * @depends clone testConstruction
     */
    public function testSetAndUnset(Attributes $attributes): void
    {
        $attributes['a'] = 'b';
        $this->assertEquals('b', $attributes['a']);
        $this->assertEquals(['a' => 'b', 'baz' => null, 'foo' => 'bar'], $attributes->getArray());
        unset($attributes['baz']);
        $this->assertEquals(['a' => 'b', 'foo' => 'bar'], $attributes->getArray());
    }

    /**
     * @depends clone testConstruction
     */
    public function testInvalidSetEmptyName(Attributes $attributes): void
    {
        $this->expectExceptionMessage('Attribute name must be specified when setting');
        $attributes[] = 'b';
    }

    /**
     * @depends clone testConstruction
     */
    public function testInvalidSetInvalidName(Attributes $attributes): void
    {
        $this->expectExceptionMessage('Invalid character in attribute name');
        $attributes['>'] = 'b';
    }
}
