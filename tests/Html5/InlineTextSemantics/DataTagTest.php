<?php

namespace Joby\HTML\Html5\InlineTextSemantics;

use Joby\HTML\Html5\Tags\TagTestCase;

class DataTagTest extends TagTestCase
{

    public function testAttributeHelpers(): void
    {
        $this->assertAttributeHelperMethods('value', DataTag::class);
    }

    public function testValueBasic(): void
    {
        $tag = new DataTag();
        // null by default
        $this->assertNull($tag->value());
        // set and retrieve
        $tag->setValue('42');
        $this->assertEquals('42', $tag->value());
        $this->assertEquals('42', $tag->attributes()->asString('value'));
        // unset
        $tag->unsetValue();
        $this->assertNull($tag->value());
    }

    public function testValueNullUnsets(): void
    {
        $tag = new DataTag();
        $tag->setValue('42');
        $tag->setValue(null);
        $this->assertNull($tag->value());
    }

    public function testValueChaining(): void
    {
        $tag = new DataTag();
        $this->assertInstanceOf(DataTag::class, $tag->setValue('42'));
        $this->assertInstanceOf(DataTag::class, $tag->unsetValue());
    }

}
