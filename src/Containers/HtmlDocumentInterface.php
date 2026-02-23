<?php

/**
 * HTML Object Strings
 * https://github.com/joby-lol/html-object-strings
 * (c) 2024-2026 Joby Elliott code@joby.lol
 * MIT License https://opensource.org/licenses/MIT
 */

namespace Joby\HTML\Containers;

use Joby\HTML\Containers\DocumentTags\BodyTagInterface;
use Joby\HTML\Containers\DocumentTags\DoctypeInterface;
use Joby\HTML\Containers\DocumentTags\HeadTagInterface;
use Joby\HTML\Containers\DocumentTags\HtmlTagInterface;

interface HtmlDocumentInterface extends DocumentInterface
{
    public function doctype(): DoctypeInterface;
    public function html(): HtmlTagInterface;
    public function head(): HeadTagInterface;
    public function body(): BodyTagInterface;
}
