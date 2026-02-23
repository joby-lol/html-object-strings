<?php

/**
 * HTML Object Strings
 * https://github.com/joby-lol/html-object-strings
 * (c) 2024-2026 Joby Elliott code@joby.lol
 * MIT License https://opensource.org/licenses/MIT
 */

namespace Joby\HTML\Html5\Traits;

trait HeightAndWidthTrait {
    /**
     * The displayed height of the resource, in CSS pixels. This must be an
     * absolute value; percentages are not allowed.
     *
     * @return null|integer
     */
    public function height(): null|int
    {
        return $this->attributes()->asInt('height');
    }

    /**
     * The displayed height of the resource, in CSS pixels. This must be an
     * absolute value; percentages are not allowed.
     *
     * @param null|integer $height
     */
    public function setHeight(null|int $height): static
    {
        if (is_int($height)) $this->attributes()['height'] = $height;
        else $this->unsetHeight();
        return $this;
    }

    /**
     * The displayed height of the resource, in CSS pixels. This must be an
     * absolute value; percentages are not allowed.
     */
    public function unsetHeight(): static
    {
        unset($this->attributes()['height']);
        return $this;
    }

    /**
     * The displayed width of the resource, in CSS pixels. This must be an
     * absolute value; percentages are not allowed.
     *
     * @return null|integer
     */
    public function width(): null|int
    {
        return $this->attributes()->asInt('width');
    }

    /**
     * The displayed width of the resource, in CSS pixels. This must be an
     * absolute value; percentages are not allowed.
     *
     * @param null|integer $width
     */
    public function setWidth(null|int $width): static
    {
        if (is_int($width)) $this->attributes()['width'] = $width;
        else $this->unsetWidth();
        return $this;
    }

    /**
     * The displayed width of the resource, in CSS pixels. This must be an
     * absolute value; percentages are not allowed.
     */
    public function unsetWidth(): static
    {
        unset($this->attributes()['width']);
        return $this;
    }
}