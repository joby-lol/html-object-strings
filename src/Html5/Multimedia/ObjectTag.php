<?php

namespace ByJoby\HTML\Html5\Multimedia;

use ByJoby\HTML\Tags\AbstractTag;
use Stringable;

/**
 * The <object> HTML element represents an external resource, which can be treated as an image, a nested browsing context, or a resource to be handled by a plugin.
 *
 * Tag description by Mozilla Contributors licensed under CC-BY-SA 2.5
 * https://developer.mozilla.org/en-US/docs/Web/HTML/Element/embed
 */
class ObjectTag extends AbstractTag
{
    const TAG = "object";

    // TODO data attribute
    // TODO form attribute
    // TODO usemap attribute

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
     * The URL of the resource being embedded.
     *
     * @return null|string|Stringable
     */
    public function src(): null|string|Stringable
    {
        return $this->attributes()->asString('src');
    }

    /**
     * The URL of the resource being embedded.
     *
     * @param null|string|Stringable $src
     * @return static
     */
    public function setSrc(null|string|Stringable $src): self
    {
        if ($src) $this->attributes()['src'] = $src;
        else $this->unsetSrc();
        return $this;
    }

    /**
     * The URL of the resource being embedded.
     *
     * @return static
     */
    public function unsetSrc(): self
    {
        unset($this->attributes()['src']);
        return $this;
    }

    /**
     * The MIME type to use to select the plug-in to instantiate.
     *
     * @return null|string|Stringable
     */
    public function type(): null|string|Stringable
    {
        return $this->attributes()->asString('type');
    }

    /**
     * The MIME type to use to select the plug-in to instantiate.
     *
     * @param null|string|Stringable $type
     * @return static
     */
    public function setType(null|string|Stringable $type): self
    {
        if ($type) $this->attributes()['type'] = $type;
        else $this->unsetType();
        return $this;
    }

    /**
     * The MIME type to use to select the plug-in to instantiate.
     *
     * @return static
     */
    public function unsetType(): self
    {
        unset($this->attributes()['type']);
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