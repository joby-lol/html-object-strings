<?php

namespace ByJoby\HTML\Html5\InlineTextSemantics;

use ByJoby\HTML\Html5\Enums\BooleanAttribute;
use ByJoby\HTML\Html5\Enums\BrowsingContext;
use ByJoby\HTML\Html5\Enums\ReferrerPolicy_a;
use ByJoby\HTML\Html5\Enums\Rel_a;
use ByJoby\HTML\Tags\AbstractContainerTag;
use Stringable;

/**
 * The <a> HTML element (or anchor element), with its href attribute, creates a
 * hyperlink to web pages, files, email addresses, locations in the same page,
 * or anything else a URL can address.
 *
 * Tag description by Mozilla Contributors licensed under CC-BY-SA 2.5
 * https://developer.mozilla.org/en-US/docs/Web/HTML/Element/a
 */
class ATag extends AbstractContainerTag
{
    const TAG = 'a';

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
    public function setDownload(null|string|Stringable|BooleanAttribute $download): static
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
    public function unsetDownload(): static
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
    public function setHref(null|string|Stringable $href): static
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
    public function unsetHref(): static
    {
        $this->unsetHreflang();
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
    public function setHreflang(null|string|Stringable $hreflang): static
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
    public function unsetHreflang(): static
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
    public function setPing(null|string|Stringable $ping): static
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
    public function unsetPing(): static
    {
        unset($this->attributes()['ping']);
        return $this;
    }

    /**
     * An enum indicating which referrer to use when fetching the resource.
     *
     * @return null|ReferrerPolicy_a
     */
    public function referrerpolicy(): null|ReferrerPolicy_a
    {
        return $this->attributes()->asEnum('referrerpolicy', ReferrerPolicy_a::class);
    }

    /**
     * An enum indicating which referrer to use when fetching the resource.
     *
     * @param null|ReferrerPolicy_a $referrerpolicy
     * @return static
     */
    public function setReferrerpolicy(null|ReferrerPolicy_a $referrerpolicy): static
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
    public function unsetReferrerpolicy(): static
    {
        unset($this->attributes()['referrerpolicy']);
        return $this;
    }

    /**
     * The relationship of the linked URL as space-separated link types.
     *
     * @return Rel_a[]
     */
    public function rel(): array
    {
        return $this->attributes()->asEnumArray('rel', Rel_a::class, ' ');
    }

    /**
     * The relationship of the linked URL as space-separated link types.
     *
     * @param null|Rel_a|array<int|string,Rel_a> $rel
     * @return static
     */
    public function setRel(null|Rel_a|array $rel): static
    {
        if ($rel) $this->attributes()->setEnumArray('rel', $rel, Rel_a::class, ' ');
        else $this->unsetRel();
        return $this;
    }

    /**
     * The relationship of the linked URL as space-separated link types.
     *
     * @return static
     */
    public function unsetRel(): static
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
    public function setTarget(null|string|Stringable|BrowsingContext $target): static
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
    public function unsetTarget(): static
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
    public function setType(null|string|Stringable $type): static
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
    public function unsetType(): static
    {
        unset($this->attributes()['type']);
        return $this;
    }
}