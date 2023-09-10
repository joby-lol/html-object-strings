<?php

namespace ByJoby\HTML\Html5\Traits;
use ByJoby\HTML\Helpers\BooleanAttribute;
use ByJoby\HTML\Html5\Enums\BrowsingContext;
use ByJoby\HTML\Html5\Traits\HyperlinkTrait\ReferrerPolicyValue;
use ByJoby\HTML\Html5\Traits\HyperlinkTrait\RelValue;
use Stringable;

/**
 * Wraps up the common attribute helpers of hyperlink-ish tags, so that their
 * code can be centralized. For example, this allows less code duplication
 * between <a> and <area> tags.
 */
trait HyperlinkTrait {
    /**
     * Causes the browser to treat the linked URL as a download. Can be used
     * with or without a filename value.
     *
     * @return null|string|Stringable|BooleanAttribute::true
     */
    public function download(): null|string|Stringable|BooleanAttribute
    {
        if ($this->attributes()['download'] === BooleanAttribute::true) return BooleanAttribute::true;
        else return $this->attributes()->asString('download');
    }

    /**
     * Causes the browser to treat the linked URL as a download. Can be used
     * with or without a filename value.
     *
     * @param null|string|Stringable|BooleanAttribute $download
     * @return static
     */
    public function setDownload(null|string|Stringable|BooleanAttribute $download): self
    {
        if ($download === BooleanAttribute::true) $this->attributes()['download'] = BooleanAttribute::true;
        elseif ($download === BooleanAttribute::false) $this->unsetDownload();
        elseif ($download) $this->attributes()['download'] = $download;
        else $this->unsetDownload();
        return $this;
    }

    /**
     * Causes the browser to treat the linked URL as a download. Can be used
     * with or without a filename value.
     *
     * @return static
     */
    public function unsetDownload(): self
    {
        unset($this->attributes()['download']);
        return $this;
    }

    /**
     * The URL that the hyperlink points to. Links are not restricted to
     * HTTP-based URLs — they can use any URL scheme supported by browsers
     *
     * @return null|string|Stringable
     */
    public function href(): null|string|Stringable
    {
        return $this->attributes()->asString('href');
    }

    /**
     * The URL that the hyperlink points to. Links are not restricted to
     * HTTP-based URLs — they can use any URL scheme supported by browsers
     *
     * @param null|string|Stringable $href
     * @return static
     */
    public function setHref(null|string|Stringable $href): self
    {
        if ($href) $this->attributes()['href'] = $href;
        else $this->unsetHref();
        return $this;
    }

    /**
     * The URL that the hyperlink points to. Links are not restricted to
     * HTTP-based URLs — they can use any URL scheme supported by browsers
     *
     * @return static
     */
    public function unsetHref(): self
    {
        $this->unsetHrefLang();
        unset($this->attributes()['href']);
        return $this;
    }

    /**
     * Hints at the human language of the linked URL. No built-in functionality.
     * Allowed values are the same as the global lang attribute.
     *
     * @return null|string|Stringable
     */
    public function hreflang(): null|string|Stringable
    {
        return $this->attributes()->asString('hreflang');
    }

    /**
     * Hints at the human language of the linked URL. No built-in functionality.
     * Allowed values are the same as the global lang attribute.
     *
     * @param null|string|Stringable $hreflang
     * @return static
     */
    public function setHreflang(null|string|Stringable $hreflang): self
    {
        if ($hreflang) $this->attributes()['hreflang'] = $hreflang;
        else $this->unsetHreflang();
        return $this;
    }

    /**
     * Hints at the human language of the linked URL. No built-in functionality.
     * Allowed values are the same as the global lang attribute.
     *
     * @return static
     */
    public function unsetHreflang(): self
    {
        unset($this->attributes()['hreflang']);
        return $this;
    }

    /**
     * A space-separated list of URLs. When the link is followed, the browser
     * will send POST requests with the body PING to the URLs. Typically for
     * tracking.
     *
     * @return null|string|Stringable
     */
    public function ping(): null|string|Stringable
    {
        return $this->attributes()->asString('ping');
    }

    /**
     * A space-separated list of URLs. When the link is followed, the browser
     * will send POST requests with the body PING to the URLs. Typically for
     * tracking.
     *
     * @param null|string|Stringable $ping
     * @return static
     */
    public function setPing(null|string|Stringable $ping): self
    {
        if ($ping) $this->attributes()['ping'] = $ping;
        else $this->unsetPing();
        return $this;
    }

    /**
     * A space-separated list of URLs. When the link is followed, the browser
     * will send POST requests with the body PING to the URLs. Typically for
     * tracking.
     *
     * @return static
     */
    public function unsetPing(): self
    {
        unset($this->attributes()['ping']);
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
     * The relationship of the linked URL as space-separated link types.
     *
     * @return RelValue[]
     */
    public function rel(): array
    {
        return $this->attributes()->asEnumArray('rel', RelValue::class, ' ');
    }

    /**
     * The relationship of the linked URL as space-separated link types.
     *
     * @param null|RelValue|array<int|string,RelValue> $rel
     * @return static
     */
    public function setRel(null|RelValue|array $rel): self
    {
        if ($rel) $this->attributes()->setEnumArray('rel', $rel, RelValue::class, ' ');
        else $this->unsetRel();
        return $this;
    }

    /**
     * The relationship of the linked URL as space-separated link types.
     *
     * @return static
     */
    public function unsetRel(): self
    {
        unset($this->attributes()['rel']);
        return $this;
    }

    /**
     * Where to display the linked URL, as the name for a browsing context (a
     * tab, window, or <iframe>).
     *
     * @return null|string|Stringable|BrowsingContext
     */
    public function target(): null|string|Stringable|BrowsingContext
    {
        return $this->attributes()->asEnum('target', BrowsingContext::class)
            ?? $this->attributes()->asString('target');
    }

    /**
     * Where to display the linked URL, as the name for a browsing context (a
     * tab, window, or <iframe>).
     *
     * @param null|string|Stringable|BrowsingContext $target
     * @return static
     */
    public function setTarget(null|string|Stringable|BrowsingContext $target): self
    {
        if (!$target) {
            $this->unsetTarget();
        } elseif ($target instanceof BrowsingContext) {
            $this->attributes()['target'] = $target->value;
        } else {
            $this->attributes()['target'] = $target;
        }
        return $this;
    }

    /**
     * Where to display the linked URL, as the name for a browsing context (a
     * tab, window, or <iframe>).
     *
     * @return static
     */
    public function unsetTarget(): self
    {
        unset($this->attributes()['target']);
        return $this;
    }

    /**
     * Hints at the linked URL's format with a MIME type. No built-in
     * functionality.
     *
     * @return null|string|Stringable
     */
    public function type(): null|string|Stringable
    {
        return $this->attributes()->asString('type');
    }

    /**
     * Hints at the linked URL's format with a MIME type. No built-in
     * functionality.
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
     * Hints at the linked URL's format with a MIME type. No built-in
     * functionality.
     *
     * @return static
     */
    public function unsetType(): self
    {
        unset($this->attributes()['type']);
        return $this;
    }
}