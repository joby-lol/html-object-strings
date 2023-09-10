<?php

namespace ByJoby\HTML\Html5\InlineTextSemantics;

use ByJoby\HTML\Tags\AbstractContainerTag;

/**
 * The <kbd> HTML element represents a span of inline text denoting textual user
 * input from a keyboard, voice input, or any other text entry device. By
 * convention, the user agent defaults to rendering the contents of a <kbd>
 * element using its default monospace font, although this is not mandated by
 * the HTML standard.
 *
 * To describe an input comprised of multiple keystrokes, you can nest multiple
 * <kbd> elements, with an outer <kbd> element representing the overall input
 * and each individual keystroke or component of the input enclosed within its
 * own <kbd>, such as:
 *
 * <kbd><kbd>Ctrl</kbd>+<kbd>N</kbd></kbd>
 *
 * Tag description by Mozilla Contributors licensed under CC-BY-SA 2.5
 * https://developer.mozilla.org/en-US/docs/Web/HTML/Element/kbd
 */
class KbdTag extends AbstractContainerTag
{
    const TAG = 'kbd';
}