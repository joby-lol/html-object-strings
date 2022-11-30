<?php

namespace ByJoby\HTML\Tags;

use ByJoby\HTML\Helpers\Attributes;
use ByJoby\HTML\Helpers\Classes;
use ByJoby\HTML\Traits\TagTrait;
use ByJoby\HTML\Traits\NodeTrait;

abstract class AbstractTag implements TagInterface
{
    use NodeTrait, TagTrait;
}
