<?php

/**
 * Joby's HTML Object Strings: https://go.joby.lol/htmlobjectstrings
 * MIT License: Copyright (c) 2024 Joby Elliott
 * 
 * Permission is hereby granted, free of charge, to any person obtaining a copy
 * of this software and associated documentation files (the "Software"), to deal
 * in the Software without restriction, including without limitation the rights
 * to use, copy, modify, merge, publish, distribute, sublicense, and/or sell
 * copies of the Software, and to permit persons to whom the Software is
 * furnished to do so, subject to the following conditions:
 * 
 * The above copyright notice and this permission notice shall be included in
 * all copies or substantial portions of the Software.
 * 
 * THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR
 * IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY,
 * FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE
 * AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER
 * LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM,
 * OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN THE 
 * SOFTWARE.
 */

namespace Joby\HTML\Html5\TextContentTags;

use Joby\HTML\Helpers\BooleanAttribute;
use Joby\HTML\Html5\Enums\ListTypeValue;
use Joby\HTML\Tags\AbstractContainerTag;

/**
 * The <ol> HTML element represents an ordered list of items — typically
 * rendered as a numbered list.
 *
 * Tag description by Mozilla Contributors licensed under CC-BY-SA 2.5
 * https://developer.mozilla.org/en-US/docs/Web/HTML/Element/ol
 */
class OlTag extends AbstractContainerTag
{
    const TAG = 'ol';

    /**
     * This Boolean attribute specifies that the list's items are in reverse
     * order. Items will be numbered from high to low.
     *
     * @param boolean $reversed
     * @return static
     */
    public function setReversed(bool $reversed): self
    {
        if ($reversed) $this->attributes()['reversed'] = BooleanAttribute::true;
        else unset($this->attributes()['reversed']);
        return $this;
    }

    /**
     * This Boolean attribute specifies that the list's items are in reverse
     * order. Items will be numbered from high to low.
     *
     * @return boolean
     */
    public function reversed(): bool
    {
        return $this->attributes()['reversed'] === BooleanAttribute::true;
    }

    /**
     * An integer to start counting from for the list items. Always an Arabic
     * numeral (1, 2, 3, etc.), even when the numbering type is letters or Roman
     * numerals. For example, to start numbering elements from the letter "d" or
     * the Roman numeral "iv," use start="4".
     *
     * @return null|integer
     */
    public function start(): null|int
    {
        return $this->attributes()->asInt('start');
    }

    /**
     * An integer to start counting from for the list items. Always an Arabic
     * numeral (1, 2, 3, etc.), even when the numbering type is letters or Roman
     * numerals. For example, to start numbering elements from the letter "d" or
     * the Roman numeral "iv," use start="4".
     *
     * @param null|integer $start
     * @return static
     */
    public function setStart(null|int $start): self
    {
        if (is_null($start)) $this->unsetStart();
        else $this->attributes()['start'] = $start;
        return $this;
    }

    /**
     * An integer to start counting from for the list items. Always an Arabic
     * numeral (1, 2, 3, etc.), even when the numbering type is letters or Roman
     * numerals. For example, to start numbering elements from the letter "d" or
     * the Roman numeral "iv," use start="4".
     *
     * @return static
     */
    public function unsetStart(): self
    {
        unset($this->attributes()['start']);
        return $this;
    }

    /**
     * Gets the numbering type.
     *
     * The specified type is used for the entire list unless a different type
     * attribute is used on an enclosed <li> element.
     *
     * @return null|ListTypeValue
     */
    public function type(): null|ListTypeValue
    {
        return $this->attributes()->asEnum('type', ListTypeValue::class);
    }

    /**
     * Sets the numbering type.
     *
     * The specified type is used for the entire list unless a different type
     * attribute is used on an enclosed <li> element.
     *
     * @param null|ListTypeValue $type
     * @return static
     */
    public function setType(null|ListTypeValue $type): self
    {
        if ($type) $this->attributes()['type'] = $type->value;
        else $this->unsetType();
        return $this;
    }

    /**
     * Unsets the numbering type.
     *
     * The specified type is used for the entire list unless a different type
     * attribute is used on an enclosed <li> element.
     *
     * @return static
     */
    public function unsetType(): self
    {
        unset($this->attributes()['type']);
        return $this;
    }
}