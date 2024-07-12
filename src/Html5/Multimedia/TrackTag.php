<?php

/**
 * Joby's HTML Object Strings: https://code.byjoby.com/html-object-strings/
 * MIT License: Copyright (c) 2024 Joby Elliott
 * 
 * Permission is hereby granted, free of charge, to any person obtaining a copy
 * of this software and associated documentation files (the "Software"), to deal
 * in the Software without restriction, including without limitation the rights
 * to use, copy, modify, merge, publish, distribute, sublicense, and/or sell
 * copies of the Software, and to permit persons to whom the Software is
 * furnished to do so, subject to the following conditions:
 * 
 * The above copyright notice and this permission notice shall be included in
 * all copies or substantial portions of the Software.
 * 
 * THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR
 * IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY,
 * FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE
 * AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER
 * LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM,
 * OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN THE 
 * SOFTWARE.
 */

namespace Joby\HTML\Html5\Multimedia;

use Joby\HTML\Helpers\BooleanAttribute;
use Joby\HTML\Html5\Multimedia\TrackTag\KindValue;
use Joby\HTML\Tags\AbstractTag;
use Stringable;

/**
 * The <track> HTML element is used as a child of the media elements, <audio>
 * and <video>. It lets you specify timed text tracks (or time-based data), for
 * example to automatically handle subtitles. The tracks are formatted in WebVTT
 * format (.vtt files) — Web Video Text Tracks.
 *
 * Tag description by Mozilla Contributors licensed under CC-BY-SA 2.5
 * https://developer.mozilla.org/en-US/docs/Web/HTML/Element/track
 */
class TrackTag extends AbstractTag
{
    const TAG = "track";

    /**
     * This attribute indicates that the track should be enabled unless the
     * user's preferences indicate that another track is more appropriate. This
     * may only be used on one track element per media element.
     *
     * @return boolean
     */
    public function default(): bool
    {
        return $this->attributes()['default'] === BooleanAttribute::true;
    }

    /**
     * This attribute indicates that the track should be enabled unless the
     * user's preferences indicate that another track is more appropriate. This
     * may only be used on one track element per media element.
     *
     * @param boolean $default
     * @return self
     */
    public function setDefault(bool $default): self
    {
        if ($default) $this->attributes()['default'] = BooleanAttribute::true;
        else unset($this->attributes()['default']);
        return $this;
    }

    /**
     * How the text track is meant to be used. If omitted the default kind is
     * subtitles. If the attribute contains an invalid value, it will use
     * metadata (Versions of Chrome earlier than 52 treated an invalid value as
     * subtitles). 
     *
     * @return null|KindValue
     */
    public function kind(): null|KindValue
    {
        return $this->attributes()->asEnum('kind', KindValue::class);
    }

    /**
     * How the text track is meant to be used. If omitted the default kind is
     * subtitles. If the attribute contains an invalid value, it will use
     * metadata (Versions of Chrome earlier than 52 treated an invalid value as
     * subtitles). 
     *
     * @param null|KindValue $kind
     * @return self
     */
    public function setKind(null|KindValue $kind): self
    {
        if ($kind) $this->attributes()['kind'] = $kind->value;
        else $this->unsetKind();
        return $this;
    }

    /**
     * How the text track is meant to be used. If omitted the default kind is
     * subtitles. If the attribute contains an invalid value, it will use
     * metadata (Versions of Chrome earlier than 52 treated an invalid value as
     * subtitles). 
     *
     * @return self
     */
    public function unsetKind(): self
    {
        unset($this->attributes()['kind']);
        return $this;
    }

    /**
     * A user-readable title of the text track which is used by the browser when
     * listing available text tracks.
     *
     * @return null|string|Stringable
     */
    public function label(): null|string|Stringable
    {
        return $this->attributes()->asString('label');
    }

    /**
     * A user-readable title of the text track which is used by the browser when
     * listing available text tracks.
     *
     * @param null|string|Stringable $label
     * @return static
     */
    public function setLabel(null|string|Stringable $label): self
    {
        if ($label) $this->attributes()['label'] = $label;
        else $this->unsetLabel();
        return $this;
    }

    /**
     * A user-readable title of the text track which is used by the browser when
     * listing available text tracks.
     *
     * @return static
     */
    public function unsetLabel(): self
    {
        unset($this->attributes()['label']);
        return $this;
    }

    /**
     * Address of the track (.vtt file). Must be a valid URL. This attribute
     * must be specified and its URL value must have the same origin as the
     * document — unless the <audio> or <video> parent element of the track
     * element has a crossorigin attribute.
     *
     * @return null|string|Stringable
     */
    public function src(): null|string|Stringable
    {
        return $this->attributes()->asString('src');
    }

    /**
     * Address of the track (.vtt file). Must be a valid URL. This attribute
     * must be specified and its URL value must have the same origin as the
     * document — unless the <audio> or <video> parent element of the track
     * element has a crossorigin attribute.
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
     * Address of the track (.vtt file). Must be a valid URL. This attribute
     * must be specified and its URL value must have the same origin as the
     * document — unless the <audio> or <video> parent element of the track
     * element has a crossorigin attribute.
     *
     * @return static
     */
    public function unsetSrc(): self
    {
        unset($this->attributes()['src']);
        return $this;
    }

    /**
     * Language of the track text data. It must be a valid BCP 47 language tag.
     * If the kind attribute is set to subtitles, then srclang must be defined.
     *
     * @return null|string|Stringable
     */
    public function srclang(): null|string|Stringable
    {
        return $this->attributes()->asString('srclang');
    }

    /**
     * Language of the track text data. It must be a valid BCP 47 language tag.
     * If the kind attribute is set to subtitles, then srclang must be defined.
     *
     * @param null|string|Stringable $srclang
     * @return static
     */
    public function setSrclang(null|string|Stringable $srclang): self
    {
        if ($srclang) $this->attributes()['srclang'] = $srclang;
        else $this->unsetSrclang();
        return $this;
    }

    /**
     * Language of the track text data. It must be a valid BCP 47 language tag.
     * If the kind attribute is set to subtitles, then srclang must be defined.
     *
     * @return static
     */
    public function unsetSrclang(): self
    {
        unset($this->attributes()['srclang']);
        return $this;
    }
}