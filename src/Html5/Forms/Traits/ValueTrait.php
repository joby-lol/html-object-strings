<?php

/**
 * HTML Object Strings
 * https://github.com/joby-lol/html-object-strings
 * (c) 2024-2026 Joby Elliott code@joby.lol
 * MIT License https://opensource.org/licenses/MIT
 */

namespace Joby\HTML\Html5\Forms\Traits;

use Stringable;

/**
 * Provides the value attribute common to many form-related elements, including
 * <button>, <input>, and <option>.
 */
trait ValueTrait
{

    /**
     * Defines the value associated with the element. For form controls, this is the value submitted with the form data when the control is used to submit the form.
     *
     * @return null|string|Stringable
     */
    public function value(): null|string|Stringable
    {
        return $this->attributes()->asString('value');
    }

    /**
     * Defines the value associated with the element. For form controls, this is the value submitted with the form data when the control is used to submit the form.
     *
     * @param null|string|Stringable $value
     * @return static
     */
    public function setValue(null|string|Stringable $value): static
    {
        if ($value !== null && $value !== '')
            $this->attributes()['value'] = $value;
        else
            $this->unsetValue();
        return $this;
    }

    /**
     * Defines the value associated with the element. For form controls, thisis the value submitted with the form data when the control is used to submit the form.
     *
     * @return static
     */
    public function unsetValue(): static
    {
        unset($this->attributes()['value']);
        return $this;
    }

}
