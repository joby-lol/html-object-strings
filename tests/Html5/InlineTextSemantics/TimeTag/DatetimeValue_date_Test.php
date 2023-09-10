<?php

namespace ByJoby\HTML\Html5\InlineTextSemantics\TimeTag;

use PHPUnit\Framework\TestCase;

class DatetimeValue_date_Test extends TestCase
{
    public function testFromValidStrings(): void
    {
        // example from mdn
        $this->assertEquals(
            "2011-11-18",
            DatetimeValue_date::fromString("2011-11-18")
                    ?->__toString()
        );
        // bottom of range (test zero year)
        $this->assertEquals(
            "0000-01-01",
            DatetimeValue_date::fromString("0000-1-1")
                    ?->__toString()
        );
        // top of range
        $this->assertEquals(
            "99999-12-31",
            DatetimeValue_date::fromString("99999-12-31")
                    ?->__toString()
        );
        // negative years (BCE)
        $this->assertEquals(
            "-1000-12-31",
            DatetimeValue_date::fromString("-1000-12-31")
                    ?->__toString()
        );
    }

    public function testFromInvalidStrings(): void
    {
        // too short year
        $this->assertNull(
            DatetimeValue_date::fromString("999-1-1")
        );
        // below range
        $this->assertNull(
            DatetimeValue_date::fromString("1999-0-1")
        );
        $this->assertNull(
            DatetimeValue_date::fromString("1999-1-0")
        );
        $this->assertNull(
            DatetimeValue_date::fromString("1999-00-00")
        );
        // above range
        $this->assertNull(
            DatetimeValue_date::fromString("1999-13-02")
        );
        $this->assertNull(
            DatetimeValue_date::fromString("1999-02-32")
        );
        $this->assertNull(
            DatetimeValue_date::fromString("1999-13-32")
        );
    }
}