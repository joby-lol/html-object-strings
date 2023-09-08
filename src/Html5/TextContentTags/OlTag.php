<?php

namespace ByJoby\HTML\Html5\TextContentTags;

use ByJoby\HTML\ContentCategories\FlowContent;
use ByJoby\HTML\DisplayTypes\DisplayBlock;
use ByJoby\HTML\Html5\Enums\BooleanAttribute;
use ByJoby\HTML\Html5\Enums\Type_list;
use ByJoby\HTML\Tags\AbstractContainerTag;

/**
 * The <ol> HTML element represents an ordered list of items — typically
 * rendered as a numbered list.
 *
 * Tag description by Mozilla Contributors licensed under CC-BY-SA 2.5
 * https://developer.mozilla.org/en-US/docs/Web/HTML/Element/ol
 */
class OlTag extends AbstractContainerTag implements FlowContent, DisplayBlock
{
    const TAG = 'ol';

    /**
     * This Boolean attribute specifies that the list's items are in reverse
     * order. Items will be numbered from high to low.
     *
     * @param boolean $reversed
     * @return static
     */
    public function setReversed(bool $reversed): static
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
    public function setStart(null|int $start): static
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
    public function unsetStart(): static
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
     * @return null|Type_list
     */
    public function type(): null|Type_list
    {
        return $this->attributes()->asEnum('type', Type_list::class);
    }

    /**
     * Sets the numbering type.
     *
     * The specified type is used for the entire list unless a different type
     * attribute is used on an enclosed <li> element.
     *
     * @param null|Type_list $type
     * @return static
     */
    public function setType(null|Type_list $type): static
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
    public function unsetType(): static
    {
        unset($this->attributes()['type']);
        return $this;
    }
}