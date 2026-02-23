<?php

/**
 * HTML Object Strings
 * https://github.com/joby-lol/html-object-strings
 * (c) 2024-2026 Joby Elliott code@joby.lol
 * MIT License https://opensource.org/licenses/MIT
 */

namespace Joby\HTML\Html5\Tables;

use Joby\HTML\Html5\Tables\Traits\CellTrait;
use Joby\HTML\Tags\AbstractContainerTag;

/**
 * The <td> HTML element defines a cell of a table that contains data. It participates in the table model.
 *
 * Tag description by Mozilla Contributors licensed under CC-BY-SA 2.5
 * https://developer.mozilla.org/en-US/docs/Web/HTML/Reference/Elements/td
 */
class TdTag extends AbstractContainerTag
{

    use CellTrait;

    const TAG = 'td';

    public function __construct()
    {
        parent::__construct();
    }

}
