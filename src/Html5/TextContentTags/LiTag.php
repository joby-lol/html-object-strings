<?php

namespace ByJoby\HTML\Html5\TextContentTags;

use ByJoby\HTML\Html5\Enums\ListTypeValue;
use ByJoby\HTML\Tags\AbstractContainerTag;

/**
 * The <li> HTML element is used to represent an item in a list. It must be
 * contained in a parent element: an ordered list (<ol>), an unordered list
 * (<ul>), or a menu (<menu>). In menus and unordered lists, list items are
 * usually displayed using bullet points. In ordered lists, they are usually
 * displayed with an ascending counter on the left, such as a number or letter.
 *
 * Tag description by Mozilla Contributors licensed under CC-BY-SA 2.5
 * https://developer.mozilla.org/en-US/docs/Web/HTML/Element/li
 */
class LiTag extends AbstractContainerTag
{
    const TAG = 'li';

    /**
     * Gets the numbering type to be used if placed in an <OL> tag.
     *
     * @return null|ListTypeValue
     */
    public function type(): null|ListTypeValue
    {
        return $this->attributes()->asEnum('type', ListTypeValue::class);
    }

    /**
     * Sets the numbering type to be used if placed in an <OL> tag.
     *
     * @param null|ListTypeValue $type
     * @return static
     */
    public function setType(null|ListTypeValue $type): self
    {
        if ($type) $this->attributes()['type'] = $type->value;
        else $this->unsetType();
        return $this;
    }

    /**
     * Unsets the numbering type to be used if placed in an <OL> tag.
     *
     * @return static
     */
    public function unsetType(): self
    {
        unset($this->attributes()['type']);
        return $this;
    }
}