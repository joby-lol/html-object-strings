<?php

/**
 * HTML Object Strings
 * https://github.com/joby-lol/html-object-strings
 * (c) 2024-2026 Joby Elliott code@joby.lol
 * MIT License https://opensource.org/licenses/MIT
 */

namespace Joby\HTML\Html5\ContentSectioningTags;

use Joby\HTML\Tags\AbstractContainerTag;

/**
 * The <footer> HTML element represents a footer for its nearest ancestor
 * sectioning content or sectioning root element. A <footer> typically contains
 * information about the author of the section, copyright data or links to
 * related documents.
 *
 * Tag description by Mozilla Contributors licensed under CC-BY-SA 2.5
 * https://developer.mozilla.org/en-US/docs/Web/HTML/Element/footer
 */
class FooterTag extends AbstractContainerTag
{
    const TAG = 'footer';
}
