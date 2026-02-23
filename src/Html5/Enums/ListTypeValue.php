<?php

/**
 * HTML Object Strings
 * https://github.com/joby-lol/html-object-strings
 * (c) 2024-2026 Joby Elliott code@joby.lol
 * MIT License https://opensource.org/licenses/MIT
 */

namespace Joby\HTML\Html5\Enums;

enum ListTypeValue: string {
    case letterLower = 'a';
    case letterUpper = 'A';
    case romanLower = 'i';
    case romanUpper = 'I';
    case number = '1';
}