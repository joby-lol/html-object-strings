<?php

namespace ByJoby\HTML\Html5\InlineTextSemantics\TimeTag;

use PHPUnit\Framework\TestCase;

class DatetimeValue_month_Test extends TestCase
{
    public function testFromValidStrings(): void
    {
        // example from mdn
        $this->assertEquals(
            "2011-11",
            DatetimeValue_month::fromString("2011-11")
                    ?->__toString()
        );
        // bottom of range
        $this->assertEquals(
            "0000-01",
            DatetimeValue_month::fromString("0000-01")
                    ?->__toString()
        );
        // top of range
        $this->assertEquals(
            "99999-12",
            DatetimeValue_month::fromString("99999-12")
                    ?->__toString()
        );
        // negative year
        $this->assertEquals(
            "-1500-06",
            DatetimeValue_month::fromString("-1500-06")
                    ?->__toString()
        );
    }
}