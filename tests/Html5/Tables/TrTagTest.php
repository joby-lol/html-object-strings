<?php

namespace Joby\HTML\Html5\Tables;

use Joby\HTML\Html5\Tags\TagTestCase;

class TrTagTest extends TagTestCase
{

    // --- constructor ---

    public function testDefaultConstructor(): void
    {
        $tag = new TrTag();
        $this->assertEmpty($tag->children());
    }

    // --- children ---

    public function testAddThChild(): void
    {
        $tag = new TrTag();
        $th = new ThTag('Header');
        $tag->addChild($th);
        $this->assertContains($th, $tag->children());
    }

    public function testAddTdChild(): void
    {
        $tag = new TrTag();
        $td = new TdTag('Data');
        $tag->addChild($td);
        $this->assertContains($td, $tag->children());
    }

    public function testIgnoresNonCellChildren(): void
    {
        $tag = new TrTag();
        $tag->addChild(new CaptionTag());
        $this->assertEmpty($tag->children());
    }

    public function testThsSortBeforeTds(): void
    {
        $tag = new TrTag();
        $td = new TdTag('Data');
        $th = new ThTag('Header');
        $tag->addChild($td);
        $tag->addChild($th);
        $children = $tag->children();
        $this->assertInstanceOf(ThTag::class, $children[0]);
        $this->assertInstanceOf(TdTag::class, $children[1]);
    }

    // --- chaining ---

    public function testChaining(): void
    {
        $tag = new TrTag();
        $this->assertInstanceOf(TrTag::class, $tag->addChild(new TdTag()));
        $this->assertInstanceOf(TrTag::class, $tag->addChild(new ThTag()));
    }

}
