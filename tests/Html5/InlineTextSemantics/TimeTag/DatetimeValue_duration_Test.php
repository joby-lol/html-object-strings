<?php

namespace ByJoby\HTML\Html5\InlineTextSemantics\TimeTag;

use PHPUnit\Framework\TestCase;

/**
 * Honestly this one doesn't need a lot of testing, because it just uses PHP's
 * DateInterval built-in parsing
 */
class DatetimeValue_duration_Test extends TestCase
{
    public function testFromValidStrings(): void
    {
        // example from mdn
        $this->assertEquals(
            "PT4H18M3S",
            DatetimeValue_duration::fromString("PT4H18M3S")
                    ?->__toString()
        );
        // bottom of range
        $this->assertEquals(
            "PT1S",
            DatetimeValue_duration::fromString("PT1S")
                    ?->__toString()
        );
        // all values
        $this->assertEquals(
            "P99Y99M99DT99H99M99S",
            DatetimeValue_duration::fromString("P99Y99M99DT99H99M99S")
                    ?->__toString()
        );
    }
}