<?php

/**
 * HTML Object Strings
 * https://github.com/joby-lol/html-object-strings
 * (c) 2024-2026 Joby Elliott code@joby.lol
 * MIT License https://opensource.org/licenses/MIT
 */

namespace Joby\HTML\Html5;

use Joby\HTML\AbstractParser;
use Joby\HTML\Containers\HtmlDocumentInterface;

/**
 * A Parser configured to parse and render HTML5.
 */
class Html5Parser extends AbstractParser
{
    /** @var array<int,string> */
    protected $tag_namespaces = [
        '\\Joby\\HTML\\Html5\\ContentSectioningTags\\',
        '\\Joby\\HTML\\Html5\\DocumentTags\\',
        '\\Joby\\HTML\\Html5\\InlineTextSemantics\\',
        '\\Joby\\HTML\\Html5\\Multimedia\\',
        '\\Joby\\HTML\\Html5\\Tags\\',
        '\\Joby\\HTML\\Html5\\TextContentTags\\',
    ];

    /** @var class-string<HtmlDocumentInterface> */
    protected $document_class = Html5Document::class;
}
