<?php

namespace ByJoby\HTML\Tags;

use ByJoby\HTML\Traits\TagTrait;
use ByJoby\HTML\Traits\NodeTrait;

abstract class AbstractTag implements TagInterface
{
    use NodeTrait;
    use TagTrait;

    public function tag(): string
    {
        return static::TAG; //@phpstan-ignore-line
    }
}
