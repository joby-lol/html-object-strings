<?php

namespace ByJoby\HTML\Html5\Multimedia;

use ByJoby\HTML\Containers\ContainerGroup;
use ByJoby\HTML\Helpers\BooleanAttribute;
use ByJoby\HTML\Html5\Multimedia\AbstractPlaybackTag\PreloadValue;
use ByJoby\HTML\Html5\Traits\CrossOriginTrait;
use ByJoby\HTML\NodeInterface;
use ByJoby\HTML\Tags\AbstractGroupedTag;
use ByJoby\HTML\Tags\TagInterface;
use Stringable;

/**
 * The <audio> HTML element is used to embed sound or video content in
 * documents. It may contain one or more audio sources, represented using the
 * src attribute or the <source> element: the browser will choose the most
 * suitable one. It can also be the destination for streamed media, using a
 * MediaStream.
 *
 * Tag description by Mozilla Contributors licensed under CC-BY-SA 2.5
 * https://developer.mozilla.org/en-US/docs/Web/HTML/Element/audio
 * https://developer.mozilla.org/en-US/docs/Web/HTML/Element/video
 */
abstract class AbstractPlaybackTag extends AbstractGroupedTag
{
    use CrossOriginTrait;

    /** @var ContainerGroup<TagInterface> */
    protected $sources;
    /** @var ContainerGroup<TagInterface> */
    protected $tracks;
    /** @var ContainerGroup<NodeInterface> */
    protected $fallback;

    public function __construct()
    {
        $this->addGroup($this->sources = ContainerGroup::ofTag('source'));
        $this->addGroup($this->tracks = ContainerGroup::ofTag('track'));
        $this->addGroup($this->fallback = ContainerGroup::catchAll());
    }

    /**
     * Get all the <source> tags
     *
     * @return ContainerGroup<TagInterface>
     */
    public function sources(): ContainerGroup
    {
        return $this->sources;
    }

    /**
     * Get all the <track> tags
     *
     * @return ContainerGroup<TagInterface>
     */
    public function tracks(): ContainerGroup
    {
        return $this->tracks;
    }

    /**
     * Get all the fallback content (children that are not <source> or <track>
     * tags) that will display for a browser that does not support in-place
     * playback.
     *
     * @return ContainerGroup<NodeInterface>
     */
    public function fallback(): ContainerGroup
    {
        return $this->fallback;
    }

    /**
     * A Boolean attribute: if specified, the content will automatically begin
     * playback as soon as it can do so, without waiting for the entire content
     * file to finish downloading.
     *
     * @return boolean
     */
    public function autoplay(): bool
    {
        return $this->attributes()['autoplay'] === BooleanAttribute::true;
    }

    /**
     * A Boolean attribute: if specified, the content will automatically begin
     * playback as soon as it can do so, without waiting for the entire content
     * file to finish downloading.
     *
     * @param boolean $autoplay
     * @return self
     */
    public function setAutoplay(bool $autoplay): self
    {
        if ($autoplay) $this->attributes()['autoplay'] = BooleanAttribute::true;
        else unset($this->attributes()['autoplay']);
        return $this;
    }

    /**
     * If this attribute is present, the browser will offer controls to allow
     * the user to control content playback, including volume, seeking, and
     * pause/resume playback.
     *
     * @return boolean
     */
    public function controls(): bool
    {
        return $this->attributes()['controls'] === BooleanAttribute::true;
    }

    /**
     * If this attribute is present, the browser will offer controls to allow
     * the user to control content playback, including volume, seeking, and
     * pause/resume playback.
     *
     * @param boolean $controls
     * @return self
     */
    public function setControls(bool $controls): self
    {
        if ($controls) $this->attributes()['controls'] = BooleanAttribute::true;
        else unset($this->attributes()['controls']);
        return $this;
    }

    /**
     * A Boolean attribute: if specified, the player will automatically seek
     * back to the start upon reaching the end of the content.
     *
     * @return boolean
     */
    public function loop(): bool
    {
        return $this->attributes()['loop'] === BooleanAttribute::true;
    }

    /**
     * A Boolean attribute: if specified, the player will automatically seek
     * back to the start upon reaching the end of the content.
     *
     * @param boolean $loop
     * @return self
     */
    public function setLoop(bool $loop): self
    {
        if ($loop) $this->attributes()['loop'] = BooleanAttribute::true;
        else unset($this->attributes()['loop']);
        return $this;
    }

    /**
     * A Boolean attribute that indicates whether the player will be initially
     * silenced. Its default value is false.
     *
     * @return boolean
     */
    public function muted(): bool
    {
        return $this->attributes()['muted'] === BooleanAttribute::true;
    }

    /**
     * A Boolean attribute that indicates whether the player will be initially
     * silenced. Its default value is false.
     *
     * @param boolean $muted
     * @return self
     */
    public function setMuted(bool $muted): self
    {
        if ($muted) $this->attributes()['muted'] = BooleanAttribute::true;
        else unset($this->attributes()['muted']);
        return $this;
    }

    /**
     * The URL of the content to embed. This is subject to HTTP access controls.
     * This is optional; you may instead use the <source> element within the tag
     * to specify the file to embed.
     *
     * @return null|string|Stringable
     */
    public function src(): null|string|Stringable
    {
        return $this->attributes()->asString('src');
    }

    /**
     * The URL of the content to embed. This is subject to HTTP access controls.
     * This is optional; you may instead use the <source> element within the tag
     * to specify the file to embed.
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
     * The URL of the content to embed. This is subject to HTTP access controls.
     * This is optional; you may instead use the <source> element within the tag
     * to specify the file to embed.
     *
     * @return static
     */
    public function unsetSrc(): self
    {
        unset($this->attributes()['src']);
        return $this;
    }

    /**
     * This enumerated attribute is intended to provide a hint to the browser
     * about what the author thinks will lead to the best user experience.
     *
     * The default value is different for each browser. The spec advises it to
     * be set to metadata.
     *
     * @return null|PreloadValue
     */
    public function preload(): null|PreloadValue
    {
        return $this->attributes()->asEnum('preload', PreloadValue::class);
    }

    /**
     * This enumerated attribute is intended to provide a hint to the browser
     * about what the author thinks will lead to the best user experience.
     *
     * The default value is different for each browser. The spec advises it to
     * be set to metadata.
     *
     * @param null|PreloadValue $preload
     * @return self
     */
    public function setPreload(null|PreloadValue $preload): self
    {
        if ($preload) $this->attributes()['preload'] = $preload->value;
        else $this->unsetPreload();
        return $this;
    }

    /**
     * This enumerated attribute is intended to provide a hint to the browser
     * about what the author thinks will lead to the best user experience.
     *
     * The default value is different for each browser. The spec advises it to
     * be set to metadata.
     *
     * @return self
     */
    public function unsetPreload(): self
    {
        unset($this->attributes()['preload']);
        return $this;
    }
}