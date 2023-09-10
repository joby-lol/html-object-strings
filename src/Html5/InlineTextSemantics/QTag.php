<?php

namespace ByJoby\HTML\Html5\InlineTextSemantics;

use ByJoby\HTML\Tags\AbstractContainerTag;
use Stringable;

/**
 * The <q> HTML element indicates that the enclosed text is a short inline
 * quotation. Most modern browsers implement this by surrounding the text in
 * quotation marks. This element is intended for short quotations that don't
 * require paragraph breaks; for long quotations use the <blockquote> element.
 *
 * Tag description by Mozilla Contributors licensed under CC-BY-SA 2.5
 * https://developer.mozilla.org/en-US/docs/Web/HTML/Element/q
 */
class QTag extends AbstractContainerTag
{
    const TAG = 'q';

    /**
     * The value of this attribute is a URL that designates a source document or
     * message for the information quoted. This attribute is intended to point
     * to information explaining the context or the reference for the quote.
     *
     * @return null|string|Stringable
     */
    public function cite(): null|string|Stringable
    {
        return $this->attributes()->asString('cite');
    }

    /**
     * The value of this attribute is a URL that designates a source document or
     * message for the information quoted. This attribute is intended to point
     * to information explaining the context or the reference for the quote.
     *
     * @param null|string|Stringable $cite
     * @return static
     */
    public function setCite(null|string|Stringable $cite): self
    {
        if ($cite) $this->attributes()['cite'] = $cite;
        else $this->unsetCite();
        return $this;
    }

    /**
     * The value of this attribute is a URL that designates a source document or
     * message for the information quoted. This attribute is intended to point
     * to information explaining the context or the reference for the quote.
     *
     * @return static
     */
    public function unsetCite(): self
    {
        unset($this->attributes()['cite']);
        return $this;
    }
}