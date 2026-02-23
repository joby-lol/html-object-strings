<?php

/**
 * HTML Object Strings
 * https://github.com/joby-lol/html-object-strings
 * (c) 2024-2026 Joby Elliott code@joby.lol
 * MIT License https://opensource.org/licenses/MIT
 */

namespace Joby\HTML\Html5\Forms;

use Joby\HTML\Tags\AbstractContainerTag;
use Stringable;

/**
 * The <label> HTML element represents a caption for an item in a user interface.
 *
 * Tag description by Mozilla Contributors licensed under CC-BY-SA 2.5
 * https://developer.mozilla.org/en-US/docs/Web/HTML/Reference/Elements/label
 */
class LabelTag extends AbstractContainerTag
{

    const TAG = 'label';

    /**
     * The value of the for attribute must be a single id for a labelable form-related element in the same document as the <label> element. So, any given label element can be associated with only one form control.
     *
     * @return null|string|Stringable
     */
    public function for(): null|string|Stringable
    {
        return $this->attributes()->asString('for');
    }

    /**
     * The value of the for attribute must be a single id for a labelable form-related element in the same document as the <label> element. So, any given label element can be associated with only one form control.
     *
     * @param null|string|Stringable $for
     * @return static
     */
    public function setFor(null|string|Stringable $for): static
    {
        if ($for)
            $this->attributes()['for'] = $for;
        else
            $this->unsetFor();
        return $this;
    }

    /**
     * The value of the for attribute must be a single id for a labelable form-related element in the same document as the <label> element. So, any given label element can be associated with only one form control.
     *
     * @return static
     */
    public function unsetFor(): static
    {
        unset($this->attributes()['for']);
        return $this;
    }

}
