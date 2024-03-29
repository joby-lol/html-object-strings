<?php

namespace ByJoby\HTML\Html5\InlineTextSemantics;

use ByJoby\HTML\Tags\AbstractContainerTag;

/**
 * The <span> HTML element is a generic inline container for phrasing content,
 * which does not inherently represent anything. It can be used to group
 * elements for styling purposes (using the class or id attributes), or because
 * they share attribute values, such as lang. It should be used only when no
 * other semantic element is appropriate. <span> is very much like a <div>
 * element, but <div> is a block-level element whereas a <span> is an
 * inline-level element.
 *
 * Tag description by Mozilla Contributors licensed under CC-BY-SA 2.5
 * https://developer.mozilla.org/en-US/docs/Web/HTML/Element/span
 */
class SpanTag extends AbstractContainerTag
{
    const TAG = 'span';
}