<?php

namespace Joby\HTML\Html5\Forms;

use Joby\HTML\Html5\Tags\TagTestCase;

class TextareaTagTest extends TagTestCase
{

    // --- content ---

    public function testContent(): void
    {
        $tag = new TextareaTag();
        $tag->setContent('Hello world');
        $this->assertEquals('Hello world', $tag->content());
    }

    // --- maxlength ---

    public function testMaxlengthNullByDefault(): void
    {
        $tag = new TextareaTag();
        $this->assertNull($tag->maxlength());
    }

    public function testMaxlength(): void
    {
        $tag = new TextareaTag();
        $tag->setMaxlength(100);
        $this->assertEquals(100, $tag->maxlength());
        $tag->unsetMaxlength();
        $this->assertNull($tag->maxlength());
    }

    public function testMaxlengthNullUnsets(): void
    {
        $tag = new TextareaTag();
        $tag->setMaxlength(100);
        $tag->setMaxlength(null);
        $this->assertNull($tag->maxlength());
    }

    // --- minlength ---

    public function testMinlengthNullByDefault(): void
    {
        $tag = new TextareaTag();
        $this->assertNull($tag->minlength());
    }

    public function testMinlength(): void
    {
        $tag = new TextareaTag();
        $tag->setMinlength(10);
        $this->assertEquals(10, $tag->minlength());
        $tag->unsetMinlength();
        $this->assertNull($tag->minlength());
    }

    public function testMinlengthNullUnsets(): void
    {
        $tag = new TextareaTag();
        $tag->setMinlength(10);
        $tag->setMinlength(null);
        $this->assertNull($tag->minlength());
    }

    // --- rows ---

    public function testRowsNullByDefault(): void
    {
        $tag = new TextareaTag();
        $this->assertNull($tag->rows());
    }

    public function testRows(): void
    {
        $tag = new TextareaTag();
        $tag->setRows(5);
        $this->assertEquals(5, $tag->rows());
        $tag->unsetRows();
        $this->assertNull($tag->rows());
    }

    public function testRowsNullUnsets(): void
    {
        $tag = new TextareaTag();
        $tag->setRows(5);
        $tag->setRows(null);
        $this->assertNull($tag->rows());
    }

    // --- cols ---

    public function testColsNullByDefault(): void
    {
        $tag = new TextareaTag();
        $this->assertNull($tag->cols());
    }

    public function testCols(): void
    {
        $tag = new TextareaTag();
        $tag->setCols(40);
        $this->assertEquals(40, $tag->cols());
        $tag->unsetCols();
        $this->assertNull($tag->cols());
    }

    public function testColsNullUnsets(): void
    {
        $tag = new TextareaTag();
        $tag->setCols(40);
        $tag->setCols(null);
        $this->assertNull($tag->cols());
    }

    // --- readonly ---

    public function testReadonlyFalseByDefault(): void
    {
        $tag = new TextareaTag();
        $this->assertFalse($tag->readonly());
    }

    public function testReadonly(): void
    {
        $tag = new TextareaTag();
        $tag->setReadonly(true);
        $this->assertTrue($tag->readonly());
        $tag->setReadonly(false);
        $this->assertFalse($tag->readonly());
    }

    // --- placeholder ---

    public function testPlaceholderNullByDefault(): void
    {
        $tag = new TextareaTag();
        $this->assertNull($tag->placeholder());
    }

    public function testPlaceholder(): void
    {
        $tag = new TextareaTag();
        $tag->setPlaceholder('Enter your message here');
        $this->assertEquals('Enter your message here', $tag->placeholder());
        $tag->unsetPlaceholder();
        $this->assertNull($tag->placeholder());
    }

    public function testPlaceholderNullUnsets(): void
    {
        $tag = new TextareaTag();
        $tag->setPlaceholder('Enter your message here');
        $tag->setPlaceholder(null);
        $this->assertNull($tag->placeholder());
    }

    // --- wrap ---

    public function testWrapNullByDefault(): void
    {
        $tag = new TextareaTag();
        $this->assertNull($tag->wrap());
    }

    public function testWrap(): void
    {
        $tag = new TextareaTag();
        $tag->setWrap('hard');
        $this->assertEquals('hard', $tag->wrap());
        $tag->unsetWrap();
        $this->assertNull($tag->wrap());
    }

    public function testWrapNullUnsets(): void
    {
        $tag = new TextareaTag();
        $tag->setWrap('hard');
        $tag->setWrap(null);
        $this->assertNull($tag->wrap());
    }

    // --- FormControlTrait ---

    public function testName(): void
    {
        $tag = new TextareaTag();
        $this->assertNull($tag->name());
        $tag->setName('my-textarea');
        $this->assertEquals('my-textarea', $tag->name());
        $tag->unsetName();
        $this->assertNull($tag->name());
    }

    public function testDisabled(): void
    {
        $tag = new TextareaTag();
        $this->assertFalse($tag->disabled());
        $tag->setDisabled(true);
        $this->assertTrue($tag->disabled());
        $tag->setDisabled(false);
        $this->assertFalse($tag->disabled());
    }

    public function testForm(): void
    {
        $tag = new TextareaTag();
        $this->assertNull($tag->form());
        $tag->setForm('my-form');
        $this->assertEquals('my-form', $tag->form());
        $tag->unsetForm();
        $this->assertNull($tag->form());
    }

    // --- RequiredTrait ---

    public function testRequiredFalseByDefault(): void
    {
        $tag = new TextareaTag();
        $this->assertFalse($tag->required());
    }

    public function testRequired(): void
    {
        $tag = new TextareaTag();
        $tag->setRequired(true);
        $this->assertTrue($tag->required());
        $tag->setRequired(false);
        $this->assertFalse($tag->required());
    }

    // --- chaining ---

    public function testChaining(): void
    {
        $tag = new TextareaTag();
        $this->assertInstanceOf(TextareaTag::class, $tag->setContent('Hello'));
        $this->assertInstanceOf(TextareaTag::class, $tag->setMaxlength(100));
        $this->assertInstanceOf(TextareaTag::class, $tag->unsetMaxlength());
        $this->assertInstanceOf(TextareaTag::class, $tag->setMinlength(10));
        $this->assertInstanceOf(TextareaTag::class, $tag->unsetMinlength());
        $this->assertInstanceOf(TextareaTag::class, $tag->setRows(5));
        $this->assertInstanceOf(TextareaTag::class, $tag->unsetRows());
        $this->assertInstanceOf(TextareaTag::class, $tag->setCols(40));
        $this->assertInstanceOf(TextareaTag::class, $tag->unsetCols());
        $this->assertInstanceOf(TextareaTag::class, $tag->setReadonly(true));
        $this->assertInstanceOf(TextareaTag::class, $tag->setPlaceholder('Enter text'));
        $this->assertInstanceOf(TextareaTag::class, $tag->unsetPlaceholder());
        $this->assertInstanceOf(TextareaTag::class, $tag->setWrap('hard'));
        $this->assertInstanceOf(TextareaTag::class, $tag->unsetWrap());
        $this->assertInstanceOf(TextareaTag::class, $tag->setName('my-textarea'));
        $this->assertInstanceOf(TextareaTag::class, $tag->unsetName());
        $this->assertInstanceOf(TextareaTag::class, $tag->setDisabled(true));
        $this->assertInstanceOf(TextareaTag::class, $tag->setRequired(true));
        $this->assertInstanceOf(TextareaTag::class, $tag->setForm('my-form'));
        $this->assertInstanceOf(TextareaTag::class, $tag->unsetForm());
    }

}
