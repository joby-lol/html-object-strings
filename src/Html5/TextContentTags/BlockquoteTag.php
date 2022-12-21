<?php

namespace ByJoby\HTML\Html5\TextContentTags;

use ByJoby\HTML\ContentCategories\FlowContent;
use ByJoby\HTML\ContentCategories\SectioningRoot;
use ByJoby\HTML\DisplayTypes\DisplayBlock;
use ByJoby\HTML\Tags\AbstractContainerTag;

class BlockquoteTag extends AbstractContainerTag implements FlowContent, SectioningRoot, DisplayBlock
{
    const TAG = 'blockquote';

    public function cite(): null|string
    {
        return $this->attributes()->string('cite');
    }

    public function setCite(null|string $cite): static
    {
        if (!$cite) {
            $this->attributes()['cite'] = false;
        } else {
            $this->attributes()['cite'] = $cite;
        }
        return $this;
    }

    public function unsetCite(): static
    {
        unset($this->attributes()['cite']);
        return $this;
    }
}
