<?php

namespace ByJoby\HTML\Html5\InlineTextSemantics\TimeTag;

use DateInterval;
use Stringable;

/**
 * Holds an interval/duration that will be stringed to something like PT4H18M3S
 */
class DatetimeValue_duration extends DatetimeValue
{
    /**
     * Matches a valid duration period designation
     */
    const REGEX_DURATION = "(<duration>P([0-9]+Y)?([0-9]+M)?([0-9]+[WD])?(T([0-9]+H)?([0-9]+M)?([0-9]+S)?)?)";

    public static function fromString(string|Stringable|null $string): null|self
    {
        // null string returns null
        if (is_null($string)) return null;
        // try to construct
        try {
            return new self(
                new DateInterval(strval($string))
            );
        } catch (\Throwable $th) {
            return null;
        }
    }

    public function __construct(protected DateInterval $interval)
    {
    }

    public function __toString()
    {
        // format with all fields
        $string = $this->interval->format('P%yY%mM%dDT%hH%iM%sS');
        // strip out fields that are zero
        /** @var string */
        $string = preg_replace('/0[YMDHMS]/', '', $string);
        // strip trailing T if necessary
        if (str_ends_with($string, 'T')) $string = substr($string, 0, strlen($string) - 1);
        // return cleaned up value
        return $string;
    }
}