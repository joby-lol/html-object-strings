<?php

/**
 * HTML Object Strings
 * https://github.com/joby-lol/html-object-strings
 * (c) 2024-2026 Joby Elliott code@joby.lol
 * MIT License https://opensource.org/licenses/MIT
 */

namespace Joby\HTML\Html5\Tables;

use Joby\HTML\Tags\AbstractTag;

/**
 * The <col> HTML element defines one or more columns in a column group represented by its parent <colgroup> element. The <col> element is only valid as a child of a <colgroup> element that has no span attribute defined.
 *
 * Tag description by Mozilla Contributors licensed under CC-BY-SA 2.5
 * https://developer.mozilla.org/en-US/docs/Web/HTML/Reference/Elements/col
 */
class ColTag extends AbstractTag
{

    const TAG = 'col';

    public function __construct()
    {
        parent::__construct();
    }

    /**
     * This attribute contains a positive integer indicating the number of consecutive columns the <col> element spans. If not present, its default value is 1.
     */
    public function span(): ?int
    {
        return $this->attributes()->asInt('span');
    }

    /**
     * This attribute contains a positive integer indicating the number of consecutive columns the <col> element spans. If not present, its default value is 1.
     */
    public function setSpan(?int $span): static
    {
        if ($span !== null)
            $this->attributes()['span'] = $span;
        else
            $this->unsetSpan();
        return $this;
    }

    /**
     * This attribute contains a positive integer indicating the number of consecutive columns the <col> element spans. If not present, its default value is 1.
     */
    public function unsetSpan(): static
    {
        unset($this->attributes()['span']);
        return $this;
    }

}
