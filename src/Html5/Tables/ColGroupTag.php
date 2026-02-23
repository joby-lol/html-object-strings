<?php

/**
 * HTML Object Strings
 * https://github.com/joby-lol/html-object-strings
 * (c) 2024-2026 Joby Elliott code@joby.lol
 * MIT License https://opensource.org/licenses/MIT
 */

namespace Joby\HTML\Html5\Tables;

use Joby\HTML\Containers\ContainerGroup;
use Joby\HTML\Tags\AbstractGroupedTag;

/**
 * The <colgroup> HTML element defines a group of columns within a table.
 *
 * Tag description by Mozilla Contributors licensed under CC-BY-SA 2.5
 * https://developer.mozilla.org/en-US/docs/Web/HTML/Reference/Elements/colgroup
 */
class ColGroupTag extends AbstractGroupedTag
{

    const TAG = 'colgroup';

    /** @var ContainerGroup<ColTag> */
    protected ContainerGroup $cols;

    public function __construct()
    {
        parent::__construct();
        $this->cols = ContainerGroup::ofClass(ColTag::class);
        $this->addGroup($this->cols);
    }

    /**
     * This attribute contains a positive integer indicating the number of consecutive columns the <colgroup> element spans. If not present, its default value is 1. The attribute is ignored if the <colgroup> element contains one or more <col> elements.
     */
    public function span(): ?int
    {
        return $this->attributes()->asInt('span');
    }

    /**
     * This attribute contains a positive integer indicating the number of consecutive columns the <colgroup> element spans. If not present, its default value is 1. The attribute is ignored if the <colgroup> element contains one or more <col> elements.
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
     * This attribute contains a positive integer indicating the number of consecutive columns the <colgroup> element spans. If not present, its default value is 1. The attribute is ignored if the <colgroup> element contains one or more <col> elements.
     */
    public function unsetSpan(): static
    {
        unset($this->attributes()['span']);
        return $this;
    }

}
