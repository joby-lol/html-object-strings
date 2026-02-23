<?php

/**
 * HTML Object Strings
 * https://github.com/joby-lol/html-object-strings
 * (c) 2024-2026 Joby Elliott code@joby.lol
 * MIT License https://opensource.org/licenses/MIT
 */

namespace Joby\HTML\Html5\Tags;

use Joby\HTML\Helpers\BooleanAttribute;
use Joby\HTML\Tags\AbstractContainerTag;

/**
 * The <dialog> HTML element represents a modal or non-modal dialog box or other interactive component, such as a dismissible alert, inspector, or subwindow.
 *
 * Tag description by Mozilla Contributors licensed under CC-BY-SA 2.5
 * https://developer.mozilla.org/en-US/docs/Web/HTML/Reference/Elements/dialog
 */
class DialogTag extends AbstractContainerTag
{

    const TAG = 'dialog';

    /**
     * Indicates that the dialog box is active and is available for interaction. If the open attribute is not set, the dialog box will not be visible to the user. It is recommended to use the open attribute to show the dialog rather than the CSS display property.
     *
     * @return boolean
     */
    public function open(): bool
    {
        return $this->attributes()['open'] === BooleanAttribute::true;
    }

    /**
     * Indicates that the dialog box is active and is available for interaction. If the open attribute is not set, the dialog box will not be visible to the user. It is recommended to use the open attribute to show the dialog rather than the CSS display property.
     *
     * @param boolean $open
     * @return static
     */
    public function setOpen(bool $open): static
    {
        if ($open)
            $this->attributes()['open'] = BooleanAttribute::true;
        else
            unset($this->attributes()['open']);
        return $this;
    }

}
