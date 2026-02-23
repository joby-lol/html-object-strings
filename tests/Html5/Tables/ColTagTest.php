<?php

namespace Joby\HTML\Html5\Tables;

use Joby\HTML\Html5\Tags\TagTestCase;

class ColTagTest extends TagTestCase
{

    // --- constructor ---

    public function testDefaultConstructor(): void
    {
        $tag = new ColTag();
        $this->assertNull($tag->span());
    }

    // --- span ---

    public function testSetSpan(): void
    {
        $tag = new ColTag();
        $tag->setSpan(3);
        $this->assertSame(3, $tag->span());
    }

    public function testSetSpanToNullUnsets(): void
    {
        $tag = new ColTag();
        $tag->setSpan(3)->setSpan(null);
        $this->assertNull($tag->span());
    }

    public function testUnsetSpan(): void
    {
        $tag = new ColTag();
        $tag->setSpan(3)->unsetSpan();
        $this->assertNull($tag->span());
    }

    // --- chaining ---

    public function testChaining(): void
    {
        $tag = new ColTag();
        $this->assertInstanceOf(ColTag::class, $tag->setSpan(2));
        $this->assertInstanceOf(ColTag::class, $tag->unsetSpan());
    }

}
