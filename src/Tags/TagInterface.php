<?php

namespace ByJoby\HTML\Tags;

use ByJoby\HTML\Helpers\Attributes;
use ByJoby\HTML\Helpers\Classes;
use ByJoby\HTML\Helpers\Styles;
use ByJoby\HTML\NodeInterface;
use Stringable;

/**
 * Simple tags represent self-closing tags that cannot contain anything else
 * within them.
 *
 * @package ByJoby\HTML\Tags
 */
interface TagInterface extends NodeInterface
{
    public function tag(): string;
    public function id(): null|string;
    public function setID(null|string|Stringable $id): self;
    public function classes(): Classes;
    public function attributes(): Attributes;
    public function styles(): Styles;
}
