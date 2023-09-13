<?php

namespace ByJoby\HTML\Html5\Traits;

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
     * @return self
     */
    public function setHeight(null|int $height): self
    {
        if (is_int($height)) $this->attributes()['height'] = $height;
        else $this->unsetHeight();
        return $this;
    }

    /**
     * The displayed height of the resource, in CSS pixels. This must be an
     * absolute value; percentages are not allowed.
     *
     * @return self
     */
    public function unsetHeight(): self
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
     * @return self
     */
    public function setWidth(null|int $width): self
    {
        if (is_int($width)) $this->attributes()['width'] = $width;
        else $this->unsetWidth();
        return $this;
    }

    /**
     * The displayed width of the resource, in CSS pixels. This must be an
     * absolute value; percentages are not allowed.
     *
     * @return self
     */
    public function unsetWidth(): self
    {
        unset($this->attributes()['width']);
        return $this;
    }
}