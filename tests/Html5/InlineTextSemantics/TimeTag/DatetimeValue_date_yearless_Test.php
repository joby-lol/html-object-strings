<?php

namespace ByJoby\HTML\Html5\InlineTextSemantics\TimeTag;

use PHPUnit\Framework\TestCase;

class DatetimeValue_date_yearless_Test extends TestCase
{
    public function testFromValidStrings(): void
    {
        // example from mdn
        $this->assertEquals(
            "11-18",
            DatetimeValue_date_yearless::fromString("11-18")
                    ?->__toString()
        );
        // bottom of range
        $this->assertEquals(
            "01-01",
            DatetimeValue_date_yearless::fromString("1-1")
                    ?->__toString()
        );
        // top of range
        $this->assertEquals(
            "12-31",
            DatetimeValue_date_yearless::fromString("12-31")
                    ?->__toString()
        );
    }

    public function testFromInvalidStrings(): void
    {
        // below range
        $this->assertNull(
            DatetimeValue_date_yearless::fromString("0-1")
        );
        $this->assertNull(
            DatetimeValue_date_yearless::fromString("1-0")
        );
        $this->assertNull(
            DatetimeValue_date_yearless::fromString("00-00")
        );
        // above range
        $this->assertNull(
            DatetimeValue_date_yearless::fromString("13-02")
        );
        $this->assertNull(
            DatetimeValue_date_yearless::fromString("02-32")
        );
        $this->assertNull(
            DatetimeValue_date_yearless::fromString("13-32")
        );
    }
}