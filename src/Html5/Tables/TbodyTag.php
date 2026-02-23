<?php

/**
 * HTML Object Strings
 * https://github.com/joby-lol/html-object-strings
 * (c) 2024-2026 Joby Elliott code@joby.lol
 * MIT License https://opensource.org/licenses/MIT
 */

namespace Joby\HTML\Html5\Tables;

use Joby\HTML\Containers\ContainerGroup;
use Joby\HTML\Tags\AbstractGroupedTag;

/**
 * The <tbody> HTML element encapsulates a set of table rows (<tr> elements), indicating that they comprise the body of a table's (main) data.
 *
 * Tag description by Mozilla Contributors licensed under CC-BY-SA 2.5
 * https://developer.mozilla.org/en-US/docs/Web/HTML/Reference/Elements/tbody
 */
class TbodyTag extends AbstractGroupedTag
{

    const TAG = 'tbody';

    /** @var ContainerGroup<TrTag> */
    protected ContainerGroup $rows;

    public function __construct()
    {
        parent::__construct();
        $this->rows = ContainerGroup::ofClass(TrTag::class);
        $this->addGroup($this->rows);
    }

}
