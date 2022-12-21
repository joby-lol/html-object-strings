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

    /**
     * @depends clone testConstruction
     */
    public function testInvalidInputs(Styles $styles): void
    {
        // null assignments don't work
        $styles[] = 'b';
        $this->assertEquals(['foo' => 'bar'], $styles->getArray());
        // empty attribute doesn't work
        $styles[''] = 'b';
        $this->assertEquals(['foo' => 'bar'], $styles->getArray());
        // attributes that trim to nothing don't work
        $styles[' '] = 'b';
        $this->assertEquals(['foo' => 'bar'], $styles->getArray());
        // empty values don't work
        $styles['quux'] = '';
        $this->assertEquals(['foo' => 'bar'], $styles->getArray());
        // values containing ; don't work
        $styles['quux'] = 'x;y';
        $this->assertEquals(['foo' => 'bar'], $styles->getArray());
        // values containing : don't work
        $styles['quux'] = 'x:y';
        $this->assertEquals(['foo' => 'bar'], $styles->getArray());
    }
}
