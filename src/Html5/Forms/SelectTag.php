<?php

/**
 * HTML Object Strings
 * https://github.com/joby-lol/html-object-strings
 * (c) 2024-2026 Joby Elliott code@joby.lol
 * MIT License https://opensource.org/licenses/MIT
 */

namespace Joby\HTML\Html5\Forms;

use Joby\HTML\Helpers\BooleanAttribute;
use Joby\HTML\Html5\Forms\Traits\FormControlTrait;
use Joby\HTML\Html5\Forms\Traits\RequiredTrait;
use Joby\HTML\Tags\AbstractContainerTag;

/**
 * The <select> HTML element represents a control that provides a menu of options.
 *
 * Tag description by Mozilla Contributors licensed under CC-BY-SA 2.5
 * https://developer.mozilla.org/en-US/docs/Web/HTML/Reference/Elements/select
 */
class SelectTag extends AbstractContainerTag
{

    use FormControlTrait;
    use RequiredTrait;

    const TAG = 'select';

    /**
     * A Boolean attribute indicating that multiple options can be selected in the list. If it is not specified, then only one option can be selected at a time.
     *
     * @return boolean
     */
    public function multiple(): bool
    {
        return $this->attributes()['multiple'] === BooleanAttribute::true;
    }

    /**
     * A Boolean attribute indicating that multiple options can be selected in the list. If it is not specified, then only one option can be selected at a time.
     *
     * @param boolean $multiple
     * @return static
     */
    public function setMultiple(bool $multiple): static
    {
        if ($multiple)
            $this->attributes()['multiple'] = BooleanAttribute::true;
        else
            unset($this->attributes()['multiple']);
        return $this;
    }

    /**
     * If the control is presented as a scrolling list box (e.g. when multiple is specified), this attribute represents the number of rows in the list that should be visible at one time. Browsers are not required to present a select element as a scrolled list box. The default value is 0.
     *
     * @return null|int
     */
    public function size(): null|int
    {
        return $this->attributes()->asInt('size');
    }

    /**
     * If the control is presented as a scrolling list box (e.g. when multiple is specified), this attribute represents the number of rows in the list that should be visible at one time. Browsers are not required to present a select element as a scrolled list box. The default value is 0.
     *
     * @param null|int $size
     * @return static
     */
    public function setSize(null|int $size): static
    {
        if (is_int($size))
            $this->attributes()['size'] = $size;
        else
            $this->unsetSize();
        return $this;
    }

    /**
     * If the control is presented as a scrolling list box (e.g. when multiple is specified), this attribute represents the number of rows in the list that should be visible at one time. Browsers are not required to present a select element as a scrolled list box. The default value is 0.
     *
     * @return static
     */
    public function unsetSize(): static
    {
        unset($this->attributes()['size']);
        return $this;
    }

}
