<?php

namespace Joby\HTML\Html5\InlineTextSemantics;

use Joby\HTML\Html5\InlineTextSemantics\TimeTag\DatetimeValue;
use Joby\HTML\Html5\Tags\TagTestCase;

class TimeTagTest extends TagTestCase
{

    public function testDatetimeBasic(): void
    {
        $tag = new TimeTag();
        // null by default
        $this->assertNull($tag->datetime());
        // set and retrieve
        $value = DatetimeValue::fromString('2011-11-18T14:54:39Z');
        $tag->setDatetime($value);
        $this->assertInstanceOf(DatetimeValue::class, $tag->datetime());
        // unset
        $tag->unsetDatetime();
        $this->assertNull($tag->datetime());
    }

    public function testDatetimeNullUnsets(): void
    {
        $tag = new TimeTag();
        $tag->setDatetime(DatetimeValue::fromString('2011-11-18T14:54:39Z'));
        $tag->setDatetime(null);
        $this->assertNull($tag->datetime());
    }

    public function testDatetimeChaining(): void
    {
        $tag = new TimeTag();
        $value = DatetimeValue::fromString('2011-11-18T14:54:39Z');
        $this->assertInstanceOf(TimeTag::class, $tag->setDatetime($value));
        $this->assertInstanceOf(TimeTag::class, $tag->unsetDatetime());
    }

}
