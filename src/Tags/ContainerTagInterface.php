<?php

/**
 * HTML Object Strings
 * https://github.com/joby-lol/html-object-strings
 * (c) 2024-2026 Joby Elliott code@joby.lol
 * MIT License https://opensource.org/licenses/MIT
 */

namespace Joby\HTML\Tags;

use Joby\HTML\ContainerInterface;

/**
 * Container Tags are HTML tags that are capable of holding a collection of
 * child tags. They can all have tags added and removed from them as well.
 * Container Tags always render as a full opening and closing tag, even when
 * they are empty.
 *
 * @package Joby\HTML\Tags
 */
interface ContainerTagInterface extends TagInterface, ContainerInterface
{
}
