<?php

namespace ByJoby\HTML\Html5\InlineTextSemantics\TimeTag;

use PHPUnit\Framework\TestCase;

class DatetimeValue_time_Test extends TestCase
{
    public function testFromValidStrings(): void
    {
        // examples from mdn
        $this->assertEquals(
            "14:54:00.000",
            DatetimeValue_time::fromString("14:54")
                    ?->__toString()
        );
        $this->assertEquals(
            "14:54:39.000",
            DatetimeValue_time::fromString("14:54:39")
                    ?->__toString()
        );
        $this->assertEquals(
            "14:54:39.929",
            DatetimeValue_time::fromString("14:54:39.929")
                    ?->__toString()
        );
        // bottom of range
        $this->assertEquals(
            "00:00:00.000",
            DatetimeValue_time::fromString("00:00:00.000")
                    ?->__toString()
        );
        // top of range
        $this->assertEquals(
            "23:59:59.999",
            DatetimeValue_time::fromString("23:59:59.999")
                    ?->__toString()
        );
    }

    public function testFromInvalidStrings(): void
    {
        // hour too big
        $this->assertNull(
            DatetimeValue_time::fromString("24:00:00.000")
        );
        // minute too big
        $this->assertNull(
            DatetimeValue_time::fromString("00:60:00.000")
        );
        // second too big
        $this->assertNull(
            DatetimeValue_time::fromString("00:00:60.000")
        );
    }
}