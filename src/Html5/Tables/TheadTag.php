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
 * The <thead> HTML element encapsulates a set of table rows (<tr> elements), indicating that they comprise the head of a table with information about the table's columns.
 *
 * Tag description by Mozilla Contributors licensed under CC-BY-SA 2.5
 * https://developer.mozilla.org/en-US/docs/Web/HTML/Reference/Elements/thead
 */
class TheadTag extends AbstractGroupedTag
{

    const TAG = 'thead';

    /** @var ContainerGroup<TrTag> */
    protected ContainerGroup $rows;

    public function __construct()
    {
        parent::__construct();
        $this->rows = ContainerGroup::ofClass(TrTag::class);
        $this->addGroup($this->rows);
    }

}
