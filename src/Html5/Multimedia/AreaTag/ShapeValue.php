<?php

/**
 * HTML Object Strings
 * https://github.com/joby-lol/html-object-strings
 * (c) 2024-2026 Joby Elliott code@joby.lol
 * MIT License https://opensource.org/licenses/MIT
 */

namespace Joby\HTML\Html5\Multimedia\AreaTag;

enum ShapeValue: string
{
    /**
     * indicates the entire region beyond any defined shapes
     */
    case default = "default";
    case rectangle = "rect";
    case circle = "circle";
    case polygon = "poly";
}