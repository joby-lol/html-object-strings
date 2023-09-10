<?php

namespace ByJoby\HTML\Html5\InlineTextSemantics;

use ByJoby\HTML\Tags\AbstractContainerTag;
use Stringable;

/**
 * The <dfn> HTML element is used to indicate the term being defined within the
 * context of a definition phrase or sentence. The ancestor <p> element, the
 * <dt>/<dd> pairing, or the nearest <section> ancestor of the <dfn> element, is
 * considered to be the definition of the term.
 *
 * The term being defined is identified following these rules:
 *
 *  * If the <dfn> element has a title attribute, the value of the title
 *    attribute is considered to be the term being defined. The element must
 *    still have text within it, but that text may be an abbreviation (perhaps
 *    using <abbr>) or another form of the term.
 *  * If the <dfn> contains a single child element and does not have any text
 *    content of its own, and the child element is an <abbr> element with a
 *    title attribute itself, then the exact value of the <abbr> element's title
 *    is the term being defined.
 *  * Otherwise, the text content of the <dfn> element is the term being
 *    defined. This is shown in the first example below.
 *
 * Tag description by Mozilla Contributors licensed under CC-BY-SA 2.5
 * https://developer.mozilla.org/en-US/docs/Web/HTML/Element/dfn
 */
class DataTag extends AbstractContainerTag
{
    const TAG = 'dfn';

    /**
     * If the <dfn> element has a title attribute, the value of the title
     * attribute is considered to be the term being defined. The element must
     * still have text within it, but that text may be an abbreviation (perhaps
     * using <abbr>) or another form of the term.
     *
     * @return null|string|Stringable
     */
    public function title(): null|string|Stringable
    {
        return $this->attributes()->asString('title');
    }

    /**
     * If the <dfn> element has a title attribute, the value of the title
     * attribute is considered to be the term being defined. The element must
     * still have text within it, but that text may be an abbreviation (perhaps
     * using <abbr>) or another form of the term.
     *
     * @param null|string|Stringable $title
     * @return static
     */
    public function setTitle(null|string|Stringable $title): self
    {
        if ($title) $this->attributes()['title'] = $title;
        else $this->unsetTitle();
        return $this;
    }

    /**
     * If the <dfn> element has a title attribute, the value of the title
     * attribute is considered to be the term being defined. The element must
     * still have text within it, but that text may be an abbreviation (perhaps
     * using <abbr>) or another form of the term.
     *
     * @return static
     */
    public function unsetTitle(): self
    {
        unset($this->attributes()['title']);
        return $this;
    }
}