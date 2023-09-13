<?php

namespace ByJoby\HTML\Html5\Multimedia;

use ByJoby\HTML\Helpers\BooleanAttribute;
use ByJoby\HTML\Html5\Traits\HeightAndWidthTrait;
use Stringable;

/**
 * The <video> HTML element embeds a media player which supports video playback
 * into the document. You can use <video> for audio content as well, but the
 * <audio> element may provide a more appropriate user experience.
 *
 * Tag description by Mozilla Contributors licensed under CC-BY-SA 2.5
 * https://developer.mozilla.org/en-US/docs/Web/HTML/Element/video
 */
class VideoTag extends AbstractPlaybackTag
{
    use HeightAndWidthTrait;
    const TAG = 'video';

    /**
     * A Boolean attribute indicating that the video is to be played "inline",
     * that is within the element's playback area. Note that the absence of this
     * attribute does not imply that the video will always be played in
     * fullscreen.
     *
     * @return boolean
     */
    public function playsinline(): bool
    {
        return $this->attributes()['playsinline'] === BooleanAttribute::true;
    }

    /**
     * A Boolean attribute indicating that the video is to be played "inline",
     * that is within the element's playback area. Note that the absence of this
     * attribute does not imply that the video will always be played in
     * fullscreen.
     *
     * @param boolean $playsinline
     * @return self
     */
    public function setPlaysinline(bool $playsinline): self
    {
        if ($playsinline) $this->attributes()['playslinline'] = BooleanAttribute::true;
        else unset($this->attributes()['playsinline']);
        return $this;
    }

    /**
     * A URL for an image to be shown while the video is downloading. If this
     * attribute isn't specified, nothing is displayed until the first frame is
     * available, then the first frame is shown as the poster frame.
     *
     * @return null|string|Stringable
     */
    public function poster(): null|string|Stringable
    {
        return $this->attributes()->asString('poster');
    }

    /**
     * A URL for an image to be shown while the video is downloading. If this
     * attribute isn't specified, nothing is displayed until the first frame is
     * available, then the first frame is shown as the poster frame.
     *
     * @param null|string|Stringable $poster
     * @return self
     */
    public function setPoster(null|string|Stringable $poster): self
    {
        if ($poster) $this->attributes()['poster'] = $poster;
        else $this->unsetPoster();
        return $this;
    }

    /**
     * A URL for an image to be shown while the video is downloading. If this
     * attribute isn't specified, nothing is displayed until the first frame is
     * available, then the first frame is shown as the poster frame.
     *
     * @return self
     */
    public function unsetPoster(): self
    {
        unset($this->attributes()['poster']);
        return $this;
    }
}