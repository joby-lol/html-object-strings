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
 * The <main> HTML element represents the dominant content of the <body> of a
 * document. The main content area consists of content that is directly related
 * to or expands upon the central topic of a document, or the central
 * functionality of an application.
 *
 * Tag description by Mozilla Contributors licensed under CC-BY-SA 2.5
 * https://developer.mozilla.org/en-US/docs/Web/HTML/Element/main
 */
class MainTag extends AbstractContainerTag
{
    const TAG = 'main';
}
