<?php

/**
 * HTML Object Strings
 * https://github.com/joby-lol/html-object-strings
 * (c) 2024-2026 Joby Elliott code@joby.lol
 * MIT License https://opensource.org/licenses/MIT
 */

namespace Joby\HTML\Html5\Tags;

use Joby\HTML\Tags\AbstractContentTag;

/**
 * The <noscript> HTML element defines a section of HTML to be inserted if a
 * script type on the page is unsupported or if scripting is currently turned
 * off in the browser.
 *
 * Tag description by Mozilla Contributors licensed under CC-BY-SA 2.5
 * https://developer.mozilla.org/en-US/docs/Web/HTML/Element/noscript
 */
class NoscriptTag extends AbstractContentTag
{
    const TAG = 'noscript';
}
