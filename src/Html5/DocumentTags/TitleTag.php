<?php

namespace ByJoby\HTML\Html5\DocumentTags;

use ByJoby\HTML\Containers\DocumentTags\TitleTagInterface;
use ByJoby\HTML\Tags\AbstractContentTag;
use Stringable;

class TitleTag extends AbstractContentTag implements TitleTagInterface
{
    const TAG = 'title';
    /** @var string */
    protected $content = 'Untitled';

    public function setContent(string|Stringable $content): static
    {
        parent::setContent(trim(strip_tags($content)));
        return $this;
    }
}
