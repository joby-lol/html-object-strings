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
 * The <table> HTML element represents tabular data — that is, information presented in a two-dimensional table comprised of rows and columns of cells containing data.
 *
 * Tag description by Mozilla Contributors licensed under CC-BY-SA 2.5
 * https://developer.mozilla.org/en-US/docs/Web/HTML/Reference/Elements/table
 */
class TableTag extends AbstractGroupedTag
{

    const TAG = 'table';

    /** @var ContainerGroup<CaptionTag> */
    protected ContainerGroup $caption;

    /** @var ContainerGroup<ColGroupTag> */
    protected ContainerGroup $colgroups;

    /** @var ContainerGroup<TheadTag> */
    protected ContainerGroup $thead;

    /** @var ContainerGroup<TbodyTag> */
    protected ContainerGroup $tbodies;

    /** @var ContainerGroup<TfootTag> */
    protected ContainerGroup $tfoot;

    public TbodyTag $implicitTbody;

    public function __construct()
    {
        parent::__construct();
        $this->caption = ContainerGroup::ofClass(CaptionTag::class, 1);
        $this->colgroups = ContainerGroup::ofClass(ColGroupTag::class);
        $this->thead = ContainerGroup::ofClass(TheadTag::class, 1);
        $this->tbodies = ContainerGroup::ofClass(TbodyTag::class);
        $this->tfoot = ContainerGroup::ofClass(TfootTag::class, 1);
        $this->addGroup($this->caption);
        $this->addGroup($this->colgroups);
        $this->addGroup($this->thead);
        $this->addGroup($this->tbodies);
        $this->addGroup($this->tfoot);
        $this->implicitTbody = new TbodyTag();
        $this->tbodies->addChild($this->implicitTbody);
    }

    /**
     * Add a row to the implicit tbody.
     */
    public function addRow(TrTag $row): static
    {
        $this->implicitTbody->addChild($row);
        return $this;
    }

}
