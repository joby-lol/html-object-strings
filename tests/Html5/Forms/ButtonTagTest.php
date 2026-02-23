<?php

namespace Joby\HTML\Html5\Forms;

use Joby\HTML\Html5\Enums\BrowsingContext;
use Joby\HTML\Html5\Forms\ButtonTag\TypeValue;
use Joby\HTML\Html5\Tags\TagTestCase;

class ButtonTagTest extends TagTestCase
{

    // --- type ---

    public function testDefaultTypeIsSubmit(): void
    {
        $tag = new ButtonTag();
        $this->assertEquals(TypeValue::submit, $tag->type());
    }

    public function testSetType(): void
    {
        $tag = new ButtonTag();
        $tag->setType(TypeValue::button);
        $this->assertEquals(TypeValue::button, $tag->type());
    }

    public function testSetTypeAllValues(): void
    {
        $tag = new ButtonTag();
        foreach (TypeValue::cases() as $case) {
            $tag->setType($case);
            $this->assertEquals($case, $tag->type());
        }
    }

    // --- value ---

    public function testValue(): void
    {
        $tag = new ButtonTag();
        $this->assertNull($tag->value());
        $tag->setValue('confirm');
        $this->assertEquals('confirm', $tag->value());
        $tag->unsetValue();
        $this->assertNull($tag->value());
    }

    public function testValueNullUnsets(): void
    {
        $tag = new ButtonTag();
        $tag->setValue('confirm');
        $tag->setValue(null);
        $this->assertNull($tag->value());
    }

    // --- FormControlTrait ---

    public function testName(): void
    {
        $tag = new ButtonTag();
        $this->assertNull($tag->name());
        $tag->setName('my-button');
        $this->assertEquals('my-button', $tag->name());
        $tag->unsetName();
        $this->assertNull($tag->name());
    }

    public function testNameNullUnsets(): void
    {
        $tag = new ButtonTag();
        $tag->setName('my-button');
        $tag->setName(null);
        $this->assertNull($tag->name());
    }

    public function testDisabled(): void
    {
        $tag = new ButtonTag();
        $this->assertFalse($tag->disabled());
        $tag->setDisabled(true);
        $this->assertTrue($tag->disabled());
        $tag->setDisabled(false);
        $this->assertFalse($tag->disabled());
    }

    public function testForm(): void
    {
        $tag = new ButtonTag();
        $this->assertNull($tag->form());
        $tag->setForm('my-form');
        $this->assertEquals('my-form', $tag->form());
        $tag->unsetForm();
        $this->assertNull($tag->form());
    }

    public function testFormNullUnsets(): void
    {
        $tag = new ButtonTag();
        $tag->setForm('my-form');
        $tag->setForm(null);
        $this->assertNull($tag->form());
    }

    // --- FormOverridesTrait ---

    public function testFormaction(): void
    {
        $tag = new ButtonTag();
        $this->assertNull($tag->formaction());
        $tag->setFormaction('https://example.com/submit');
        $this->assertEquals('https://example.com/submit', $tag->formaction());
        $tag->unsetFormaction();
        $this->assertNull($tag->formaction());
    }

    public function testFormmethod(): void
    {
        $tag = new ButtonTag();
        $this->assertNull($tag->formmethod());
        $tag->setFormmethod('post');
        $this->assertEquals('post', $tag->formmethod());
        $tag->unsetFormmethod();
        $this->assertNull($tag->formmethod());
    }

    public function testFormenctype(): void
    {
        $tag = new ButtonTag();
        $this->assertNull($tag->formenctype());
        $tag->setFormenctype('multipart/form-data');
        $this->assertEquals('multipart/form-data', $tag->formenctype());
        $tag->unsetFormenctype();
        $this->assertNull($tag->formenctype());
    }

    public function testFormnovalidate(): void
    {
        $tag = new ButtonTag();
        $this->assertFalse($tag->formnovalidate());
        $tag->setFormnovalidate(true);
        $this->assertTrue($tag->formnovalidate());
        $tag->setFormnovalidate(false);
        $this->assertFalse($tag->formnovalidate());
    }

    public function testFormtargetBrowsingContext(): void
    {
        $tag = new ButtonTag();
        $this->assertNull($tag->formtarget());
        $tag->setFormtarget(BrowsingContext::blank);
        $this->assertEquals(BrowsingContext::blank, $tag->formtarget());
        $tag->unsetFormtarget();
        $this->assertNull($tag->formtarget());
    }

    public function testFormtargetCustomString(): void
    {
        $tag = new ButtonTag();
        $tag->setFormtarget('my-frame');
        $this->assertEquals('my-frame', $tag->formtarget());
    }

    public function testFormtargetNullUnsets(): void
    {
        $tag = new ButtonTag();
        $tag->setFormtarget(BrowsingContext::blank);
        $tag->setFormtarget(null);
        $this->assertNull($tag->formtarget());
    }

    // --- chaining ---

    public function testChaining(): void
    {
        $tag = new ButtonTag();
        $this->assertInstanceOf(ButtonTag::class, $tag->setType(TypeValue::button));
        $this->assertInstanceOf(ButtonTag::class, $tag->setValue('confirm'));
        $this->assertInstanceOf(ButtonTag::class, $tag->unsetValue());
        $this->assertInstanceOf(ButtonTag::class, $tag->setName('my-button'));
        $this->assertInstanceOf(ButtonTag::class, $tag->unsetName());
        $this->assertInstanceOf(ButtonTag::class, $tag->setDisabled(true));
        $this->assertInstanceOf(ButtonTag::class, $tag->setForm('my-form'));
        $this->assertInstanceOf(ButtonTag::class, $tag->unsetForm());
        $this->assertInstanceOf(ButtonTag::class, $tag->setFormaction('https://example.com/submit'));
        $this->assertInstanceOf(ButtonTag::class, $tag->unsetFormaction());
        $this->assertInstanceOf(ButtonTag::class, $tag->setFormmethod('post'));
        $this->assertInstanceOf(ButtonTag::class, $tag->unsetFormmethod());
        $this->assertInstanceOf(ButtonTag::class, $tag->setFormenctype('multipart/form-data'));
        $this->assertInstanceOf(ButtonTag::class, $tag->unsetFormenctype());
        $this->assertInstanceOf(ButtonTag::class, $tag->setFormnovalidate(true));
        $this->assertInstanceOf(ButtonTag::class, $tag->setFormtarget(BrowsingContext::blank));
        $this->assertInstanceOf(ButtonTag::class, $tag->unsetFormtarget());
    }

}
