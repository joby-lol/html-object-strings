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
 * The <output> HTML element is a container element into which a site or app can inject the results of a calculation or the outcome of a user action.
 *
 * Tag description by Mozilla Contributors licensed under CC-BY-SA 2.5
 * https://developer.mozilla.org/en-US/docs/Web/HTML/Reference/Elements/output
 */
class OutputTag extends AbstractContainerTag
{

    const TAG = 'output';

    /**
     * A space-separated list of other elements' ids, indicating that those elements contributed input values to (or otherwise affected) the calculation.
     *
     * @return null|string|Stringable
     */
    public function for(): null|string|Stringable
    {
        return $this->attributes()->asString('for');
    }

    /**
     * A space-separated list of other elements' ids, indicating that those elements contributed input values to (or otherwise affected) the calculation.
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
     * A space-separated list of other elements' ids, indicating that those elements contributed input values to (or otherwise affected) the calculation.
     *
     * @return static
     */
    public function unsetFor(): static
    {
        unset($this->attributes()['for']);
        return $this;
    }

    /**
     * The id of the <form> element this output is associated with. If omitted, the output is associated with its nearest ancestor <form> element.
     *
     * @return null|string|Stringable
     */
    public function form(): null|string|Stringable
    {
        return $this->attributes()->asString('form');
    }

    /**
     * The id of the <form> element this output is associated with. If omitted, the output is associated with its nearest ancestor <form> element.
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
     * The id of the <form> element this output is associated with. If omitted, the output is associated with its nearest ancestor <form> element.
     *
     * @return static
     */
    public function unsetForm(): static
    {
        unset($this->attributes()['form']);
        return $this;
    }

    /**
     * The name of the element, used in the form.elements API and as part of the form data when the form is submitted.
     *
     * @return null|string|Stringable
     */
    public function name(): null|string|Stringable
    {
        return $this->attributes()->asString('name');
    }

    /**
     * The name of the element, used in the form.elements API and as part of the form data when the form is submitted.
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
     * The name of the element, used in the form.elements API and as part of the form data when the form is submitted.
     *
     * @return static
     */
    public function unsetName(): static
    {
        unset($this->attributes()['name']);
        return $this;
    }

}
