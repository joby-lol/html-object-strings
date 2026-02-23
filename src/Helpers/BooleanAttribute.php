<?php

/**
 * HTML Object Strings
 * https://github.com/joby-lol/html-object-strings
 * (c) 2024-2026 Joby Elliott code@joby.lol
 * MIT License https://opensource.org/licenses/MIT
 */

namespace Joby\HTML\Helpers;

/**
 * This special enum is used to specify that an attribute is an HTML5 boolean
 * value. Any attribute set to BooleanAttribute::true will render as a lone tag,
 * with no value like <tag attribute>. Any attribute set to
 * BooleanAttribute::false will not render.
 */
enum BooleanAttribute {
    /** Render an attribute with no value */
    case true;
    /** Do not render this attribute */
    case false;
}