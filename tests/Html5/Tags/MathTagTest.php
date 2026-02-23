<?php

/**
 * HTML Object Strings
 * https://github.com/joby-lol/html-object-strings
 * (c) 2024-2026 Joby Elliott code@joby.lol
 * MIT License https://opensource.org/licenses/MIT
 */

namespace Joby\HTML\Html5\Tags;

use Joby\HTML\Html5\Tags\MathTag\DisplayValue;

class MathTagTest extends TagTestCase
{

    // --- constructor ---

    public function testConstructorSetsContent(): void
    {
        $tag = new MathTag('<mi>x</mi>');
        $this->assertStringContainsString('<mi>x</mi>', (string) $tag->content());
    }

    // --- display ---

    public function testDisplayDefaultsToNull(): void
    {
        $tag = new MathTag('');
        $this->assertNull($tag->display());
    }

    public function testSetDisplayBlock(): void
    {
        $tag = new MathTag('');
        $tag->setDisplay(DisplayValue::block);
        $this->assertSame(DisplayValue::block, $tag->display());
    }

    public function testSetDisplayInline(): void
    {
        $tag = new MathTag('');
        $tag->setDisplay(DisplayValue::inline);
        $this->assertSame(DisplayValue::inline, $tag->display());
    }

    public function testSetDisplayNullUnsets(): void
    {
        $tag = new MathTag('');
        $tag->setDisplay(DisplayValue::block)->setDisplay(null);
        $this->assertNull($tag->display());
    }

    public function testUnsetDisplay(): void
    {
        $tag = new MathTag('');
        $tag->setDisplay(DisplayValue::block)->unsetDisplay();
        $this->assertNull($tag->display());
    }

    // --- chaining ---

    public function testChaining(): void
    {
        $tag = new MathTag('');
        $this->assertInstanceOf(MathTag::class, $tag->setDisplay(DisplayValue::block));
        $this->assertInstanceOf(MathTag::class, $tag->unsetDisplay());
    }

}
