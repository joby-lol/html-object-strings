<?php

namespace Joby\HTML\Html5\InlineTextSemantics;

use Joby\HTML\Html5\Tags\TagTestCase;

class DfnTagTest extends TagTestCase
{

    public function testAttributeHelpers(): void
    {
        $this->assertAttributeHelperMethods('title', DfnTag::class);
    }

    public function testTitleBasic(): void
    {
        $tag = new DfnTag();
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
        $tag = new DfnTag();
        $tag->setTitle('HyperText Markup Language');
        $tag->setTitle(null);
        $this->assertNull($tag->title());
    }

    public function testTitleEmptyStringIsValid(): void
    {
        $tag = new DfnTag();
        $tag->setTitle('');
        $this->assertEquals('', $tag->title());
    }

    public function testTitleChaining(): void
    {
        $tag = new DfnTag();
        $this->assertInstanceOf(DfnTag::class, $tag->setTitle('HyperText Markup Language'));
        $this->assertInstanceOf(DfnTag::class, $tag->unsetTitle());
    }

}
