<?php

namespace ByJoby\HTML\Helpers;

use Stringable;

/**
 * Class for automatically serializing and unserializing text values (such as in
 * attributes) between a text representation that can be rendered and an object
 * representation that is easy to work with.
 *
 * Objects that implement this can be passed into an Attributes object and will
 * be stored as their object form and automatically converted into strings at
 * render time. Some tags will have specific requirements for particular
 * implementations of this interface for particular attribute getters/setters.
 */
interface StringableValue extends Stringable
{
    public static function fromString(string|Stringable|null $string): self|null;
}