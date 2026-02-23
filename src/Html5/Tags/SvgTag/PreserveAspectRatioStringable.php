<?php

/**
 * HTML Object Strings
 * https://github.com/joby-lol/html-object-strings
 * (c) 2024-2026 Joby Elliott code@joby.lol
 * MIT License https://opensource.org/licenses/MIT
 */

namespace Joby\HTML\Html5\Tags\SvgTag;

use Stringable;

/**
 * The preserveAspectRatio attribute indicates how an element with a viewBox providing a given aspect ratio must fit into a viewport with a different aspect ratio.
 * 
 * The aspect ratio of an SVG image is defined by the viewBox attribute. Therefore, if viewBox isn't set, the preserveAspectRatio attribute has no effect on SVG's scaling (except in the case of the <image> element, where preserveAspectRatio behaves differently as described below).
 * 
 * The preserveAspectRatio attribute value consists of up to two keywords: a required alignment value and an optional meet or slice keyword.
 * 
 * The alignment value indicates whether to force uniform scaling and, if so, the alignment method to use in case the aspect ratio of the viewBox doesn't match the aspect ratio of the viewport. xMidYMid is the default value. The alignment value must be one of the following keyword values:
 * 
 * Tag description by Mozilla Contributors licensed under CC-BY-SA 2.5
 * https://developer.mozilla.org/en-US/docs/Web/SVG/Reference/Attribute/preserveAspectRatio
 */
class PreserveAspectRatioStringable implements Stringable
{

    public function __construct(
        public readonly PreserveAspectRatioValue $value,
        public readonly bool $slice,
    ) {}

    public function __toString(): string
    {
        $string = $this->value->value;
        if ($this->slice)
            $string .= ' slice';
        return $string;
    }

}
