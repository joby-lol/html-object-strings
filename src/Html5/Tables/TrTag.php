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
 * The <tr> HTML element defines a row of cells in a table. The row's cells can then be established using a mix of <td> (data cell) and <th> (header cell) elements.
 *
 * Tag description by Mozilla Contributors licensed under CC-BY-SA 2.5
 * https://developer.mozilla.org/en-US/docs/Web/HTML/Reference/Elements/tr
 */
class TrTag extends AbstractGroupedTag
{

    const TAG = 'tr';

    /** @var ContainerGroup<ThTag> */
    protected ContainerGroup $ths;

    /** @var ContainerGroup<TdTag> */
    protected ContainerGroup $tds;

    public function __construct()
    {
        parent::__construct();
        $this->ths = ContainerGroup::ofClass(ThTag::class);
        $this->tds = ContainerGroup::ofClass(TdTag::class);
        $this->addGroup($this->ths);
        $this->addGroup($this->tds);
    }

}
