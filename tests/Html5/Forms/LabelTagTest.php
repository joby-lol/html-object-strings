<?php

namespace Joby\HTML\Html5\Forms;

use Joby\HTML\Html5\Tags\TagTestCase;

class LabelTagTest extends TagTestCase
{

    public function testAttributeHelpers(): void
    {
        $this->assertAttributeHelperMethods('for', LabelTag::class);
    }

    public function testFor(): void
    {
        $tag = new LabelTag();
        $this->assertNull($tag->for());
        $tag->setFor('my-input');
        $this->assertEquals('my-input', $tag->for());
        $tag->unsetFor();
        $this->assertNull($tag->for());
    }

    public function testForNullUnsets(): void
    {
        $tag = new LabelTag();
        $tag->setFor('my-input');
        $tag->setFor(null);
        $this->assertNull($tag->for());
    }

    public function testChaining(): void
    {
        $tag = new LabelTag();
        $this->assertInstanceOf(LabelTag::class, $tag->setFor('my-input'));
        $this->assertInstanceOf(LabelTag::class, $tag->unsetFor());
    }

}
