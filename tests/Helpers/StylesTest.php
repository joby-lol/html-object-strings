<?php

namespace ByJoby\HTML\Helpers;

use PHPUnit\Framework\TestCase;

class StylesTest extends TestCase
{
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
        $this->assertTrue(isset($styles['a']));
        $this->assertFalse(isset($styles['foo']));
    }

    public function testToString(): void
    {
        $styles = new Styles(['a' => 'b', 'b' => 'c']);
        $this->assertEquals('a:b;b:c', $styles->__toString());
    }
}
