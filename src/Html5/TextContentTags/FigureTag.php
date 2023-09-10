<?php

namespace ByJoby\HTML\Html5\TextContentTags;

use ByJoby\HTML\Containers\ContainerGroup;
use ByJoby\HTML\NodeInterface;
use ByJoby\HTML\Tags\AbstractGroupedTag;
use ByJoby\HTML\Tags\TagInterface;

/**
 * The <figure> HTML element represents self-contained content, potentially with
 * an optional caption, which is specified using the <figcaption> element. The
 * figure, its caption, and its contents are referenced as a single unit.
 *
 * Tag description by Mozilla Contributors licensed under CC-BY-SA 2.5
 * https://developer.mozilla.org/en-US/docs/Web/HTML/Element/figure
 */
class FigureTag extends AbstractGroupedTag
{
    const TAG = 'figure';

    public function __construct()
    {
        parent::__construct();
        // group that accepts anything but a figcaption tag
        $this->addGroup(new ContainerGroup(function (NodeInterface $node): bool {
            if ($node instanceof TagInterface) {
                return $node->tag() != 'figcaption';
            } else {
                return true;
            }
        }));
        // figcaption tag group
        $this->addGroup(ContainerGroup::ofTag('figcaption', 1));
    }

    /**
     * Flip the caption and content order from its current state. The default
     * state is to have the content first, then the caption.
     *
     * @return static
     */
    public function flipCaptionOrder(): self
    {
        $this->children = array_reverse($this->children);
        return $this;
    }
}
