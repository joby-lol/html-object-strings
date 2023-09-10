<?php

namespace ByJoby\HTML\Html5\DocumentTags;

use ByJoby\HTML\Containers\DocumentTags\TitleTagInterface;
use ByJoby\HTML\Tags\AbstractContentTag;
use Stringable;

/**
 * The <title> HTML element defines the document's title that is shown in a
 * browser's title bar or a page's tab. It only contains text; tags within the
 * element are ignored.
 *
 * Tag description by Mozilla Contributors licensed under CC-BY-SA 2.5
 * https://developer.mozilla.org/en-US/docs/Web/HTML/Element/title
 */
class TitleTag extends AbstractContentTag implements TitleTagInterface
{
    const TAG = 'title';
    protected $content = 'Untitled';
    protected $inline = true;

    public function setContent(string|Stringable $content): self
    {
        parent::setContent(trim(strip_tags($content)));
        return $this;
    }
}