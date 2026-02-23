<?php

/**
 * HTML Object Strings
 * https://github.com/joby-lol/html-object-strings
 * (c) 2024-2026 Joby Elliott code@joby.lol
 * MIT License https://opensource.org/licenses/MIT
 */

namespace Joby\HTML\Html5\InlineTextSemantics;

use Joby\HTML\Tags\AbstractContainerTag;

/**
 * The <rt> HTML element specifies the ruby text component of a ruby annotation,
 * which is used to provide pronunciation, translation, or transliteration
 * information for East Asian typography. The <rt> element must always be
 * contained within a <ruby> element.
 *
 * This simple example provides Romaji transliteration for the kanji characters
 * within the <ruby> element:
 *
 * <ruby> 漢 <rt>Kan</rt> 字 <rt>ji</rt> </ruby>
 *
 * Tag description by Mozilla Contributors licensed under CC-BY-SA 2.5
 * https://developer.mozilla.org/en-US/docs/Web/HTML/Element/rt
 */
class RtTag extends AbstractContainerTag
{
    const TAG = 'rt';
}