<?php

/**
 * HTML Object Strings
 * https://github.com/joby-lol/html-object-strings
 * (c) 2024-2026 Joby Elliott code@joby.lol
 * MIT License https://opensource.org/licenses/MIT
 */

namespace Joby\HTML\Html5\Tables\Traits;

trait CellTrait
{

    /**
     * This attribute contains a non-negative integer value that indicates how many columns the cell extends. Its default value is 1. Values higher than 1000 will be considered as incorrect and will be set to the default value (1).
     */
    public function colspan(): ?int
    {
        return $this->attributes()->asInt('colspan');
    }

    /**
     * This attribute contains a non-negative integer value that indicates how many columns the cell extends. Its default value is 1. Values higher than 1000 will be considered as incorrect and will be set to the default value (1).
     */
    public function setColspan(?int $colspan): static
    {
        if ($colspan !== null)
            $this->attributes()['colspan'] = $colspan;
        else
            $this->unsetColspan();
        return $this;
    }

    /**
     * This attribute contains a non-negative integer value that indicates how many columns the cell extends. Its default value is 1. Values higher than 1000 will be considered as incorrect and will be set to the default value (1).
     */
    public function unsetColspan(): static
    {
        unset($this->attributes()['colspan']);
        return $this;
    }

    /**
     * This attribute contains a non-negative integer value that indicates how many rows the cell extends. Its default value is 1; if its value is set to 0, it extends until the end of the table section (<thead>, <tbody>, <tfoot>, even if implicitly defined) that the cell belongs to.
     */
    public function rowspan(): ?int
    {
        return $this->attributes()->asInt('rowspan');
    }

    /**
     * This attribute contains a non-negative integer value that indicates how many rows the cell extends. Its default value is 1; if its value is set to 0, it extends until the end of the table section (<thead>, <tbody>, <tfoot>, even if implicitly defined) that the cell belongs to.
     */
    public function setRowspan(?int $rowspan): static
    {
        if ($rowspan !== null)
            $this->attributes()['rowspan'] = $rowspan;
        else
            $this->unsetRowspan();
        return $this;
    }

    /**
     * This attribute contains a non-negative integer value that indicates how many rows the cell extends. Its default value is 1; if its value is set to 0, it extends until the end of the table section (<thead>, <tbody>, <tfoot>, even if implicitly defined) that the cell belongs to.
     */
    public function unsetRowspan(): static
    {
        unset($this->attributes()['rowspan']);
        return $this;
    }

    /**
     * This attribute contains a list of space-separated strings, each corresponding to the id attribute of the <th> elements that apply to this cell.
     */
    public function headers(): ?string
    {
        return $this->attributes()->asString('headers');
    }

    /**
     * This attribute contains a list of space-separated strings, each corresponding to the id attribute of the <th> elements that apply to this cell.
     */
    public function setHeaders(?string $headers): static
    {
        if ($headers !== null)
            $this->attributes()['headers'] = $headers;
        else
            $this->unsetHeaders();
        return $this;
    }

    /**
     * This attribute contains a list of space-separated strings, each corresponding to the id attribute of the <th> elements that apply to this cell.
     */
    public function unsetHeaders(): static
    {
        unset($this->attributes()['headers']);
        return $this;
    }

}
