<?php

/**
 * HTML Object Strings
 * https://github.com/joby-lol/html-object-strings
 * (c) 2024-2026 Joby Elliott code@joby.lol
 * MIT License https://opensource.org/licenses/MIT
 */

namespace Joby\HTML\Html5\Forms\Traits;

use Joby\HTML\Helpers\BooleanAttribute;
use Joby\HTML\Html5\Enums\BrowsingContext;
use Stringable;

/**
 * Provides the form override attributes (formaction, formmethod, formenctype, formnovalidate, formtarget) that allow <button> and submit/image <input> elements to override their associated <form> element's submission behavior.
 */
trait FormOverridesTrait
{

    /**
     * Overrides the form's action attribute. The URL that processes the form submission when this control is used to submit the form.
     *
     * @return null|string|Stringable
     */
    public function formaction(): null|string|Stringable
    {
        return $this->attributes()->asString('formaction');
    }

    /**
     * Overrides the form's action attribute. The URL that processes the form submission when this control is used to submit the form.
     *
     * @param null|string|Stringable $formaction
     * @return static
     */
    public function setFormaction(null|string|Stringable $formaction): static
    {
        if ($formaction)
            $this->attributes()['formaction'] = $formaction;
        else
            $this->unsetFormaction();
        return $this;
    }

    /**
     * Overrides the form's action attribute. The URL that processes the form submission when this control is used to submit the form.
     *
     * @return static
     */
    public function unsetFormaction(): static
    {
        unset($this->attributes()['formaction']);
        return $this;
    }

    /**
     * Overrides the form's method attribute. The HTTP method used to submit the form. Valid values are "get" and "post".
     *
     * @return null|string|Stringable
     */
    public function formmethod(): null|string|Stringable
    {
        return $this->attributes()->asString('formmethod');
    }

    /**
     * Overrides the form's method attribute. The HTTP method used to submit the form. Valid values are "get" and "post".
     *
     * @param null|string|Stringable $formmethod
     * @return static
     */
    public function setFormmethod(null|string|Stringable $formmethod): static
    {
        if ($formmethod)
            $this->attributes()['formmethod'] = $formmethod;
        else
            $this->unsetFormmethod();
        return $this;
    }

    /**
     * Overrides the form's method attribute. The HTTP method used to submit the form. Valid values are "get" and "post".
     *
     * @return static
     */
    public function unsetFormmethod(): static
    {
        unset($this->attributes()['formmethod']);
        return $this;
    }

    /**
     * Overrides the form's enctype attribute. The encoding type to use when submitting the form. Valid values are "application/x-www-form-urlencoded", "multipart/form-data", and "text/plain".
     *
     * @return null|string|Stringable
     */
    public function formenctype(): null|string|Stringable
    {
        return $this->attributes()->asString('formenctype');
    }

    /**
     * Overrides the form's enctype attribute. The encoding type to use when submitting the form. Valid values are "application/x-www-form-urlencoded", "multipart/form-data", and "text/plain".
     *
     * @param null|string|Stringable $formenctype
     * @return static
     */
    public function setFormenctype(null|string|Stringable $formenctype): static
    {
        if ($formenctype)
            $this->attributes()['formenctype'] = $formenctype;
        else
            $this->unsetFormenctype();
        return $this;
    }

    /**
     * Overrides the form's enctype attribute. The encoding type to use when submitting the form. Valid values are "application/x-www-form-urlencoded", "multipart/form-data", and "text/plain".
     *
     * @return static
     */
    public function unsetFormenctype(): static
    {
        unset($this->attributes()['formenctype']);
        return $this;
    }

    /**
     * Overrides the form's novalidate attribute. If true, the form will not be validated on submission when this control is used to submit it.
     *
     * @return boolean
     */
    public function formnovalidate(): bool
    {
        return $this->attributes()['formnovalidate'] === BooleanAttribute::true;
    }

    /**
     * Overrides the form's novalidate attribute. If true, the form will not be validated on submission when this control is used to submit it.
     *
     * @param boolean $formnovalidate
     * @return static
     */
    public function setFormnovalidate(bool $formnovalidate): static
    {
        if ($formnovalidate)
            $this->attributes()['formnovalidate'] = BooleanAttribute::true;
        else
            unset($this->attributes()['formnovalidate']);
        return $this;
    }

    /**
     * Overrides the form's target attribute. Where to display the response after submitting the form. Accepts a BrowsingContext enum value or a custom frame name.
     *
     * @return null|string|Stringable|BrowsingContext
     */
    public function formtarget(): null|string|Stringable|BrowsingContext
    {
        return $this->attributes()->asEnum('formtarget', BrowsingContext::class)
            ?? $this->attributes()->asString('formtarget');
    }

    /**
     * Overrides the form's target attribute. Where to display the response after submitting the form. Accepts a BrowsingContext enum value or a custom frame name.
     * 
     * @param null|string|Stringable|BrowsingContext $formtarget
     * @return static
     */
    public function setFormtarget(null|string|Stringable|BrowsingContext $formtarget): static
    {
        if (!$formtarget)
            $this->unsetFormtarget();
        elseif ($formtarget instanceof BrowsingContext)
            $this->attributes()['formtarget'] = $formtarget->value;
        else
            $this->attributes()['formtarget'] = $formtarget;
        return $this;
    }

    /**
     * Overrides the form's target attribute. Where to display the response after submitting the form.
     *
     * @return static
     */
    public function unsetFormtarget(): static
    {
        unset($this->attributes()['formtarget']);
        return $this;
    }

}
