<?php

/**
 * HTML Object Strings
 * https://github.com/joby-lol/html-object-strings
 * (c) 2024-2026 Joby Elliott code@joby.lol
 * MIT License https://opensource.org/licenses/MIT
 */

namespace Joby\HTML\Tags;

use Stringable;

/**
 * Content Tags contain a single string or Stringable, which may or may not be
 * valid HTML. They render as full opening/closing HTML tags which wrap the
 * content stored in the tag.
 *
 * @package Joby\HTML\Tags
 */
interface ContentTagInterface extends TagInterface
{
    public function content(): string|Stringable;
    public function setContent(string|Stringable $content): self;
}
