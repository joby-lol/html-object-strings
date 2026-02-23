<?php

namespace Joby\HTML\Html5\Forms;

use Joby\HTML\Html5\Tags\TagTestCase;

class SelectTagTest extends TagTestCase
{

    // --- multiple ---

    public function testMultipleFalseByDefault(): void
    {
        $tag = new SelectTag();
        $this->assertFalse($tag->multiple());
    }

    public function testMultiple(): void
    {
        $tag = new SelectTag();
        $tag->setMultiple(true);
        $this->assertTrue($tag->multiple());
        $tag->setMultiple(false);
        $this->assertFalse($tag->multiple());
    }

    // --- required ---

    public function testRequiredFalseByDefault(): void
    {
        $tag = new SelectTag();
        $this->assertFalse($tag->required());
    }

    public function testRequired(): void
    {
        $tag = new SelectTag();
        $tag->setRequired(true);
        $this->assertTrue($tag->required());
        $tag->setRequired(false);
        $this->assertFalse($tag->required());
    }

    // --- size ---

    public function testSizeNullByDefault(): void
    {
        $tag = new SelectTag();
        $this->assertNull($tag->size());
    }

    public function testSize(): void
    {
        $tag = new SelectTag();
        $tag->setSize(5);
        $this->assertEquals(5, $tag->size());
        $tag->unsetSize();
        $this->assertNull($tag->size());
    }

    public function testSizeZeroIsValid(): void
    {
        $tag = new SelectTag();
        $tag->setSize(0);
        $this->assertEquals(0, $tag->size());
    }

    public function testSizeNullUnsets(): void
    {
        $tag = new SelectTag();
        $tag->setSize(5);
        $tag->setSize(null);
        $this->assertNull($tag->size());
    }

    // --- FormControlTrait ---

    public function testName(): void
    {
        $tag = new SelectTag();
        $this->assertNull($tag->name());
        $tag->setName('my-select');
        $this->assertEquals('my-select', $tag->name());
        $tag->unsetName();
        $this->assertNull($tag->name());
    }

    public function testDisabled(): void
    {
        $tag = new SelectTag();
        $this->assertFalse($tag->disabled());
        $tag->setDisabled(true);
        $this->assertTrue($tag->disabled());
        $tag->setDisabled(false);
        $this->assertFalse($tag->disabled());
    }

    public function testForm(): void
    {
        $tag = new SelectTag();
        $this->assertNull($tag->form());
        $tag->setForm('my-form');
        $this->assertEquals('my-form', $tag->form());
        $tag->unsetForm();
        $this->assertNull($tag->form());
    }

    // --- chaining ---

    public function testChaining(): void
    {
        $tag = new SelectTag();
        $this->assertInstanceOf(SelectTag::class, $tag->setMultiple(true));
        $this->assertInstanceOf(SelectTag::class, $tag->setRequired(true));
        $this->assertInstanceOf(SelectTag::class, $tag->setSize(5));
        $this->assertInstanceOf(SelectTag::class, $tag->unsetSize());
        $this->assertInstanceOf(SelectTag::class, $tag->setName('my-select'));
        $this->assertInstanceOf(SelectTag::class, $tag->unsetName());
        $this->assertInstanceOf(SelectTag::class, $tag->setDisabled(true));
        $this->assertInstanceOf(SelectTag::class, $tag->setForm('my-form'));
        $this->assertInstanceOf(SelectTag::class, $tag->unsetForm());
    }

}
