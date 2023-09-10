<?php

namespace ByJoby\HTML\Html5\InlineTextSemantics\TimeTag;

use PHPUnit\Framework\TestCase;

class DatetimeValue_year_Test extends TestCase
{
    public function testFromValidStrings(): void
    {
        // example from mdn
        $this->assertEquals(
            "2011",
            DatetimeValue_year::fromString("2011")
                    ?->__toString()
        );
        // bottom of range
        $this->assertEquals(
            "0000",
            DatetimeValue_year::fromString("0000")
                    ?->__toString()
        );
        // top of range
        $this->assertEquals(
            "99999",
            DatetimeValue_year::fromString("99999")
                    ?->__toString()
        );
        // negative year with only three digits
        $this->assertEquals(
            "-0150",
            DatetimeValue_year::fromString("-0150")
                    ?->__toString()
        );
    }

    public function testFromInvalidStrings(): void
    {
        // year is too short
        $this->assertNull(
            DatetimeValue_year::fromString("123")
        );
    }
}