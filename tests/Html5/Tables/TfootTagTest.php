<?php

namespace Joby\HTML\Html5\Tables;

use Joby\HTML\Html5\Tags\TagTestCase;

class TfootTagTest extends TagTestCase
{

    public function testDefaultConstructor(): void
    {
        $tag = new TfootTag();
        $this->assertEmpty($tag->children());
    }

    public function testAddTrChild(): void
    {
        $tag = new TfootTag();
        $tr = new TrTag();
        $tag->addChild($tr);
        $this->assertContains($tr, $tag->children());
    }

    public function testIgnoresNonTrChildren(): void
    {
        $tag = new TfootTag();
        $tag->addChild(new TdTag());
        $this->assertEmpty($tag->children());
    }

    public function testChaining(): void
    {
        $tag = new TfootTag();
        $this->assertInstanceOf(TfootTag::class, $tag->addChild(new TrTag()));
    }

}
