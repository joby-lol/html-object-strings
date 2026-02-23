<?php

namespace Joby\HTML\Html5\Tables;

use Joby\HTML\Html5\Tags\TagTestCase;

class TheadTagTest extends TagTestCase
{

    public function testDefaultConstructor(): void
    {
        $tag = new TheadTag();
        $this->assertEmpty($tag->children());
    }

    public function testAddTrChild(): void
    {
        $tag = new TheadTag();
        $tr = new TrTag();
        $tag->addChild($tr);
        $this->assertContains($tr, $tag->children());
    }

    public function testIgnoresNonTrChildren(): void
    {
        $tag = new TheadTag();
        $tag->addChild(new TdTag());
        $this->assertEmpty($tag->children());
    }

    public function testChaining(): void
    {
        $tag = new TheadTag();
        $this->assertInstanceOf(TheadTag::class, $tag->addChild(new TrTag()));
    }

}
