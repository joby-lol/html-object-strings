<?php

namespace ByJoby\HTML\Html5\TextContentTags;

use ByJoby\HTML\ContentCategories\FlowContent;
use ByJoby\HTML\ContentCategories\SectioningRoot;
use ByJoby\HTML\DisplayTypes\DisplayBlock;
use ByJoby\HTML\Tags\AbstractContainerTag;
use Stringable;

/**
 * The <blockquote> HTML element indicates that the enclosed text is an extended
 * quotation. Usually, this is rendered visually by indentation (see Notes for
 * how to change it). A URL for the source of the quotation may be given using
 * the cite attribute, while a text representation of the source can be given
 * using the <cite> element.
 *
 * Tag description by Mozilla Contributors licensed under CC-BY-SA 2.5
 * https://developer.mozilla.org/en-US/docs/Web/HTML/Element/blockquote
 */
class BlockquoteTag extends AbstractContainerTag implements FlowContent, SectioningRoot, DisplayBlock
{
    const TAG = 'blockquote';

    /**
     * A URL that designates a source document or message for the information
     * quoted. This attribute is intended to point to information explaining the
     * context or the reference for the quote.
     *
     * @return null|string|Stringable
     */
    public function cite(): null|string|Stringable
    {
        return $this->attributes()->asString('cite');
    }

    /**
     * A URL that designates a source document or message for the information
     * quoted. This attribute is intended to point to information explaining the
     * context or the reference for the quote.
     *
     * @param null|string|Stringable $cite
     * @return static
     */
    public function setCite(null|string|Stringable $cite): static
    {
        if ($cite) $this->attributes()['cite'] = $cite;
        else $this->unsetCite();
        return $this;
    }

    /**
     * A URL that designates a source document or message for the information
     * quoted. This attribute is intended to point to information explaining the
     * context or the reference for the quote.
     *
     * @return static
     */
    public function unsetCite(): static
    {
        unset($this->attributes()['cite']);
        return $this;
    }
}