<?php

/**
 * HTML Object Strings
 * https://github.com/joby-lol/html-object-strings
 * (c) 2024-2026 Joby Elliott code@joby.lol
 * MIT License https://opensource.org/licenses/MIT
 */

namespace Joby\HTML\Html5\Forms;

use Joby\HTML\Helpers\BooleanAttribute;
use Joby\HTML\Tags\AbstractContainerTag;
use Stringable;

/**
 * The <optgroup> HTML element creates a grouping of options within a <select> element.
 *
 * Tag description by Mozilla Contributors licensed under CC-BY-SA 2.5
 * https://developer.mozilla.org/en-US/docs/Web/HTML/Reference/Elements/optgroup
 */
class OptgroupTag extends AbstractContainerTag
{

    const TAG = 'optgroup';

    /**
     * The name of the group of options, which the browser can use when labeling the options in the user interface. This attribute is mandatory if this element is used.
     *
     * @return null|string|Stringable
     */
    public function label(): null|string|Stringable
    {
        return $this->attributes()->asString('label');
    }

    /**
     * The name of the group of options, which the browser can use when labeling the options in the user interface. This attribute is mandatory if this element is used.
     *
     * @param null|string|Stringable $label
     * @return static
     */
    public function setLabel(null|string|Stringable $label): static
    {
        if ($label)
            $this->attributes()['label'] = $label;
        else
            $this->unsetLabel();
        return $this;
    }

    /**
     * The name of the group of options, which the browser can use when labeling the options in the user interface. This attribute is mandatory if this element is used.
     *
     * @return static
     */
    public function unsetLabel(): static
    {
        unset($this->attributes()['label']);
        return $this;
    }

    /**
     * If this boolean attribute is set, none of the items in this option group is selectable. Often browsers grey out such control and it won't receive any browsing event, like mouse clicks or focus-related ones.
     *
     * @return boolean
     */
    public function disabled(): bool
    {
        return $this->attributes()['disabled'] === BooleanAttribute::true;
    }

    /**
     * If this boolean attribute is set, none of the items in this option group is selectable. Often browsers grey out such control and it won't receive any browsing event, like mouse clicks or focus-related ones.
     *
     * @param boolean $disabled
     * @return static
     */
    public function setDisabled(bool $disabled): static
    {
        if ($disabled)
            $this->attributes()['disabled'] = BooleanAttribute::true;
        else
            unset($this->attributes()['disabled']);
        return $this;
    }

}
