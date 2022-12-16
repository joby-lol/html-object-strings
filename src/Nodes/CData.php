<?php

namespace ByJoby\HTML\Nodes;

use ByJoby\HTML\Traits\NodeTrait;
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
