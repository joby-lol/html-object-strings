<?php

/**
 * HTML Object Strings
 * https://github.com/joby-lol/html-object-strings
 * (c) 2024-2026 Joby Elliott code@joby.lol
 * MIT License https://opensource.org/licenses/MIT
 */

namespace Joby\HTML\Html5\Forms;

use Joby\HTML\Containers\ContainerGroup;
use Joby\HTML\Tags\AbstractGroupedTag;

/**
 * The <datalist> HTML element contains a set of <option> elements that represent the permissible or recommended options available to choose from within other controls.
 *
 * Tag description by Mozilla Contributors licensed under CC-BY-SA 2.5
 * https://developer.mozilla.org/en-US/docs/Web/HTML/Reference/Elements/datalist
 * 
 * @codeCoverageIgnore
 */
class DatalistTag extends AbstractGroupedTag
{

    const TAG = 'datalist';

    public function __construct()
    {
        parent::__construct();
        $this->addGroup(ContainerGroup::ofTag('option'));
    }

}
