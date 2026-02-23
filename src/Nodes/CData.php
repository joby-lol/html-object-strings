<?php

/**
 * HTML Object Strings
 * https://github.com/joby-lol/html-object-strings
 * (c) 2024-2026 Joby Elliott code@joby.lol
 * MIT License https://opensource.org/licenses/MIT
 */

namespace Joby\HTML\Nodes;

use Joby\HTML\Traits\NodeTrait;
use Stringable;

class CData implements CDataInterface
{
    use NodeTrait;

    public function __construct(protected Stringable|string $value)
    {
    }

    public function value(): string
    {
        return $this->value;
    }

    public function setValue(string|Stringable $value): static
    {
        $this->value = $value;
        return $this;
    }

    public function __toString(): string
    {
        return sprintf(
            '<![CDATA[%s]]>',
            str_replace(
                // ending sequence cannot be replaced
                ']]>',
                // we can split here and render as two cdata sections though -- messy, but the only option
                ']]]]><![CDATA[>',
                $this->value()
            )
        );
    }
}
