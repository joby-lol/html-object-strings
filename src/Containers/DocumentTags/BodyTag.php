<?php

namespace ByJoby\HTML\Containers\DocumentTags;

use ByJoby\HTML\Tags\AbstractContainerTag;

class BodyTag extends AbstractContainerTag implements BodyTagInterface
{
    public function tag(): string
    {
        return 'body';
    }
}
