<?php

namespace ByJoby\HTML\Html5\Multimedia;

use ByJoby\HTML\Helpers\StringableEnumArray;
use ByJoby\HTML\Html5\Multimedia\IframeTag\ReferrerPolicyValue;
use ByJoby\HTML\Html5\Multimedia\IframeTag\SandboxValue;
use ByJoby\HTML\Tags\AbstractTag;
use Stringable;

/**
 * The <embed> HTML element embeds external content at the specified point in
 * the document. This content is provided by an external application or other
 * source of interactive content such as a browser plug-in.
 *
 * Keep in mind that most modern browsers have deprecated and removed support
 * for browser plug-ins, so relying upon <embed> is generally not wise if you
 * want your site to be operable on the average user's browser.
 *
 * Tag description by Mozilla Contributors licensed under CC-BY-SA 2.5
 * https://developer.mozilla.org/en-US/docs/Web/HTML/Element/iframe
 */
class IframeTag extends AbstractTag
{
    const TAG = "embed";

    /**
     * Specifies a Permissions Policy for the <iframe>. The policy defines what
     * features are available to the <iframe> (for example, access to the
     * microphone, camera, battery, web-share, etc.) based on the origin of the
     * request.
     *
     * https://developer.mozilla.org/en-US/docs/Web/HTTP/Permissions_Policy
     *
     * @return null|string|Stringable
     */
    public function allow(): null|string|Stringable
    {
        return $this->attributes()->asString('allow');
    }

    /**
     * Specifies a Permissions Policy for the <iframe>. The policy defines what
     * features are available to the <iframe> (for example, access to the
     * microphone, camera, battery, web-share, etc.) based on the origin of the
     * request.
     *
     * https://developer.mozilla.org/en-US/docs/Web/HTTP/Permissions_Policy
     *
     * @param null|string|Stringable $allow
     * @return static
     */
    public function setAllow(null|string|Stringable $allow): self
    {
        if ($allow) $this->attributes()['allow'] = $allow;
        else $this->unsetAllow();
        return $this;
    }

    /**
     * Specifies a Permissions Policy for the <iframe>. The policy defines what
     * features are available to the <iframe> (for example, access to the
     * microphone, camera, battery, web-share, etc.) based on the origin of the
     * request.
     *
     * https://developer.mozilla.org/en-US/docs/Web/HTTP/Permissions_Policy
     *
     * @return static
     */
    public function unsetAllow(): self
    {
        unset($this->attributes()['allow']);
        return $this;
    }

    /**
     * Defer loading of the iframe until it reaches a calculated distance from
     * the viewport, as defined by the browser.
     *
     * @return boolean
     */
    public function lazy(): bool
    {
        return $this->attributes()['loading'] == 'lazy';
    }

    /**
     * Defer loading of the iframe until it reaches a calculated distance from
     * the viewport, as defined by the browser.
     *
     * @param boolean $lazy
     * @return self
     */
    public function setLazy(bool $lazy): self
    {
        if ($lazy) $this->attributes()['loading'] = 'lazy';
        else unset($this->attributes()['lazy']);
        return $this;
    }

    /**
     * A targetable name for the embedded browsing context. This can be used in
     * the target attribute of the <a>, <form>, or <base> elements; the
     * formtarget attribute of the <input> or <button> elements; or the
     * windowName parameter in the window.open() method.
     *
     * @return null|string|Stringable
     */
    public function name(): null|string|Stringable
    {
        return $this->attributes()->asString('name');
    }

    /**
     * A targetable name for the embedded browsing context. This can be used in
     * the target attribute of the <a>, <form>, or <base> elements; the
     * formtarget attribute of the <input> or <button> elements; or the
     * windowName parameter in the window.open() method.
     *
     * @param null|string|Stringable $name
     * @return static
     */
    public function setName(null|string|Stringable $name): self
    {
        if ($name) $this->attributes()['name'] = $name;
        else $this->unsetName();
        return $this;
    }

    /**
     * A targetable name for the embedded browsing context. This can be used in
     * the target attribute of the <a>, <form>, or <base> elements; the
     * formtarget attribute of the <input> or <button> elements; or the
     * windowName parameter in the window.open() method.
     *
     * @return static
     */
    public function unsetName(): self
    {
        unset($this->attributes()['name']);
        return $this;
    }

    /**
     * An enum indicating which referrer to use when fetching the resource.
     *
     * @return null|ReferrerPolicyValue
     */
    public function referrerpolicy(): null|ReferrerPolicyValue
    {
        return $this->attributes()->asEnum('referrerpolicy', ReferrerPolicyValue::class);
    }

    /**
     * An enum indicating which referrer to use when fetching the resource.
     *
     * @param null|ReferrerPolicyValue $referrerpolicy
     * @return static
     */
    public function setReferrerpolicy(null|ReferrerPolicyValue $referrerpolicy): self
    {
        if ($referrerpolicy) $this->attributes()['referrerpolicy'] = $referrerpolicy->value;
        else $this->unsetReferrerpolicy();
        return $this;
    }

    /**
     * An enum indicating which referrer to use when fetching the resource.
     *
     * @return static
     */
    public function unsetReferrerpolicy(): self
    {
        unset($this->attributes()['referrerpolicy']);
        return $this;
    }

    /**
     * Controls the restrictions applied to the content embedded in the
     * <iframe>. The value of the attribute can either be empty to apply all
     * restrictions, or space-separated tokens to lift particular restrictions:
     *
     * @return null|array<int|string,SandboxValue>
     */
    public function sandbox(): null|array {
        // TODO test retrieving various possible values
        if (!$this->attributes()->asString('sandbox')) return null;
        else return $this->attributes()->asEnumArray('sandbox',SandboxValue::class,' ');
    }

    /**
     * Controls the restrictions applied to the content embedded in the
     * <iframe>. The value of the attribute can either be empty to apply all
     * restrictions, or space-separated tokens to lift particular restrictions:
     *
     * @param null|SandboxValue|array<int|string,SandboxValue> $sandbox
     * @return static
     */
    public function setSandbox(null|SandboxValue|array $sandbox): self
    {
        // TODO test the ways this can be set
        if (is_null($sandbox)) $this->unsetSandbox();
        else {
            if ($sandbox instanceof SandboxValue) $sandbox = [$sandbox];
            if (count($sandbox) === 0) $sandbox = [SandboxValue::denyAll];
            $this->attributes()['sandbox'] = new StringableEnumArray($sandbox, ' ');
        }
        return $this;
    }

    /**
     * Controls the restrictions applied to the content embedded in the
     * <iframe>. The value of the attribute can either be empty to apply all
     * restrictions, or space-separated tokens to lift particular restrictions:
     *
     * @return self
     */
    public function unsetSandbox(): self
    {
        unset($this->attributes()['sandbox']);
        return $this;
    }

    /**
     * The height of the frame in CSS pixels. Default is 150.
     *
     * @return null|integer
     */
    public function height(): null|int
    {
        return $this->attributes()->asInt('height');
    }

    /**
     * The height of the frame in CSS pixels. Default is 150.
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
     * The height of the frame in CSS pixels. Default is 150.
     *
     * @return self
     */
    public function unsetHeight(): self
    {
        unset($this->attributes()['height']);
        return $this;
    }

    /**
     * The URL of the page to embed. Use a value of about:blank to embed an
     * empty page that conforms to the same-origin policy. Also note that
     * programmatically removing an <iframe>'s src attribute (e.g. via
     * Element.removeAttribute()) causes about:blank to be loaded in the frame
     * in Firefox (from version 65), Chromium-based browsers, and Safari/iOS.
     *
     * @return null|string|Stringable
     */
    public function src(): null|string|Stringable
    {
        return $this->attributes()->asString('src');
    }

    /**
     * The URL of the page to embed. Use a value of about:blank to embed an
     * empty page that conforms to the same-origin policy. Also note that
     * programmatically removing an <iframe>'s src attribute (e.g. via
     * Element.removeAttribute()) causes about:blank to be loaded in the frame
     * in Firefox (from version 65), Chromium-based browsers, and Safari/iOS.
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
     * The URL of the page to embed. Use a value of about:blank to embed an
     * empty page that conforms to the same-origin policy. Also note that
     * programmatically removing an <iframe>'s src attribute (e.g. via
     * Element.removeAttribute()) causes about:blank to be loaded in the frame
     * in Firefox (from version 65), Chromium-based browsers, and Safari/iOS.
     *
     * @return static
     */
    public function unsetSrc(): self
    {
        unset($this->attributes()['src']);
        return $this;
    }

    /**
     * Inline HTML to embed, overriding the src attribute. If a browser does not
     * support the srcdoc attribute, it will fall back to the URL in the src
     * attribute.
     *
     * @return null|string|Stringable
     */
    public function srcdoc(): null|string|Stringable
    {
        return $this->attributes()->asString('srcdoc');
    }

    /**
     * Inline HTML to embed, overriding the src attribute. If a browser does not
     * support the srcdoc attribute, it will fall back to the URL in the src
     * attribute.
     *
     * @param null|string|Stringable $srcdoc
     * @return static
     */
    public function setSrcdoc(null|string|Stringable $srcdoc): self
    {
        if ($srcdoc) $this->attributes()['srcdoc'] = $srcdoc;
        else $this->unsetSrcdoc();
        return $this;
    }

    /**
     * Inline HTML to embed, overriding the src attribute. If a browser does not
     * support the srcdoc attribute, it will fall back to the URL in the src
     * attribute.
     *
     * @return static
     */
    public function unsetSrcdoc(): self
    {
        unset($this->attributes()['srcdoc']);
        return $this;
    }

    /**
     * The width of the frame in CSS pixels. Default is 300.
     *
     * @return null|integer
     */
    public function width(): null|int
    {
        return $this->attributes()->asInt('width');
    }

    /**
     * The width of the frame in CSS pixels. Default is 300.
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
     * The width of the frame in CSS pixels. Default is 300.
     *
     * @return self
     */
    public function unsetWidth(): self
    {
        unset($this->attributes()['width']);
        return $this;
    }
}