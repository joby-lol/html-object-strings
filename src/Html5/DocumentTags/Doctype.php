<?php

namespace ByJoby\HTML\Html5\DocumentTags;

use ByJoby\HTML\Containers\DocumentTags\DoctypeInterface;
use ByJoby\HTML\Traits\NodeTrait;

class Doctype implements DoctypeInterface
{
    use NodeTrait;

    public function __toString(): string
    {
        return '<!DOCTYPE html>';
    }
}
