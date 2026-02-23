<?php

namespace Joby\HTML\Html5\Forms;

use Joby\HTML\Html5\Tags\TagTestCase;

class ProgressTagTest extends TagTestCase
{

    // --- value ---

    public function testValueNullByDefault(): void
    {
        $tag = new ProgressTag();
        $this->assertNull($tag->value());
    }

    public function testValueIndeterminate(): void
    {
        // no value = indeterminate, which is a valid and useful state
        $tag = new ProgressTag();
        $tag->setValue(0.5);
        $tag->unsetValue();
        $this->assertNull($tag->value());
    }

    public function testValue(): void
    {
        $tag = new ProgressTag();
        $tag->setValue(0.5);
        $this->assertEquals(0.5, $tag->value());
    }

    public function testValueZeroIsValid(): void
    {
        $tag = new ProgressTag();
        $tag->setValue(0.0);
        $this->assertEquals(0.0, $tag->value());
    }

    public function testValueNullUnsets(): void
    {
        $tag = new ProgressTag();
        $tag->setValue(0.5);
        $tag->setValue(null);
        $this->assertNull($tag->value());
    }

    // --- max ---

    public function testMaxNullByDefault(): void
    {
        $tag = new ProgressTag();
        $this->assertNull($tag->max());
    }

    public function testMax(): void
    {
        $tag = new ProgressTag();
        $tag->setMax(100.0);
        $this->assertEquals(100.0, $tag->max());
        $tag->unsetMax();
        $this->assertNull($tag->max());
    }

    public function testMaxNullUnsets(): void
    {
        $tag = new ProgressTag();
        $tag->setMax(100.0);
        $tag->setMax(null);
        $this->assertNull($tag->max());
    }

    // --- chaining ---

    public function testChaining(): void
    {
        $tag = new ProgressTag();
        $this->assertInstanceOf(ProgressTag::class, $tag->setValue(0.5));
        $this->assertInstanceOf(ProgressTag::class, $tag->unsetValue());
        $this->assertInstanceOf(ProgressTag::class, $tag->setMax(100.0));
        $this->assertInstanceOf(ProgressTag::class, $tag->unsetMax());
    }

}
