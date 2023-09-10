<?php

namespace ByJoby\HTML\Html5\InlineTextSemantics;

use ByJoby\HTML\Tags\AbstractContainerTag;

/**
 * The <bdi> HTML element tells the browser's bidirectional algorithm to treat
 * the text it contains in isolation from its surrounding text. It's
 * particularly useful when a website dynamically inserts some text and doesn't
 * know the directionality of the text being inserted.
 *
 * Bidirectional text is text that may contain both sequences of characters that
 * are arranged left-to-right (LTR) and sequences of characters that are
 * arranged right-to-left (RTL), such as an Arabic quotation embedded in an
 * English string. Browsers implement the Unicode Bidirectional Algorithm to
 * handle this. In this algorithm, characters are given an implicit
 * directionality: for example, Latin characters are treated as LTR while Arabic
 * characters are treated as RTL. Some other characters (such as spaces and some
 * punctuation) are treated as neutral and are assigned directionality based on
 * that of their surrounding characters.
 *
 * Tag description by Mozilla Contributors licensed under CC-BY-SA 2.5
 * https://developer.mozilla.org/en-US/docs/Web/HTML/Element/bdi
 */
class BdiTag extends AbstractContainerTag
{
    const TAG = 'bdi';
}