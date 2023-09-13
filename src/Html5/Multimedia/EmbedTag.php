<?php

namespace ByJoby\HTML\Html5\Multimedia;

use ByJoby\HTML\Html5\Traits\HeightAndWidthTrait;
use ByJoby\HTML\Tags\AbstractTag;
use Stringable;

/**
 * The <embed> HTML element embeds external content at the specified point in
 * the document. This content is provided by an external application or other
 * source of interactive content such as a browser plug-in.
 *
 * @deprecated Keep in mind that most modern browsers have deprecated and
 * removed support for browser plug-ins, so relying upon <embed> is generally
 * not wise if you want your site to be operable on the average user's browser.
 *
 * Tag description by Mozilla Contributors licensed under CC-BY-SA 2.5
 * https://developer.mozilla.org/en-US/docs/Web/HTML/Element/embed
 */
class EmbedTag extends AbstractTag
{
    use HeightAndWidthTrait;
    const TAG = "embed";

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