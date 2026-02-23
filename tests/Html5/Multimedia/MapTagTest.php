<?php

namespace Joby\HTML\Html5\Multimedia;

use Joby\HTML\Html5\Tags\TagTestCase;

class MapTagTest extends TagTestCase
{

    // --- constructor ---

    public function testConstructorWithName(): void
    {
        $tag = new MapTag('my-map');
        $this->assertEquals('my-map', $tag->name());
    }

    public function testConstructorWithoutNameGeneratesName(): void
    {
        $tag = new MapTag();
        $this->assertNotEmpty($tag->name());
    }

    public function testConstructorAutoNamesAreUnique(): void
    {
        $a = new MapTag();
        $b = new MapTag();
        $this->assertNotEquals($a->name(), $b->name());
    }

    // --- name ---

    public function testSetName(): void
    {
        $tag = new MapTag('original');
        $tag->setName('updated');
        $this->assertEquals('updated', $tag->name());
    }

    public function testNameAlwaysReturnsValue(): void
    {
        // name() should never return null or empty — it generates one if needed
        $tag = new MapTag('my-map');
        $this->assertNotEmpty($tag->name());
    }

    public function testChaining(): void
    {
        $tag = new MapTag('my-map');
        $this->assertInstanceOf(MapTag::class, $tag->setName('other-map'));
    }

}
