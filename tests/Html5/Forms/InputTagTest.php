<?php

namespace Joby\HTML\Html5\Forms;

use Joby\HTML\Html5\Forms\InputTag\TypeValue;
use Joby\HTML\Html5\Tags\TagTestCase;

class InputTagTest extends TagTestCase
{

    // --- constructor ---

    public function testDefaultTypeIsText(): void
    {
        $tag = new InputTag();
        $this->assertEquals(TypeValue::text, $tag->type());
    }

    public function testConstructorSetsType(): void
    {
        $tag = new InputTag(TypeValue::email);
        $this->assertEquals(TypeValue::email, $tag->type());
    }

    // --- type ---

    public function testSetType(): void
    {
        $tag = new InputTag();
        $tag->setType(TypeValue::checkbox);
        $this->assertEquals(TypeValue::checkbox, $tag->type());
    }

    public function testSetTypeAllValues(): void
    {
        $tag = new InputTag();
        foreach (TypeValue::cases() as $case) {
            $tag->setType($case);
            $this->assertEquals($case, $tag->type());
        }
    }

    // --- name ---

    public function testName(): void
    {
        $tag = new InputTag();
        $this->assertNull($tag->name());
        $tag->setName('username');
        $this->assertEquals('username', $tag->name());
        $tag->unsetName();
        $this->assertNull($tag->name());
    }

    public function testNameNullUnsets(): void
    {
        $tag = new InputTag();
        $tag->setName('username');
        $tag->setName(null);
        $this->assertNull($tag->name());
    }

    // --- disabled ---

    public function testDisabled(): void
    {
        $tag = new InputTag();
        $this->assertFalse($tag->disabled());
        $tag->setDisabled(true);
        $this->assertTrue($tag->disabled());
        $tag->setDisabled(false);
        $this->assertFalse($tag->disabled());
    }

    // --- form ---

    public function testForm(): void
    {
        $tag = new InputTag();
        $this->assertNull($tag->form());
        $tag->setForm('my-form');
        $this->assertEquals('my-form', $tag->form());
        $tag->unsetForm();
        $this->assertNull($tag->form());
    }

    public function testFormNullUnsets(): void
    {
        $tag = new InputTag();
        $tag->setForm('my-form');
        $tag->setForm(null);
        $this->assertNull($tag->form());
    }

    // --- chaining ---

    public function testChaining(): void
    {
        $tag = new InputTag();
        $this->assertInstanceOf(InputTag::class, $tag->setType(TypeValue::email));
        $this->assertInstanceOf(InputTag::class, $tag->setName('username'));
        $this->assertInstanceOf(InputTag::class, $tag->unsetName());
        $this->assertInstanceOf(InputTag::class, $tag->setDisabled(true));
        $this->assertInstanceOf(InputTag::class, $tag->setForm('my-form'));
        $this->assertInstanceOf(InputTag::class, $tag->unsetForm());
    }

    public function testValueAttribute(): void
    {
        $tag = new InputTag();
        $this->assertNull($tag->value());
        $tag->setValue('hello');
        $this->assertEquals('hello', $tag->value());
        $tag->unsetValue();
        $this->assertNull($tag->value());
    }

    public function testValueNullUnsets(): void
    {
        $tag = new InputTag();
        $tag->setValue('hello');
        $tag->setValue(null);
        $this->assertNull($tag->value());
    }

}
