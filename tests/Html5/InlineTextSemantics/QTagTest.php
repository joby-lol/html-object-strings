<?php

namespace Joby\HTML\Html5\InlineTextSemantics;

use Joby\HTML\Html5\Tags\TagTestCase;

class QTagTest extends TagTestCase
{

    public function testAttributeHelpers(): void
    {
        $this->assertAttributeHelperMethods('cite', QTag::class);
    }

    public function testCiteBasic(): void
    {
        $tag = new QTag();
        // null by default
        $this->assertNull($tag->cite());
        // set and retrieve
        $tag->setCite('https://example.com/source');
        $this->assertEquals('https://example.com/source', $tag->cite());
        $this->assertEquals('https://example.com/source', $tag->attributes()->asString('cite'));
        // unset
        $tag->unsetCite();
        $this->assertNull($tag->cite());
    }

    public function testCiteNullUnsets(): void
    {
        $tag = new QTag();
        $tag->setCite('https://example.com/source');
        $tag->setCite(null);
        $this->assertNull($tag->cite());
    }

    public function testCiteChaining(): void
    {
        $tag = new QTag();
        $this->assertInstanceOf(QTag::class, $tag->setCite('https://example.com/source'));
        $this->assertInstanceOf(QTag::class, $tag->unsetCite());
    }

}
