<?php

namespace ByJoby\HTML\Helpers;

use PHPUnit\Framework\TestCase;

class StylesTest extends TestCase
{
    public function testValidate(): void
    {
        $this->assertTrue(Styles::validate('foo', 'bar'));
        $this->assertFalse(Styles::validate('foo', ''));
        $this->assertFalse(Styles::validate('foo', ' '));
        $this->assertFalse(Styles::validate('foo', null));
        $this->assertTrue(Styles::validate(' -foo', 'bar'));
        $this->assertTrue(Styles::validate(' foo ', 'bar'));
        $this->assertFalse(Styles::validate('', 'bar'));
        $this->assertFalse(Styles::validate('-', 'bar'));
        $this->assertFalse(Styles::validate(' ', 'bar'));
        $this->assertFalse(Styles::validate(null, 'bar'));
    }

    /**
     * @depends testValidate
     */
    public function testConstruction(): Styles
    {
        $styles = new Styles();
        $this->assertEquals([], $styles->getArray());
        $styles = new Styles(['foo' => 'bar', 'baz' => null]);
        $this->assertEquals(['foo' => 'bar'], $styles->getArray());
        return $styles;
    }

    /**
     * @depends clone testConstruction
     */
    public function testGettingAndSetting(Styles $styles): void
    {
        $styles['a'] = 'b';
        $this->assertEquals('b', $styles['a']);
        unset($styles['foo']);
        $this->assertNull($styles['foo']);
    }
}
