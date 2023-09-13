<?php

namespace ByJoby\HTML\Html5\Multimedia;

use ByJoby\HTML\Html5\Traits\HeightAndWidthTrait;
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
    use HeightAndWidthTrait;
    const TAG = "object";

    // TODO data attribute
    // TODO form attribute
    // TODO usemap attribute

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
}