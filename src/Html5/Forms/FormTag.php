<?php

/**
 * HTML Object Strings
 * https://github.com/joby-lol/html-object-strings
 * (c) 2024-2026 Joby Elliott code@joby.lol
 * MIT License https://opensource.org/licenses/MIT
 */

namespace Joby\HTML\Html5\Forms;

use Joby\HTML\Helpers\BooleanAttribute;
use Joby\HTML\Html5\Enums\BrowsingContext;
use Joby\HTML\Tags\AbstractContainerTag;
use Stringable;

/**
 * The <form> HTML element represents a document section containing interactive controls for submitting information.
 *
 * Tag description by Mozilla Contributors licensed under CC-BY-SA 2.5
 * https://developer.mozilla.org/en-US/docs/Web/HTML/Reference/Elements/form
 */
class FormTag extends AbstractContainerTag
{

    const TAG = 'form';

    /**
     * The URL that processes the form submission. This value can be overridden by a formaction attribute on a <button>, <input type="submit">, or <input type="image"> element. This attribute is ignored when method="dialog" is set.
     *
     * @return null|string|Stringable
     */
    public function action(): null|string|Stringable
    {
        return $this->attributes()->asString('action');
    }

    /**
     * The URL that processes the form submission. This value can be overridden by a formaction attribute on a <button>, <input type="submit">, or <input type="image"> element. This attribute is ignored when method="dialog" is set.
     *
     * @param null|string|Stringable $action
     * @return static
     */
    public function setAction(null|string|Stringable $action): static
    {
        if ($action)
            $this->attributes()['action'] = $action;
        else
            $this->unsetAction();
        return $this;
    }

    /**
     * The URL that processes the form submission. This value can be overridden by a formaction attribute on a <button>, <input type="submit">, or <input type="image"> element. This attribute is ignored when method="dialog" is set.
     *
     * @return static
     */
    public function unsetAction(): static
    {
        unset($this->attributes()['action']);
        return $this;
    }

    /**
     * If the value of the method attribute is post, enctype is the MIME type of the form submission. Possible values are application/x-www-form-urlencoded (default), multipart/form-data (use when the form contains an <input> with type=file), and text/plain.
     *
     * @return null|string|Stringable
     */
    public function enctype(): null|string|Stringable
    {
        return $this->attributes()->asString('enctype');
    }

    /**
     * If the value of the method attribute is post, enctype is the MIME type of the form submission. Possible values are application/x-www-form-urlencoded (default), multipart/form-data (use when the form contains an <input> with type=file), and text/plain.
     *
     * @param null|string|Stringable $enctype
     * @return static
     */
    public function setEnctype(null|string|Stringable $enctype): static
    {
        if ($enctype)
            $this->attributes()['enctype'] = $enctype;
        else
            $this->unsetEnctype();
        return $this;
    }

    /**
     * If the value of the method attribute is post, enctype is the MIME type of the form submission. Possible values are application/x-www-form-urlencoded (default), multipart/form-data (use when the form contains an <input> with type=file), and text/plain.
     *
     * @return static
     */
    public function unsetEnctype(): static
    {
        unset($this->attributes()['enctype']);
        return $this;
    }

    /**
     * The HTTP method to submit the form with. The only allowed methods/values are get (default), post, and dialog.
     *
     * @return null|string|Stringable
     */
    public function method(): null|string|Stringable
    {
        return $this->attributes()->asString('method');
    }

    /**
     * The HTTP method to submit the form with. The only allowed methods/values are get (default), post, and dialog.
     *
     * @param null|string|Stringable $method
     * @return static
     */
    public function setMethod(null|string|Stringable $method): static
    {
        if ($method)
            $this->attributes()['method'] = $method;
        else
            $this->unsetMethod();
        return $this;
    }

    /**
     * The HTTP method to submit the form with. The only allowed methods/values are get (default), post, and dialog.
     *
     * @return static
     */
    public function unsetMethod(): static
    {
        unset($this->attributes()['method']);
        return $this;
    }

    /**
     * The name of the form. The value must not be the empty string, and must be unique among the form elements in the forms collection that it is in, if any.
     *
     * @return null|string|Stringable
     */
    public function name(): null|string|Stringable
    {
        return $this->attributes()->asString('name');
    }

    /**
     * The name of the form. The value must not be the empty string, and must be unique among the form elements in the forms collection that it is in, if any.
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
     * The name of the form. The value must not be the empty string, and must be unique among the form elements in the forms collection that it is in, if any.
     *
     * @return static
     */
    public function unsetName(): static
    {
        unset($this->attributes()['name']);
        return $this;
    }

    /**
     * This Boolean attribute indicates that the form shouldn't be validated when submitted. If this attribute is not set (and therefore the form is validated), it can be overridden by a formnovalidate attribute on a <button>, <input type="submit">, or <input type="image"> element belonging to the form.
     *
     * @return boolean
     */
    public function novalidate(): bool
    {
        return $this->attributes()['novalidate'] === BooleanAttribute::true;
    }

    /**
     * This Boolean attribute indicates that the form shouldn't be validated when submitted. If this attribute is not set (and therefore the form is validated), it can be overridden by a formnovalidate attribute on a <button>, <input type="submit">, or <input type="image"> element belonging to the form.
     *
     * @param boolean $novalidate
     * @return static
     */
    public function setNovalidate(bool $novalidate): static
    {
        if ($novalidate)
            $this->attributes()['novalidate'] = BooleanAttribute::true;
        else
            unset($this->attributes()['novalidate']);
        return $this;
    }

    /**
     * Indicates where to display the response after submitting the form. It is a name/keyword for a browsing context (for example, tab, window, or iframe). The following keywords have special meanings: _self (default), _blank, _parent, _top. This value can be overridden by a formtarget attribute on a <button>, <input type="submit">, or <input type="image"> element.
     *
     * @return null|string|Stringable|BrowsingContext
     */
    public function target(): null|string|Stringable|BrowsingContext
    {
        return $this->attributes()->asEnum('target', BrowsingContext::class)
            ?? $this->attributes()->asString('target');
    }

    /**
     * Indicates where to display the response after submitting the form. It is a name/keyword for a browsing context (for example, tab, window, or iframe). The following keywords have special meanings: _self (default), _blank, _parent, _top. This value can be overridden by a formtarget attribute on a <button>, <input type="submit">, or <input type="image"> element.
     *
     * @param null|string|Stringable|BrowsingContext $target
     * @return static
     */
    public function setTarget(null|string|Stringable|BrowsingContext $target): static
    {
        if (!$target)
            $this->unsetTarget();
        elseif ($target instanceof BrowsingContext)
            $this->attributes()['target'] = $target->value;
        else
            $this->attributes()['target'] = $target;
        return $this;
    }

    /**
     * Indicates where to display the response after submitting the form. It is a name/keyword for a browsing context (for example, tab, window, or iframe). The following keywords have special meanings: _self (default), _blank, _parent, _top. This value can be overridden by a formtarget attribute on a <button>, <input type="submit">, or <input type="image"> element.
     *
     * @return static
     */
    public function unsetTarget(): static
    {
        unset($this->attributes()['target']);
        return $this;
    }

    /**
     * Controls the annotations and what kinds of links the form creates. Annotations include external, nofollow, opener, noopener, and noreferrer. Link types include help, prev, next, search, and license. The rel value is a space-separated list of these enumerated values.
     *
     * @return null|string|Stringable
     */
    public function rel(): null|string|Stringable
    {
        return $this->attributes()->asString('rel');
    }

    /**
     * Controls the annotations and what kinds of links the form creates. Annotations include external, nofollow, opener, noopener, and noreferrer. Link types include help, prev, next, search, and license. The rel value is a space-separated list of these enumerated values.
     *
     * @param null|string|Stringable $rel
     * @return static
     */
    public function setRel(null|string|Stringable $rel): static
    {
        if ($rel)
            $this->attributes()['rel'] = $rel;
        else
            $this->unsetRel();
        return $this;
    }

    /**
     * Controls the annotations and what kinds of links the form creates. Annotations include external, nofollow, opener, noopener, and noreferrer. Link types include help, prev, next, search, and license. The rel value is a space-separated list of these enumerated values.
     *
     * @return static
     */
    public function unsetRel(): static
    {
        unset($this->attributes()['rel']);
        return $this;
    }

}
