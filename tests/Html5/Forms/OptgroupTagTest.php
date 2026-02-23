<?php

namespace Joby\HTML\Html5\Forms;

use Joby\HTML\Html5\Tags\TagTestCase;

class OptgroupTagTest extends TagTestCase
{

    public function testAttributeHelpers(): void
    {
        $this->assertAttributeHelperMethods('label', OptgroupTag::class);
    }

    // --- label ---

    public function testLabel(): void
    {
        $tag = new OptgroupTag();
        $this->assertNull($tag->label());
        $tag->setLabel('Fruits');
        $this->assertEquals('Fruits', $tag->label());
        $tag->unsetLabel();
        $this->assertNull($tag->label());
    }

    public function testLabelNullUnsets(): void
    {
        $tag = new OptgroupTag();
        $tag->setLabel('Fruits');
        $tag->setLabel(null);
        $this->assertNull($tag->label());
    }

    // --- disabled ---

    public function testDisabled(): void
    {
        $tag = new OptgroupTag();
        $this->assertFalse($tag->disabled());
        $tag->setDisabled(true);
        $this->assertTrue($tag->disabled());
        $tag->setDisabled(false);
        $this->assertFalse($tag->disabled());
    }

    // --- chaining ---

    public function testChaining(): void
    {
        $tag = new OptgroupTag();
        $this->assertInstanceOf(OptgroupTag::class, $tag->setLabel('Fruits'));
        $this->assertInstanceOf(OptgroupTag::class, $tag->unsetLabel());
        $this->assertInstanceOf(OptgroupTag::class, $tag->setDisabled(true));
    }

}
