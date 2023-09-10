<?php

namespace ByJoby\HTML\Html5\InlineTextSemantics\TimeTag;

use PHPUnit\Framework\TestCase;

class DatetimeValue_datetime_local_Test extends TestCase
{
    public function testFromValidStrings(): void
    {
        // example from mdn
        $this->assertEquals(
            "2011-11-18T14:54:39.929",
            DatetimeValue_datetime_local::fromString("2011-11-18T14:54:39.929")
                    ?->__toString()
        );
        // bottom of range (test zero year)
        $this->assertEquals(
            "0000-01-01T00:00:00.000",
            DatetimeValue_datetime_local::fromString("0000-01-01 00:00:00.000")
                    ?->__toString()
        );
        // top of range
        $this->assertEquals(
            "99999-12-31T23:59:59.999",
            DatetimeValue_datetime_local::fromString("99999-12-31T23:59:59.999")
                    ?->__toString()
        );
        // negative years (BCE)
        $this->assertEquals(
            "-1000-12-31T23:59:59.999",
            DatetimeValue_datetime_local::fromString("-1000-12-31T23:59:59.999")
                    ?->__toString()
        );
    }

    public function testFromInvalidStrings(): void
    {
        // too short microseconds
        $this->assertNull(
            DatetimeValue_datetime_local::fromString("1999-1-1T23:59:59.99")
        );
        // too short year
        $this->assertNull(
            DatetimeValue_datetime_local::fromString("999-1-1T23:59:59.999")
        );
        // below range
        $this->assertNull(
            DatetimeValue_datetime_local::fromString("1999-0-1T23:59:59.999")
        );
        $this->assertNull(
            DatetimeValue_datetime_local::fromString("1999-1-0T23:59:59.999")
        );
        $this->assertNull(
            DatetimeValue_datetime_local::fromString("1999-00-00T23:59:59.999")
        );
        // above range
        $this->assertNull(
            DatetimeValue_datetime_local::fromString("1999-13-02T23:59:59.999")
        );
        $this->assertNull(
            DatetimeValue_datetime_local::fromString("1999-02-32T23:59:59.999")
        );
        $this->assertNull(
            DatetimeValue_datetime_local::fromString("1999-13-32T23:59:59.999")
        );
    }
}