<?php

/**
 * HTML Object Strings
 * https://github.com/joby-lol/html-object-strings
 * (c) 2024-2026 Joby Elliott code@joby.lol
 * MIT License https://opensource.org/licenses/MIT
 */

namespace Joby\HTML\Html5\Tables;

use Joby\HTML\Tags\AbstractContentTag;

/**
 * The <caption> HTML element specifies the caption (or title) of a table, providing the table an accessible description.
 *
 * Tag description by Mozilla Contributors licensed under CC-BY-SA 2.5
 * https://developer.mozilla.org/en-US/docs/Web/HTML/Reference/Elements/caption
 */
class CaptionTag extends AbstractContentTag
{

    const TAG = 'caption';

    public function __construct(string $content = '')
    {
        parent::__construct();
        $this->setContent($content);
    }

}
