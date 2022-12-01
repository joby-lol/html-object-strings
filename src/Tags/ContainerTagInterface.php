<?php

namespace ByJoby\HTML\Tags;

use ByJoby\HTML\ContainerMutableInterface;

/**
 * Container Tags are HTML tags that are capable of holding a collection of
 * child tags. They can all have tags added and removed from them as well.
 * Container Tags always render as a full opening and closing tag, even when
 * they are empty.
 * 
 * @package ByJoby\HTML\Tags
 */
interface ContainerTagInterface extends TagInterface, ContainerMutableInterface
{
}
