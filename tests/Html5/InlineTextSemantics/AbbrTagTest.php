<?php

namespace Joby\HTML\Html5\InlineTextSemantics;

use Joby\HTML\Html5\Tags\TagTestCase;

class AbbrTagTest extends TagTestCase
{

    public function testAttributeHelpers(): void
    {
        $this->assertAttributeHelperMethods('title', AbbrTag::class);
    }

    public function testTitleBasic(): void
    {
        $tag = new AbbrTag();
        // null by default
        $this->assertNull($tag->title());
        // set and retrieve
        $tag->setTitle('HyperText Markup Language');
        $this->assertEquals('HyperText Markup Language', $tag->title());
        $this->assertEquals('HyperText Markup Language', $tag->attributes()->asString('title'));
        // unset
        $tag->unsetTitle();
        $this->assertNull($tag->title());
    }

    public function testTitleNullUnsets(): void
    {
        $tag = new AbbrTag();
        $tag->setTitle('HyperText Markup Language');
        $tag->setTitle(null);
        $this->assertNull($tag->title());
    }

    public function testTitleChaining(): void
    {
        $tag = new AbbrTag();
        $this->assertInstanceOf(AbbrTag::class, $tag->setTitle('HyperText Markup Language'));
        $this->assertInstanceOf(AbbrTag::class, $tag->unsetTitle());
    }

}
