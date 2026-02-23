<?php

/**
 * HTML Object Strings
 * https://github.com/joby-lol/html-object-strings
 * (c) 2024-2026 Joby Elliott code@joby.lol
 * MIT License https://opensource.org/licenses/MIT
 */

namespace Joby\HTML\Html5\Forms;

use Joby\HTML\Helpers\BooleanAttribute;
use Joby\HTML\Html5\Forms\Traits\ValueTrait;
use Joby\HTML\Tags\AbstractContainerTag;
use Stringable;

/**
 * The <option> HTML element is used to define an item contained in a <select>, an <optgroup>, or a <datalist> element. As such, <option> can represent menu items in popups and other lists of items in an HTML document.
 *
 * Tag description by Mozilla Contributors licensed under CC-BY-SA 2.5
 * https://developer.mozilla.org/en-US/docs/Web/HTML/Reference/Elements/option
 */
class OptionTag extends AbstractContainerTag
{

    use ValueTrait;

    const TAG = 'option';

    /**
     * If present, this boolean attribute indicates that the option is initially selected. If the <option> element is the descendant of a <select> element whose multiple attribute is not set, only one <option> element of this <select> element may have the selected attribute.
     *
     * @return boolean
     */
    public function selected(): bool
    {
        return $this->attributes()['selected'] === BooleanAttribute::true;
    }

    /**
     * If present, this boolean attribute indicates that the option is initially selected. If the <option> element is the descendant of a <select> element whose multiple attribute is not set, only one <option> element of this <select> element may have the selected attribute.
     *
     * @param boolean $selected
     * @return static
     */
    public function setSelected(bool $selected): static
    {
        if ($selected)
            $this->attributes()['selected'] = BooleanAttribute::true;
        else
            unset($this->attributes()['selected']);
        return $this;
    }

    /**
     * This boolean attribute indicates that the option is not checkable. Often browsers grey out such control and it won't receive any browsing event, like mouse clicks or focus-related ones.
     *
     * @return boolean
     */
    public function disabled(): bool
    {
        return $this->attributes()['disabled'] === BooleanAttribute::true;
    }

    /**
     * This boolean attribute indicates that the option is not checkable. Often browsers grey out such control and it won't receive any browsing event, like mouse clicks or focus-related ones.
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

    /**
     * This attribute is text for the label indicating the meaning of the option. If the label attribute isn't defined, its value is that of the element text content.
     *
     * @return null|string|Stringable
     */
    public function label(): null|string|Stringable
    {
        return $this->attributes()->asString('label');
    }

    /**
     * This attribute is text for the label indicating the meaning of the option. If the label attribute isn't defined, its value is that of the element text content.
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
     * This attribute is text for the label indicating the meaning of the option. If the label attribute isn't defined, its value is that of the element text content.
     *
     * @return static
     */
    public function unsetLabel(): static
    {
        unset($this->attributes()['label']);
        return $this;
    }

}
