<?php

namespace ByJoby\HTML\Tags;

use ByJoby\HTML\Traits\ContainerTrait;
use ByJoby\HTML\Traits\TagTrait;
use ByJoby\HTML\Traits\NodeTrait;

abstract class AbstractContainerTag extends AbstractTag implements ContainerTagInterface
{
    use NodeTrait;
    use TagTrait;
    use ContainerTrait;

    public function __toString(): string
    {
        $openingTag = sprintf('<%s>', implode(' ', $this->openingTagStrings()));
        $closingTag = sprintf('</%s>', $this->tag());
        if (!$this->children()) {
            return $openingTag . $closingTag;
        } else {
            return implode(
                PHP_EOL,
                [
                $openingTag,
                implode(PHP_EOL, $this->children()),
                $closingTag
                ]
            );
        }
    }
}
