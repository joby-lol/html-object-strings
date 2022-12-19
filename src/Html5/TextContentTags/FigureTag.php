<?php

namespace ByJoby\HTML\Html5\TextContentTags;

use ByJoby\HTML\Containers\ContainerGroup;
use ByJoby\HTML\ContentCategories\FlowContent;
use ByJoby\HTML\DisplayTypes\DisplayBlock;
use ByJoby\HTML\NodeInterface;
use ByJoby\HTML\Tags\AbstractGroupedTag;
use ByJoby\HTML\Tags\TagInterface;

class FigureTag extends AbstractGroupedTag implements FlowContent, DisplayBlock
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

    public function reverseCaptionOrder(): static
    {
        $this->children = array_reverse($this->children);
        return $this;
    }
}
