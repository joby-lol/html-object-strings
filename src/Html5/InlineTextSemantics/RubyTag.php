<?php

namespace ByJoby\HTML\Html5\InlineTextSemantics;

use ByJoby\HTML\Tags\AbstractContainerTag;

/**
 * The <ruby> HTML element represents small annotations that are rendered above,
 * below, or next to base text, usually used for showing the pronunciation of
 * East Asian characters. It can also be used for annotating other kinds of
 * text, but this usage is less common.
 *
 * Example 1: Character:
 * ```
 * <ruby>
 *   漢 <rp>(</rp><rt>Kan</rt><rp>)</rp>
 *   字 <rp>(</rp><rt>ji</rt><rp>)</rp>
 * </ruby>
 * ```
 * 
 * Example 2: Word
 * ```
 * <ruby> 明日 <rp>(</rp><rt>Ashita</rt><rp>)</rp> </ruby>
 * ```
 *
 * Tag description by Mozilla Contributors licensed under CC-BY-SA 2.5
 * https://developer.mozilla.org/en-US/docs/Web/HTML/Element/ruby
 */
class RubyTag extends AbstractContainerTag
{
    const TAG = 'ruby';
}