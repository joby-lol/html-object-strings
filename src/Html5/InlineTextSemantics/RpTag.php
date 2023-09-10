<?php

namespace ByJoby\HTML\Html5\InlineTextSemantics;

use ByJoby\HTML\Tags\AbstractContainerTag;

/**
 * The <rp> HTML element is used to provide fall-back parentheses for browsers
 * that do not support display of ruby annotations using the <ruby> element. One
 * <rp> element should enclose each of the opening and closing parentheses that
 * wrap the <rt> element that contains the annotation's text.
 *
 * Ruby annotations are for showing pronunciation of East Asian characters, like
 * using Japanese furigana or Taiwanese bopomofo characters. The <rp> element is
 * used in the case of lack of <ruby> element support; the <rp> content provides
 * what should be displayed in order to indicate the presence of a ruby
 * annotation, usually parentheses.
 *
 * Tag description by Mozilla Contributors licensed under CC-BY-SA 2.5
 * https://developer.mozilla.org/en-US/docs/Web/HTML/Element/rp
 */
class RpTag extends AbstractContainerTag
{
    const TAG = 'rp';
}