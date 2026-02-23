<?php

/**
 * HTML Object Strings
 * https://github.com/joby-lol/html-object-strings
 * (c) 2024-2026 Joby Elliott code@joby.lol
 * MIT License https://opensource.org/licenses/MIT
 */

namespace Joby\HTML\Html5\Forms\Traits;

use Joby\HTML\Helpers\BooleanAttribute;
use Stringable;

/**
 * Provides the name, disabled, and form attributes common to all form control
 * elements, including <input>, <button>, <select>, <textarea>, and <fieldset>.
 */
trait FormControlTrait
{

    /**
     * The name of the control, which is submitted with the form data. A control
     * with no name, or an empty name, will not be submitted.
     *
     * @return null|string|Stringable
     */
    public function name(): null|string|Stringable
    {
        return $this->attributes()->asString('name');
    }

    /**
     * The name of the control, which is submitted with the form data. A control
     * with no name, or an empty name, will not be submitted.
     *
     * @param null|string|Stringable $name
     * @return static
     */
    public function setName(null|string|Stringable $name): static
    {
        if ($name)
            $this->attributes()['name'] = $name;
        else
            $this->unsetName();
        return $this;
    }

    /**
     * The name of the control, which is submitted with the form data. A control
     * with no name, or an empty name, will not be submitted.
     *
     * @return static
     */
    public function unsetName(): static
    {
        unset($this->attributes()['name']);
        return $this;
    }

    /**
     * Whether this control is disabled. Disabled controls are not submitted
     * with the form and do not receive click events.
     *
     * @return boolean
     */
    public function disabled(): bool
    {
        return isset($this->attributes()['disabled'])
            && $this->attributes()['disabled'] !== BooleanAttribute::false;
    }

    /**
     * Whether this control is disabled. Disabled controls are not submitted
     * with the form and do not receive click events.
     *
     * @param boolean $disabled
     * @return static
     */
    public function setDisabled(bool $disabled): static
    {
        if ($disabled)
            $this->attributes()['disabled'] = BooleanAttribute::true;
        else
            $this->attributes()['disabled'] = BooleanAttribute::false;
        return $this;
    }

    /**
     * The id of the <form> element this control is associated with. If omitted,
     * the control is associated with its nearest ancestor <form> element.
     * This attribute allows controls to be placed anywhere in the document
     * while still being associated with a form elsewhere.
     *
     * @return null|string|Stringable
     */
    public function form(): null|string|Stringable
    {
        return $this->attributes()->asString('form');
    }

    /**
     * The id of the <form> element this control is associated with. If omitted,
     * the control is associated with its nearest ancestor <form> element.
     * This attribute allows controls to be placed anywhere in the document
     * while still being associated with a form elsewhere.
     *
     * @param null|string|Stringable $form
     * @return static
     */
    public function setForm(null|string|Stringable $form): static
    {
        if ($form)
            $this->attributes()['form'] = $form;
        else
            $this->unsetForm();
        return $this;
    }

    /**
     * The id of the <form> element this control is associated with. If omitted,
     * the control is associated with its nearest ancestor <form> element.
     * This attribute allows controls to be placed anywhere in the document
     * while still being associated with a form elsewhere.
     *
     * @return static
     */
    public function unsetForm(): static
    {
        unset($this->attributes()['form']);
        return $this;
    }

}
