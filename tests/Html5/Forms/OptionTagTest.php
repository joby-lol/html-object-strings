<?php

namespace Joby\HTML\Html5\Forms;

use Joby\HTML\Html5\Tags\TagTestCase;

class OptionTagTest extends TagTestCase
{

    // --- value ---

    public function testValue(): void
    {
        $tag = new OptionTag();
        $this->assertNull($tag->value());
        $tag->setValue('my-value');
        $this->assertEquals('my-value', $tag->value());
        $tag->unsetValue();
        $this->assertNull($tag->value());
    }

    public function testValueNullUnsets(): void
    {
        $tag = new OptionTag();
        $tag->setValue('my-value');
        $tag->setValue(null);
        $this->assertNull($tag->value());
    }

    // --- selected ---

    public function testSelected(): void
    {
        $tag = new OptionTag();
        $this->assertFalse($tag->selected());
        $tag->setSelected(true);
        $this->assertTrue($tag->selected());
        $tag->setSelected(false);
        $this->assertFalse($tag->selected());
    }

    // --- disabled ---

    public function testDisabled(): void
    {
        $tag = new OptionTag();
        $this->assertFalse($tag->disabled());
        $tag->setDisabled(true);
        $this->assertTrue($tag->disabled());
        $tag->setDisabled(false);
        $this->assertFalse($tag->disabled());
    }

    // --- label ---

    public function testLabel(): void
    {
        $tag = new OptionTag();
        $this->assertNull($tag->label());
        $tag->setLabel('My Option');
        $this->assertEquals('My Option', $tag->label());
        $tag->unsetLabel();
        $this->assertNull($tag->label());
    }

    public function testLabelNullUnsets(): void
    {
        $tag = new OptionTag();
        $tag->setLabel('My Option');
        $tag->setLabel(null);
        $this->assertNull($tag->label());
    }

    // --- chaining ---

    public function testChaining(): void
    {
        $tag = new OptionTag();
        $this->assertInstanceOf(OptionTag::class, $tag->setValue('my-value'));
        $this->assertInstanceOf(OptionTag::class, $tag->unsetValue());
        $this->assertInstanceOf(OptionTag::class, $tag->setSelected(true));
        $this->assertInstanceOf(OptionTag::class, $tag->setDisabled(true));
        $this->assertInstanceOf(OptionTag::class, $tag->setLabel('My Option'));
        $this->assertInstanceOf(OptionTag::class, $tag->unsetLabel());
    }

}
