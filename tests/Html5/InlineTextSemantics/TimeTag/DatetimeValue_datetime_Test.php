<?php

namespace ByJoby\HTML\Html5\InlineTextSemantics\TimeTag;

use PHPUnit\Framework\TestCase;

class DatetimeValue_datetime_Test extends TestCase
{
    public function testFromValidStrings(): void
    {
        // example from mdn
        $this->assertEquals(
            "2011-11-18T14:54:39+00:00",
            DatetimeValue_datetime::fromString("2011-11-18T14:54:39Z")
                    ?->__toString()
        );
        // bottom of range
        $this->assertEquals(
            "0000-01-01T00:00:00-23:59",
            DatetimeValue_datetime::fromString("0000-01-01 00:00:00-23:59")
                    ?->__toString()
        );
        // top of range
        $this->assertEquals(
            "99999-12-31T23:59:59+23:59",
            DatetimeValue_datetime::fromString("99999-12-31T23:59:59+23:59")
                    ?->__toString()
        );
        // negative years (BCE)
        $this->assertEquals(
            "-1000-12-31T23:59:59+00:00",
            DatetimeValue_datetime::fromString("-1000-12-31T23:59:59+0000")
                    ?->__toString()
        );
    }
}