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
 * The <search> HTML element is a container representing the parts of the
 * document or application with form controls or other content related to
 * performing a search or filtering operation. The <search> element semantically
 * identifies the purpose of the element's contents as having search or
 * filtering capabilities. The search or filtering functionality can be for the
 * website or application, the current web page or document, or the entire
 * Internet or subsection thereof.
 * 
 * Tag description by Mozilla Contributors licensed under CC-BY-SA 2.5
 * https://developer.mozilla.org/en-US/docs/Web/HTML/Element/search
 */
class SearchTag extends AbstractContainerTag
{
    const TAG = 'search';
}