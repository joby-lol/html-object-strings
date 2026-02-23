<?php

/**
 * HTML Object Strings
 * https://github.com/joby-lol/html-object-strings
 * (c) 2024-2026 Joby Elliott code@joby.lol
 * MIT License https://opensource.org/licenses/MIT
 */

namespace Joby\HTML\Html5\Tags;

use Joby\HTML\Containers\ContainerGroup;
use Joby\HTML\Helpers\BooleanAttribute;
use Joby\HTML\Tags\AbstractGroupedTag;

/**
 * The <details> HTML element creates a disclosure widget in which information is visible only when the widget is toggled into an open state. A summary or label must be provided using the <summary> element.
 *
 * Tag description by Mozilla Contributors licensed under CC-BY-SA 2.5
 * https://developer.mozilla.org/en-US/docs/Web/HTML/Reference/Elements/details
 */
class DetailsTag extends AbstractGroupedTag
{

    const TAG = 'details';

    public function __construct(SummaryTag $summary = null, bool $open = false)
    {
        parent::__construct();
        $this->addGroup(ContainerGroup::ofClass(SummaryTag::class, 1));
        $this->addGroup(ContainerGroup::catchAll());
        if ($summary)
            $this->addChild($summary);
        if ($open)
            $this->setOpen(true);
    }

    /**
     * Indicates whether the details are currently visible. The details are shown when this attribute exists, or hidden when this attribute is absent.
     *
     * @return boolean
     */
    public function open(): bool
    {
        return $this->attributes()['open'] === BooleanAttribute::true;
    }

    /**
     * Indicates whether the details are currently visible. The details are shown when this attribute exists, or hidden when this attribute is absent.
     *
     * @param boolean $open
     * @return static
     */
    public function setOpen(bool $open): static
    {
        if ($open)
            $this->attributes()['open'] = BooleanAttribute::true;
        else
            unset($this->attributes()['open']);
        return $this;
    }

}
