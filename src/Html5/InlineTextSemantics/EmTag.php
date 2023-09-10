<?php

namespace ByJoby\HTML\Html5\InlineTextSemantics;

use ByJoby\HTML\Tags\AbstractContainerTag;

/**
 * The <em> HTML element marks text that has stress emphasis. The <em> element
 * can be nested, with each level of nesting indicating a greater degree of
 * emphasis.
 *
 * The <em> element is for words that have a stressed emphasis compared to
 * surrounding text, which is often limited to a word or words of a sentence and
 * affects the meaning of the sentence itself.
 *
 * Typically this element is displayed in italic type. However, it should not be
 * used to apply italic styling; use the CSS font-style property for that
 * purpose. Use the <cite> element to mark the title of a work (book, play,
 * song, etc.). Use the <i> element to mark text that is in an alternate tone or
 * mood, which covers many common situations for italics such as scientific
 * names or words in other languages. Use the <strong> element to mark text that
 * has greater importance than surrounding text.
 *
 * Tag description by Mozilla Contributors licensed under CC-BY-SA 2.5
 * https://developer.mozilla.org/en-US/docs/Web/HTML/Element/em
 */
class EmTag extends AbstractContainerTag
{
    const TAG = 'em';
}