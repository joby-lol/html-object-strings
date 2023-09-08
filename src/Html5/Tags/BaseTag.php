<?php

namespace ByJoby\HTML\Html5\Tags;

use ByJoby\HTML\ContentCategories\MetadataContent;
use ByJoby\HTML\Html5\Enums\BrowsingContext;
use ByJoby\HTML\Tags\AbstractTag;
use Stringable;

/**
 * The <base> HTML element specifies the base URL to use for all relative URLs
 * in a document. There can be only one <base> element in a document.
 *
 * A document's used base URL can be accessed by scripts with Node.baseURI. If
 * the document has no <base> elements, then baseURI defaults to location.href
 *
 * Tag description by Mozilla Contributors licensed under CC-BY-SA 2.5
 * https://developer.mozilla.org/en-US/docs/Web/HTML/Element/base
 */
class BaseTag extends AbstractTag implements MetadataContent
{
    const TAG = 'base';

    /**
     * The base URL to be used throughout the document for relative URLs.
     * Absolute and relative URLs are allowed. data: and javascript: URLs are
     * not allowed. 
     *
     * @return null|string
     */
    public function href(): null|string
    {
        return $this->attributes()->asString('href');
    }

    /**
     * The base URL to be used throughout the document for relative URLs.
     * Absolute and relative URLs are allowed. data: and javascript: URLs are
     * not allowed. 
     *
     * @param null|string $href
     * @return static
     */
    public function setHref(null|string $href): static
    {
        if (!$href) {
            $this->attributes()['href'] = false;
        } else {
            $this->attributes()['href'] = $href;
        }
        return $this;
    }

    /**
     * The base URL to be used throughout the document for relative URLs.
     * Absolute and relative URLs are allowed. data: and javascript: URLs are
     * not allowed. 
     *
     * @return static
     */
    public function unsetHref(): static
    {
        unset($this->attributes()['href']);
        return $this;
    }

    /**
     * A keyword or author-defined name of the default browsing context to show
     * the results of navigation from <a>, <area>, or <form> elements without
     * explicit target attributes. The following keywords have special meanings:
     *
     * @return null|string|Stringable|BrowsingContext
     */
    public function target(): null|string|Stringable|BrowsingContext
    {
        return $this->attributes()->asEnum('target', BrowsingContext::class)
            ?? $this->attributes()->asString('target');
    }

    /**
     * A keyword or author-defined name of the default browsing context to show
     * the results of navigation from <a>, <area>, or <form> elements without
     * explicit target attributes. The following keywords have special meanings:
     *
     * @param null|string|Stringable|BrowsingContext $target
     * @return static
     */
    public function setTarget(null|string|Stringable|BrowsingContext $target): static
    {
        if (!$target) {
            $this->attributes()['target'] = false;
        } elseif ($target instanceof BrowsingContext) {
            $this->attributes()['target'] = $target->value;
        } else {
            $this->attributes()['target'] = $target;
        }
        return $this;
    }

    /**
     * A keyword or author-defined name of the default browsing context to show
     * the results of navigation from <a>, <area>, or <form> elements without
     * explicit target attributes. The following keywords have special meanings:
     *
     * @return static
     */
    public function unsetTarget(): static
    {
        unset($this->attributes()['target']);
        return $this;
    }
}