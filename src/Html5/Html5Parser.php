<?php

namespace ByJoby\HTML\Html5;

use ByJoby\HTML\AbstractParser;
use ByJoby\HTML\Containers\HtmlDocumentInterface;

/**
 * A Parser configured to parse and render HTML5.
 */
class Html5Parser extends AbstractParser
{
    /** @var array<int,string> */
    protected $tag_namespaces = [
        '\\ByJoby\\HTML\\Html5\\ContentSectioningTags\\',
        '\\ByJoby\\HTML\\Html5\\DocumentTags\\',
        '\\ByJoby\\HTML\\Html5\\InlineTextSemantics\\',
        '\\ByJoby\\HTML\\Html5\\Multimedia\\',
        '\\ByJoby\\HTML\\Html5\\Tags\\',
        '\\ByJoby\\HTML\\Html5\\TextContentTags\\',
    ];

    /** @var class-string<HtmlDocumentInterface> */
    protected $document_class = Html5Document::class;
}
