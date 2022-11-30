<?php

namespace ByJoby\HTML\Traits;

trait ContainerTagTrait
{
    use ContainerTrait;

    public function __toString(): string
    {
        $openingTag = sprintf('<%s>', implode(' ', $this->openingTagStrings()));
        $closingTag = sprintf('</%s>', $this->tag());
        if (!$this->children()) return $openingTag . $closingTag;
        else return implode(
            PHP_EOL,
            [
                $openingTag,
                implode(PHP_EOL, $this->children()),
                $closingTag
            ]
        );
    }
}
