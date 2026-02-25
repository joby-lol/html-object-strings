<?php

/**
 * HTML Object Strings
 * https://github.com/joby-lol/html-object-strings
 * (c) 2024-2026 Joby Elliott code@joby.lol
 * MIT License https://opensource.org/licenses/MIT
 */

namespace Joby\HTML\Html5\Forms;

use Joby\HTML\Html5\Forms\Traits\FormControlTrait;
use Joby\HTML\Html5\Forms\Traits\RequiredTrait;
use Joby\HTML\Helpers\BooleanAttribute;
use Joby\HTML\Tags\AbstractContentTag;
use Stringable;

/**
 * The <textarea> HTML element represents a multi-line plain-text editing control, useful when you want to allow users to enter a sizeable amount of free-form text, for example a comment on a review or feedback form.
 *
 * Tag description by Mozilla Contributors licensed under CC-BY-SA 2.5
 * https://developer.mozilla.org/en-US/docs/Web/HTML/Reference/Elements/textarea
 */
class TextareaTag extends AbstractContentTag
{

    use FormControlTrait;
    use RequiredTrait;

    const TAG = 'textarea';

    /**
     * Override default content() implementation to escape HTML special characters.
     * @return string
     */
    protected function contentForRendering(): string
    {
        return htmlspecialchars($this->content);
    }

    /**
     * The maximum number of characters (UTF-16 code units) that the user can enter. If this value isn't specified, the user can enter an unlimited number of characters.
     *
     * @return null|int
     */
    public function maxlength(): null|int
    {
        return $this->attributes()->asInt('maxlength');
    }

    /**
     * The maximum number of characters (UTF-16 code units) that the user can enter. If this value isn't specified, the user can enter an unlimited number of characters.
     *
     * @param null|int $maxlength
     * @return static
     */
    public function setMaxlength(null|int $maxlength): static
    {
        if (is_int($maxlength))
            $this->attributes()['maxlength'] = $maxlength;
        else
            $this->unsetMaxlength();
        return $this;
    }

    /**
     * The maximum number of characters (UTF-16 code units) that the user can enter. If this value isn't specified, the user can enter an unlimited number of characters.
     *
     * @return static
     */
    public function unsetMaxlength(): static
    {
        unset($this->attributes()['maxlength']);
        return $this;
    }

    /**
     * The minimum number of characters (UTF-16 code units) required that the user should enter.
     *
     * @return null|int
     */
    public function minlength(): null|int
    {
        return $this->attributes()->asInt('minlength');
    }

    /**
     * The minimum number of characters (UTF-16 code units) required that the user should enter.
     *
     * @param null|int $minlength
     * @return static
     */
    public function setMinlength(null|int $minlength): static
    {
        if (is_int($minlength))
            $this->attributes()['minlength'] = $minlength;
        else
            $this->unsetMinlength();
        return $this;
    }

    /**
     * The minimum number of characters (UTF-16 code units) required that the user should enter.
     *
     * @return static
     */
    public function unsetMinlength(): static
    {
        unset($this->attributes()['minlength']);
        return $this;
    }

    /**
     * The number of visible text lines for the control. If it is specified, it must be a positive integer. If it is not specified, the default value is 2.
     *
     * @return null|int
     */
    public function rows(): null|int
    {
        return $this->attributes()->asInt('rows');
    }

    /**
     * The number of visible text lines for the control. If it is specified, it must be a positive integer. If it is not specified, the default value is 2.
     *
     * @param null|int $rows
     * @return static
     */
    public function setRows(null|int $rows): static
    {
        if (is_int($rows))
            $this->attributes()['rows'] = $rows;
        else
            $this->unsetRows();
        return $this;
    }

    /**
     * The number of visible text lines for the control. If it is specified, it must be a positive integer. If it is not specified, the default value is 2.
     *
     * @return static
     */
    public function unsetRows(): static
    {
        unset($this->attributes()['rows']);
        return $this;
    }

    /**
     * The visible width of the text control, in average character widths. If it is specified, it must be a positive integer. If it is not specified, the default value is 20.
     *
     * @return null|int
     */
    public function cols(): null|int
    {
        return $this->attributes()->asInt('cols');
    }

    /**
     * The visible width of the text control, in average character widths. If it is specified, it must be a positive integer. If it is not specified, the default value is 20.
     *
     * @param null|int $cols
     * @return static
     */
    public function setCols(null|int $cols): static
    {
        if (is_int($cols))
            $this->attributes()['cols'] = $cols;
        else
            $this->unsetCols();
        return $this;
    }

    /**
     * The visible width of the text control, in average character widths. If it is specified, it must be a positive integer. If it is not specified, the default value is 20.
     *
     * @return static
     */
    public function unsetCols(): static
    {
        unset($this->attributes()['cols']);
        return $this;
    }

    /**
     * A Boolean attribute which, if present, indicates that the user should not be able to edit the value of the textarea.
     *
     * @return boolean
     */
    public function readonly(): bool
    {
        return $this->attributes()['readonly'] === BooleanAttribute::true;
    }

    /**
     * A Boolean attribute which, if present, indicates that the user should not be able to edit the value of the textarea.
     *
     * @param boolean $readonly
     * @return static
     */
    public function setReadonly(bool $readonly): static
    {
        if ($readonly)
            $this->attributes()['readonly'] = BooleanAttribute::true;
        else
            unset($this->attributes()['readonly']);
        return $this;
    }

    /**
     * A hint to the user of what can be entered in the control. Carriage returns or line-feeds within the placeholder text must be treated as line breaks when rendering the hint.
     *
     * @return null|string|Stringable
     */
    public function placeholder(): null|string|Stringable
    {
        return $this->attributes()->asString('placeholder');
    }

    /**
     * A hint to the user of what can be entered in the control. Carriage returns or line-feeds within the placeholder text must be treated as line breaks when rendering the hint.
     *
     * @param null|string|Stringable $placeholder
     * @return static
     */
    public function setPlaceholder(null|string|Stringable $placeholder): static
    {
        if ($placeholder)
            $this->attributes()['placeholder'] = $placeholder;
        else
            $this->unsetPlaceholder();
        return $this;
    }

    /**
     * A hint to the user of what can be entered in the control. Carriage returns or line-feeds within the placeholder text must be treated as line breaks when rendering the hint.
     *
     * @return static
     */
    public function unsetPlaceholder(): static
    {
        unset($this->attributes()['placeholder']);
        return $this;
    }

    /**
     * Indicates how the control should wrap the value for form submission. Possible values are hard (browser automatically inserts line breaks) and soft (default, no automatic line breaks).
     *
     * @return null|string|Stringable
     */
    public function wrap(): null|string|Stringable
    {
        return $this->attributes()->asString('wrap');
    }

    /**
     * Indicates how the control should wrap the value for form submission. Possible values are hard (browser automatically inserts line breaks) and soft (default, no automatic line breaks).
     *
     * @param null|string|Stringable $wrap
     * @return static
     */
    public function setWrap(null|string|Stringable $wrap): static
    {
        if ($wrap)
            $this->attributes()['wrap'] = $wrap;
        else
            $this->unsetWrap();
        return $this;
    }

    /**
     * Indicates how the control should wrap the value for form submission. Possible values are hard (browser automatically inserts line breaks) and soft (default, no automatic line breaks).
     *
     * @return static
     */
    public function unsetWrap(): static
    {
        unset($this->attributes()['wrap']);
        return $this;
    }

}
