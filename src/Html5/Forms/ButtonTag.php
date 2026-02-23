<?php

/**
 * HTML Object Strings
 * https://github.com/joby-lol/html-object-strings
 * (c) 2024-2026 Joby Elliott code@joby.lol
 * MIT License https://opensource.org/licenses/MIT
 */

namespace Joby\HTML\Html5\Forms;

use Joby\HTML\Html5\Forms\ButtonTag\TypeValue;
use Joby\HTML\Html5\Forms\Traits\FormControlTrait;
use Joby\HTML\Html5\Forms\Traits\FormOverridesTrait;
use Joby\HTML\Tags\AbstractContainerTag;
use Stringable;

/**
 * The <button> HTML element is an interactive element activated by a user with
 * a mouse, keyboard, finger, voice command, or other assistive technology.
 * Once activated, it then performs an action, such as submitting a form or
 * opening a dialog.
 *
 * Tag description by Mozilla Contributors licensed under CC-BY-SA 2.5
 * https://developer.mozilla.org/en-US/docs/Web/HTML/Reference/Elements/button
 */
class ButtonTag extends AbstractContainerTag
{

    use FormControlTrait;
    use FormOverridesTrait;

    const TAG = 'button';

    /**
     * The default behavior of the button. Possible values are submit (default), reset, and button.
     *
     * @return TypeValue
     */
    public function type(): TypeValue
    {
        return $this->attributes()->asEnum('type', TypeValue::class)
            ?? TypeValue::submit;
    }

    /**
     * The default behavior of the button. Possible values are submit (default), reset, and button.
     *
     * @param TypeValue $type
     * @return static
     */
    public function setType(TypeValue $type): static
    {
        $this->attributes()['type'] = $type->value;
        return $this;
    }

    /**
     * Defines the value associated with the button's name when it is submitted with the form data. This value is passed to the server in params when the form is submitted using this button.
     * 
     * @return null|string|Stringable
     */
    public function value(): null|string|Stringable
    {
        return $this->attributes()->asString('value');
    }

    /**
     * Defines the value associated with the button's name when it is submitted with the form data. This value is passed to the server in params when the form is submitted using this button.
     *
     * @param null|string|Stringable $value
     * @return static
     */
    public function setValue(null|string|Stringable $value): static
    {
        if ($value)
            $this->attributes()['value'] = $value;
        else
            $this->unsetValue();
        return $this;
    }

    /**
     * Defines the value associated with the button's name when it is submitted with the form data. This value is passed to the server in params when the form is submitted using this button.
     *
     * @return static
     */
    public function unsetValue(): static
    {
        unset($this->attributes()['value']);
        return $this;
    }

}
