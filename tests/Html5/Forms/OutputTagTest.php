<?php

namespace Joby\HTML\Html5\Forms;

use Joby\HTML\Html5\Tags\TagTestCase;

class OutputTagTest extends TagTestCase
{

    // --- for ---

    public function testForNullByDefault(): void
    {
        $tag = new OutputTag();
        $this->assertNull($tag->for());
    }

    public function testFor(): void
    {
        $tag = new OutputTag();
        $tag->setFor('input-a input-b');
        $this->assertEquals('input-a input-b', $tag->for());
        $tag->unsetFor();
        $this->assertNull($tag->for());
    }

    public function testForNullUnsets(): void
    {
        $tag = new OutputTag();
        $tag->setFor('input-a');
        $tag->setFor(null);
        $this->assertNull($tag->for());
    }

    // --- form ---

    public function testFormNullByDefault(): void
    {
        $tag = new OutputTag();
        $this->assertNull($tag->form());
    }

    public function testForm(): void
    {
        $tag = new OutputTag();
        $tag->setForm('my-form');
        $this->assertEquals('my-form', $tag->form());
        $tag->unsetForm();
        $this->assertNull($tag->form());
    }

    public function testFormNullUnsets(): void
    {
        $tag = new OutputTag();
        $tag->setForm('my-form');
        $tag->setForm(null);
        $this->assertNull($tag->form());
    }

    // --- name ---

    public function testNameNullByDefault(): void
    {
        $tag = new OutputTag();
        $this->assertNull($tag->name());
    }

    public function testName(): void
    {
        $tag = new OutputTag();
        $tag->setName('result');
        $this->assertEquals('result', $tag->name());
        $tag->unsetName();
        $this->assertNull($tag->name());
    }

    public function testNameNullUnsets(): void
    {
        $tag = new OutputTag();
        $tag->setName('result');
        $tag->setName(null);
        $this->assertNull($tag->name());
    }

    // --- chaining ---

    public function testChaining(): void
    {
        $tag = new OutputTag();
        $this->assertInstanceOf(OutputTag::class, $tag->setFor('input-a'));
        $this->assertInstanceOf(OutputTag::class, $tag->unsetFor());
        $this->assertInstanceOf(OutputTag::class, $tag->setForm('my-form'));
        $this->assertInstanceOf(OutputTag::class, $tag->unsetForm());
        $this->assertInstanceOf(OutputTag::class, $tag->setName('result'));
        $this->assertInstanceOf(OutputTag::class, $tag->unsetName());
    }

}
