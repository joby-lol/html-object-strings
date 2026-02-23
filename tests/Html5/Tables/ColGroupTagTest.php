<?php

namespace Joby\HTML\Html5\Tables;

use Joby\HTML\Html5\Tags\TagTestCase;

class ColGroupTagTest extends TagTestCase
{

    // --- constructor ---

    public function testDefaultConstructor(): void
    {
        $tag = new ColGroupTag();
        $this->assertNull($tag->span());
        $this->assertEmpty($tag->children());
    }

    // --- span ---

    public function testSetSpan(): void
    {
        $tag = new ColGroupTag();
        $tag->setSpan(3);
        $this->assertSame(3, $tag->span());
    }

    public function testSetSpanToNullUnsets(): void
    {
        $tag = new ColGroupTag();
        $tag->setSpan(3)->setSpan(null);
        $this->assertNull($tag->span());
    }

    public function testUnsetSpan(): void
    {
        $tag = new ColGroupTag();
        $tag->setSpan(3)->unsetSpan();
        $this->assertNull($tag->span());
    }

    // --- children ---

    public function testAddColChild(): void
    {
        $tag = new ColGroupTag();
        $col = new ColTag();
        $tag->addChild($col);
        $this->assertContains($col, $tag->children());
    }

    public function testIgnoresNonColChildren(): void
    {
        $tag = new ColGroupTag();
        $tag->addChild(new CaptionTag());
        $this->assertEmpty($tag->children());
    }

    // --- chaining ---

    public function testChaining(): void
    {
        $tag = new ColGroupTag();
        $this->assertInstanceOf(ColGroupTag::class, $tag->setSpan(2));
        $this->assertInstanceOf(ColGroupTag::class, $tag->unsetSpan());
        $this->assertInstanceOf(ColGroupTag::class, $tag->addChild(new ColTag()));
    }

}
