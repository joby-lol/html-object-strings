<?php

namespace Joby\HTML\Html5\Tables;

use Joby\HTML\Html5\Tags\TagTestCase;

class TbodyTagTest extends TagTestCase
{

    // --- constructor ---

    public function testDefaultConstructor(): void
    {
        $tag = new TbodyTag();
        $this->assertEmpty($tag->children());
    }

    // --- children ---

    public function testAddTrChild(): void
    {
        $tag = new TbodyTag();
        $tr = new TrTag();
        $tag->addChild($tr);
        $this->assertContains($tr, $tag->children());
    }

    public function testAddMultipleTrChildren(): void
    {
        $tag = new TbodyTag();
        $tr1 = new TrTag();
        $tr2 = new TrTag();
        $tag->addChild($tr1);
        $tag->addChild($tr2);
        $this->assertContains($tr1, $tag->children());
        $this->assertContains($tr2, $tag->children());
        $this->assertCount(2, $tag->children());
    }

    public function testIgnoresNonTrChildren(): void
    {
        $tag = new TbodyTag();
        $tag->addChild(new TdTag());
        $this->assertEmpty($tag->children());
    }

    // --- chaining ---

    public function testChaining(): void
    {
        $tag = new TbodyTag();
        $this->assertInstanceOf(TbodyTag::class, $tag->addChild(new TrTag()));
    }

}
