<?php

/**
 * HTML Object Strings
 * https://github.com/joby-lol/html-object-strings
 * (c) 2024-2026 Joby Elliott code@joby.lol
 * MIT License https://opensource.org/licenses/MIT
 */

namespace Joby\HTML\Tags;

use Joby\HTML\Helpers\Attributes;
use Joby\HTML\Helpers\Classes;
use Joby\HTML\Helpers\Styles;
use Joby\HTML\NodeInterface;
use Stringable;

/**
 * Simple tags represent self-closing tags that cannot contain anything else
 * within them.
 *
 * @package Joby\HTML\Tags
 */
interface TagInterface extends NodeInterface
{
    public function tag(): string;
    public function id(): null|string;

    public function setID(null|string|Stringable $id): static;
    public function classes(): Classes;
    public function attributes(): Attributes;
    public function styles(): Styles;
}
