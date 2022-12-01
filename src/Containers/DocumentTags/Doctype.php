<?php

namespace ByJoby\HTML\Containers\DocumentTags;

use ByJoby\HTML\Traits\NodeTrait;

class Doctype implements DoctypeInterface
{
    use NodeTrait;

    public function __toString(): string
    {
        return '<!DOCTYPE html>';
    }
}
