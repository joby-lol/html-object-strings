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

namespace Joby\HTML\Html5\Tags;

use Joby\HTML\Tags\AbstractContentTag;
use Stringable;

/**
 * The <style> HTML element contains style information for a document, or part
 * of a document. It contains CSS, which is applied to the contents of the
 * document containing the <style> element.
 *
 * Tag description by Mozilla Contributors licensed under CC-BY-SA 2.5
 * https://developer.mozilla.org/en-US/docs/Web/HTML/Element/style
 */
class StyleTag extends AbstractContentTag
{
    const TAG = 'style';

    /**
     * This attribute defines which media the style should be applied to. Its
     * value is a media query, which defaults to all if the attribute is
     * missing.
     *
     * @return null|string|Stringable
     */
    public function media(): null|string|Stringable
    {
        return $this->attributes()->asString('media');
    }

    /**
     * This attribute defines which media the style should be applied to. Its
     * value is a media query, which defaults to all if the attribute is
     * missing.
     *
     * @param null|string|Stringable $media
     * @return static
     */
    public function setMedia(null|string|Stringable $media): self
    {
        if ($media) $this->attributes()['media'] = $media;
        else $this->unsetMedia();
        return $this;
    }

    /**
     * This attribute defines which media the style should be applied to. Its
     * value is a media query, which defaults to all if the attribute is
     * missing.
     *
     * @return static
     */
    public function unsetMedia(): self
    {
        unset($this->attributes()['media']);
        return $this;
    }

    /**
     * A cryptographic nonce (number used once) used to allow inline styles in a
     * style-src Content-Security-Policy. The server must generate a unique
     * nonce value each time it transmits a policy. It is critical to provide a
     * nonce that cannot be guessed as bypassing a resource's policy is
     * otherwise trivial.
     *
     * https://developer.mozilla.org/en-US/docs/Web/HTTP/Headers/Content-Security-Policy/style-src
     *
     * @return null|string|Stringable
     */
    public function nonce(): null|string|Stringable
    {
        return $this->attributes()->asString('nonce');
    }

    /**
     * A cryptographic nonce (number used once) used to allow inline styles in a
     * style-src Content-Security-Policy. The server must generate a unique
     * nonce value each time it transmits a policy. It is critical to provide a
     * nonce that cannot be guessed as bypassing a resource's policy is
     * otherwise trivial.
     *
     * https://developer.mozilla.org/en-US/docs/Web/HTTP/Headers/Content-Security-Policy/style-src
     *
     * @param null|string|Stringable $nonce
     * @return static
     */
    public function setNonce(null|string|Stringable $nonce): self
    {
        if ($nonce) $this->attributes()['nonce'] = $nonce;
        else $this->unsetNonce();
        return $this;
    }

    /**
     *
     * A cryptographic nonce (number used once) used to allow inline styles in a
     * style-src Content-Security-Policy. The server must generate a unique
     * nonce value each time it transmits a policy. It is critical to provide a
     * nonce that cannot be guessed as bypassing a resource's policy is
     * otherwise trivial.
     *
     * https://developer.mozilla.org/en-US/docs/Web/HTTP/Headers/Content-Security-Policy/style-src
     *
     * @return static
     */
    public function unsetNonce(): self
    {
        unset($this->attributes()['nonce']);
        return $this;
    }
}