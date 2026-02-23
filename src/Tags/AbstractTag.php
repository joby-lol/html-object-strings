<?php

/**
 * HTML Object Strings
 * https://github.com/joby-lol/html-object-strings
 * (c) 2024-2026 Joby Elliott code@joby.lol
 * MIT License https://opensource.org/licenses/MIT
 */

namespace Joby\HTML\Tags;

use Joby\HTML\Traits\TagTrait;
use Joby\HTML\Traits\NodeTrait;

abstract class AbstractTag implements TagInterface
{
    use NodeTrait;
    use TagTrait;

    public function tag(): string
    {
        return static::TAG; // @phpstan-ignore-line
    }
}
