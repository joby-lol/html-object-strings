<?php

namespace ByJoby\HTML\Html5\InlineTextSemantics\TimeTag;

use PHPUnit\Framework\TestCase;

class DatetimeValue_week_Test extends TestCase
{
    public function testFromValidStrings(): void
    {
        // example from mdn
        $this->assertEquals(
            "2011-W47",
            DatetimeValue_week::fromString("2011-W47")
                    ?->__toString()
        );
        // bottom of range
        $this->assertEquals(
            "0000-W01",
            DatetimeValue_week::fromString("0000-W01")
                    ?->__toString()
        );
        // top of range
        $this->assertEquals(
            "99999-W53",
            DatetimeValue_week::fromString("99999-W53")
                    ?->__toString()
        );
        // negative year
        $this->assertEquals(
            "-1500-06",
            DatetimeValue_week::fromString("-1500-06")
                    ?->__toString()
        );
    }

    public function testFromInvalidStrings(): void
    {
        // week too small
        $this->assertNull(
            DatetimeValue_week::fromString("0000-W00")
        );
        // week too big
        $this->assertNull(
            DatetimeValue_week::fromString("0000-W54")
        );
    }
}