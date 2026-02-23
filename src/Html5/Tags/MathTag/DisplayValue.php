<?php

/**
 * HTML Object Strings
 * https://github.com/joby-lol/html-object-strings
 * (c) 2024-2026 Joby Elliott code@joby.lol
 * MIT License https://opensource.org/licenses/MIT
 */

namespace Joby\HTML\Html5\Tags\MathTag;

/**
 * This enumerated attribute specifies how the enclosed MathML markup should be rendered. It can have one of the following values:
 * 
 * - block, which means that this element will be displayed in its own block outside the current span of text and with math-style set to normal.
 * - inline, which means that this element will be displayed inside the current span of text and with math-style set to compact.
 * 
 * Tag description by Mozilla Contributors licensed under CC-BY-SA 2.5
 * https://developer.mozilla.org/en-US/docs/Web/SVG/Reference/Attribute/preserveAspectRatio
 */
enum DisplayValue: string
{

    /**
     * this element will be displayed in its own block outside the current span of text and with math-style set to normal.
     */
    case block = "block";

    /**
     * this element will be displayed inside the current span of text and with math-style set to compact.
     */
    case inline = "inline";

}
