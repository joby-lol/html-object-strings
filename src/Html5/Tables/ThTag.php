<?php

/**
 * HTML Object Strings
 * https://github.com/joby-lol/html-object-strings
 * (c) 2024-2026 Joby Elliott code@joby.lol
 * MIT License https://opensource.org/licenses/MIT
 */

namespace Joby\HTML\Html5\Tables;

use Joby\HTML\Html5\Tables\Traits\CellTrait;
use Joby\HTML\Html5\Tables\ThTag\ScopeValue;
use Joby\HTML\Tags\AbstractContainerTag;

/**
 * The <th> HTML element defines a cell as the header of a group of table cells and may be used as a child of the <tr> element. The exact nature of this group is defined by the scope and headers attributes.
 *
 * Tag description by Mozilla Contributors licensed under CC-BY-SA 2.5
 * https://developer.mozilla.org/en-US/docs/Web/HTML/Reference/Elements/th
 */
class ThTag extends AbstractContainerTag
{

    use CellTrait;

    const TAG = 'th';

    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Defines the cells that the header (defined in the <th>) element relates to. Possible enumerated values are: row, col, rowgroup, colgroup.
     */
    public function scope(): ?ScopeValue
    {
        return $this->attributes()->asEnum('scope', ScopeValue::class);
    }

    /**
     * Defines the cells that the header (defined in the <th>) element relates to. Possible enumerated values are: row, col, rowgroup, colgroup.
     */
    public function setScope(?ScopeValue $scope): static
    {
        if ($scope !== null)
            $this->attributes()['scope'] = $scope->value;
        else
            $this->unsetScope();
        return $this;
    }

    /**
     * Defines the cells that the header (defined in the <th>) element relates to. Possible enumerated values are: row, col, rowgroup, colgroup.
     */
    public function unsetScope(): static
    {
        unset($this->attributes()['scope']);
        return $this;
    }

    /**
     * A short, abbreviated description of the header cell's content provided as an alternative label to use for the header cell when referencing the cell in other contexts.
     */
    public function abbr(): ?string
    {
        return $this->attributes()->asString('abbr');
    }

    /**
     * A short, abbreviated description of the header cell's content provided as an alternative label to use for the header cell when referencing the cell in other contexts.
     */
    public function setAbbr(?string $abbr): static
    {
        if ($abbr !== null)
            $this->attributes()['abbr'] = $abbr;
        else
            $this->unsetAbbr();
        return $this;
    }

    /**
     * A short, abbreviated description of the header cell's content provided as an alternative label to use for the header cell when referencing the cell in other contexts.
     */
    public function unsetAbbr(): static
    {
        unset($this->attributes()['abbr']);
        return $this;
    }

}
