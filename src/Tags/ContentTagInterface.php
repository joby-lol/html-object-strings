<?php

namespace ByJoby\HTML\Tags;

use Stringable;

/**
 * Content Tags contain a single string or Stringable, which may or may not be
 * valid HTML. They render as full opening/closing HTML tags which wrap the
 * content stored in the tag.
 * 
 * @package ByJoby\HTML\Tags
 */
interface ContentTagInterface extends TagInterface
{
    public function content(): string|Stringable;
    public function setContent(string|Stringable $content): static;
}
