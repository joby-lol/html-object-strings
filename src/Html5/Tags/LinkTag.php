<?php

namespace ByJoby\HTML\Html5\Tags;

use ByJoby\HTML\ContentCategories\MetadataContent;
use ByJoby\HTML\Helpers\StringableEnumArray;
use ByJoby\HTML\Html5\Enums\As_link;
use ByJoby\HTML\Html5\Enums\CrossOrigin;
use ByJoby\HTML\Html5\Enums\ReferrerPolicy_link;
use ByJoby\HTML\Html5\Enums\Rel_link;
use ByJoby\HTML\Html5\Exceptions\InvalidArgumentsException;
use ByJoby\HTML\Tags\AbstractTag;
use Stringable;

/**
 * The <link> HTML element specifies relationships between the current document
 * and an external resource. This element is most commonly used to link to
 * stylesheets, but is also used to establish site icons (both "favicon" style
 * icons and icons for the home screen and apps on mobile devices) among other
 * things. 
 *
 * Tag description by Mozilla Contributors licensed under CC-BY-SA 2.5
 * https://developer.mozilla.org/en-US/docs/Web/HTML/Element/link
 */
class LinkTag extends AbstractTag implements MetadataContent
{
    const TAG = 'link';

    /**
     * This attribute names a relationship of the linked document to the current
     * document. The attribute must be a space-separated list of link type
     * values.
     *
     * @return Rel_link[]
     */
    public function rel(): array
    {
        return $this->attributes()->asEnumArray('rel', Rel_link::class, ' ');
    }

    /**
     * This attribute names a relationship of the linked document to the current
     * document. The attribute must be a space-separated list of link type
     * values.
     *
     * If $rel is Rel_link::preload then $as must be specified
     *
     * if $as is As_link::fetch then $crossorigin must be specified
     *
     * @param null|Rel_link|array<int|string,Rel_link> $rel
     * @param null|As_link|null $as
     * @param null|CrossOrigin|null $crossorigin
     * @return static
     */
    public function setRel(null|Rel_link|array $rel, null|As_link $as = null, null|CrossOrigin $crossorigin = null): static
    {
        if (!$rel) {
            $this->unsetRel();
        } else {
            $this->attributes()->setEnumArray('rel', $rel, Rel_link::class, ' ');
            // check if new value includes Rel_link::preload and require $as if so
            $rel = $this->rel();
            if (in_array(Rel_link::preload, $rel)) {
                if (!$as) {
                    throw new InvalidArgumentsException('$as is required when $rel includes Rel_link::preload');
                }
            }
        }
        // set as if it is specified
        if ($as) {
            $this->setAs($as, $crossorigin);
        }
        return $this;
    }

    /**
     * This attribute names a relationship of the linked document to the current
     * document. The attribute must be a space-separated list of link type
     * values.
     *
     * @return static
     */
    public function unsetRel(): static
    {
        unset($this->attributes()['rel']);
        return $this;
    }

    /**
     * This attribute is required when rel="preload" has been set on the <link>
     * element, optional when rel="modulepreload" has been set, and otherwise
     * should not be used. It specifies the type of content being loaded by the
     * <link>, which is necessary for request matching, application of correct
     * content security policy, and setting of correct Accept request header. 
     *
     * @return null|As_link
     */
    public function as (): null|As_link
    {
        return $this->attributes()->asEnum('as', As_link::class);
    }

    /**
     * This attribute is required when rel="preload" has been set on the <link>
     * element, optional when rel="modulepreload" has been set, and otherwise
     * should not be used. It specifies the type of content being loaded by the
     * <link>, which is necessary for request matching, application of correct
     * content security policy, and setting of correct Accept request header. 
     *
     * if $as is As_link::fetch then $crossorigin must be specified
     *
     * @param null|As_link $as
     * @param null|CrossOrigin|null $crossorigin
     * @return static
     */
    public function setAs(null|As_link $as, null|CrossOrigin $crossorigin = null): static
    {
        if (!$as) {
            $this->unsetAs();
        } else {
            $this->attributes()['as'] = $as->value;
            // check if we just set as to As_link::fetch and require $crossorigin if so
            if ($as == As_link::fetch) {
                if (!$crossorigin) {
                    throw new InvalidArgumentsException('$crossorigin is required when $as is As_link::fetch');
                }
            }
        }
        // set crossorigin if it is specified
        if ($crossorigin) {
            $this->setCrossorigin($crossorigin);
        }
        return $this;
    }

    /**
     * This attribute is required when rel="preload" has been set on the <link>
     * element, optional when rel="modulepreload" has been set, and otherwise
     * should not be used. It specifies the type of content being loaded by the
     * <link>, which is necessary for request matching, application of correct
     * content security policy, and setting of correct Accept request header. 
     *
     * @return static
     */
    public function unsetAs(): static
    {
        unset($this->attributes()['as']);
        return $this;
    }

    /**
     * This enumerated attribute indicates whether CORS must be used when
     * fetching the resource. CORS-enabled images can be reused in the <canvas>
     * element without being tainted. The allowed values are: 
     *
     * @return null|CrossOrigin
     */
    public function crossorigin(): null|CrossOrigin
    {
        return $this->attributes()->asEnum('crossorigin', CrossOrigin::class);
    }

    /**
     * This enumerated attribute indicates whether CORS must be used when
     * fetching the resource. CORS-enabled images can be reused in the <canvas>
     * element without being tainted. The allowed values are: 
     *
     * @param null|CrossOrigin $crossorigin
     * @return static
     */
    public function setCrossorigin(null|CrossOrigin $crossorigin): static
    {
        if (!$crossorigin) {
            $this->unsetCrossorigin();
        } else {
            $this->attributes()['crossorigin'] = $crossorigin->value;
        }
        return $this;
    }

    /**
     * This enumerated attribute indicates whether CORS must be used when
     * fetching the resource. CORS-enabled images can be reused in the <canvas>
     * element without being tainted. The allowed values are: 
     *
     * @return static
     */
    public function unsetCrossorigin(): static
    {
        unset($this->attributes()['crossorigin']);
        return $this;
    }

    /**
     * This attribute specifies the URL of the linked resource. A URL can be
     * absolute or relative.
     *
     * @return null|string|Stringable
     */
    public function href(): null|string|Stringable
    {
        return $this->attributes()->asString('href');
    }

    /**
     * This attribute specifies the URL of the linked resource. A URL can be
     * absolute or relative.
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
     * This attribute specifies the URL of the linked resource. A URL can be
     * absolute or relative.
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
     * This attribute indicates the language of the linked resource. It is
     * purely advisory. Allowed values are specified by RFC 5646: Tags for
     * Identifying Languages (also known as BCP 47). Use this attribute only if
     * the href attribute is present. 
     *
     * @return null|string|Stringable
     */
    public function hreflang(): null|string|Stringable
    {
        return $this->attributes()->asString('hreflang');
    }

    /**
     * This attribute indicates the language of the linked resource. It is
     * purely advisory. Allowed values are specified by RFC 5646: Tags for
     * Identifying Languages (also known as BCP 47). Use this attribute only if
     * the href attribute is present. 
     *
     * https://datatracker.ietf.org/doc/html/rfc5646
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
     * This attribute indicates the language of the linked resource. It is
     * purely advisory. Allowed values are specified by RFC 5646: Tags for
     * Identifying Languages (also known as BCP 47). Use this attribute only if
     * the href attribute is present. 
     *
     * @return static
     */
    public function unsetHreflang(): static
    {
        unset($this->attributes()['hreflang']);
        return $this;
    }

    /**
     * For rel="preload" and as="image" only, the imagesizes attribute is a
     * sizes attribute that indicates to preload the appropriate resource used
     * by an img element with corresponding values for its srcset and sizes
     * attributes.
     *
     * @return null|string|Stringable
     */
    public function imagesizes(): null|string|Stringable
    {
        return $this->attributes()->asString('imagesizes');
    }

    /**
     * For rel="preload" and as="image" only, the imagesizes attribute is a
     * sizes attribute that indicates to preload the appropriate resource used
     * by an img element with corresponding values for its srcset and sizes
     * attributes.
     *
     * @param null|string|Stringable $imagesizes
     * @return static
     */
    public function setImagesizes(null|string|Stringable $imagesizes): static
    {
        if ($imagesizes) $this->attributes()['imagesizes'] = $imagesizes;
        else $this->unsetImagesizes();
        return $this;
    }

    /**
     * For rel="preload" and as="image" only, the imagesizes attribute is a
     * sizes attribute that indicates to preload the appropriate resource used
     * by an img element with corresponding values for its srcset and sizes
     * attributes.
     *
     * @return static
     */
    public function unsetImagesizes(): static
    {
        unset($this->attributes()['imagesizes']);
        return $this;
    }

    /**
     * For rel="preload" and as="image" only, the imagesrcset attribute is a
     * sourceset attribute that indicates to preload the appropriate resource
     * used by an img element with corresponding values for its srcset and sizes
     * attributes.
     *
     * @return null|string|Stringable
     */
    public function imagesrcset(): null|string|Stringable
    {
        return $this->attributes()->asString('imagesrcset');
    }

    /**
     * For rel="preload" and as="image" only, the imagesrcset attribute is a
     * sourceset attribute that indicates to preload the appropriate resource
     * used by an img element with corresponding values for its srcset and sizes
     * attributes.
     *
     * @param null|string|Stringable $imagesrcset
     * @return static
     */
    public function setImagesrcset(null|string|Stringable $imagesrcset): static
    {
        if ($imagesrcset) $this->attributes()['imagesrcset'] = $imagesrcset;
        else $this->unsetImagesrcset();
        return $this;
    }

    /**
     * For rel="preload" and as="image" only, the imagesrcset attribute is a
     * sourceset attribute that indicates to preload the appropriate resource
     * used by an img element with corresponding values for its srcset and sizes
     * attributes.
     *
     * @return static
     */
    public function unsetImagesrcset(): static
    {
        unset($this->attributes()['imagesrcset']);
        return $this;
    }

    /**
     * Contains inline metadata — a base64-encoded cryptographic hash of the
     * resource (file) you're telling the browser to fetch. The browser can use
     * this to verify that the fetched resource has been delivered free of
     * unexpected manipulation. See Subresource Integrity. 
     *
     * @return null|string|Stringable
     */
    public function integrity(): null|string|Stringable
    {
        return $this->attributes()->asString('integrity');
    }

    /**
     * Contains inline metadata — a base64-encoded cryptographic hash of the
     * resource (file) you're telling the browser to fetch. The browser can use
     * this to verify that the fetched resource has been delivered free of
     * unexpected manipulation. See Subresource Integrity. 
     *
     * @param null|string|Stringable $integrity
     * @return static
     */
    public function setIntegrity(null|string|Stringable $integrity): static
    {
        if ($integrity) $this->attributes()['integrity'] = $integrity;
        else $this->unsetIntegrity();
        return $this;
    }

    /**
     * Contains inline metadata — a base64-encoded cryptographic hash of the
     * resource (file) you're telling the browser to fetch. The browser can use
     * this to verify that the fetched resource has been delivered free of
     * unexpected manipulation. See Subresource Integrity. 
     *
     * @return static
     */
    public function unsetIntegrity(): static
    {
        unset($this->attributes()['integrity']);
        return $this;
    }

    /**
     * This attribute specifies the media that the linked resource applies to.
     * Its value must be a media type / media query. This attribute is mainly
     * useful when linking to external stylesheets — it allows the user agent to
     * pick the best adapted one for the device it runs on. 
     *
     * @return null|string|Stringable
     */
    public function media(): null|string|Stringable
    {
        return $this->attributes()->asString('media');
    }

    /**
     * This attribute specifies the media that the linked resource applies to.
     * Its value must be a media type / media query. This attribute is mainly
     * useful when linking to external stylesheets — it allows the user agent to
     * pick the best adapted one for the device it runs on. 
     *
     * @param null|string|Stringable $media
     * @return static
     */
    public function setMedia(null|string|Stringable $media): static
    {
        if ($media) $this->attributes()['media'] = $media;
        else $this->unsetMedia();
        return $this;
    }

    /**
     * This attribute specifies the media that the linked resource applies to.
     * Its value must be a media type / media query. This attribute is mainly
     * useful when linking to external stylesheets — it allows the user agent to
     * pick the best adapted one for the device it runs on. 
     *
     * @return static
     */
    public function unsetMedia(): static
    {
        unset($this->attributes()['media']);
        return $this;
    }

    /**
     * An enum indicating which referrer to use when fetching the resource.
     *
     * @return null|ReferrerPolicy_link
     */
    public function referrerpolicy(): null|ReferrerPolicy_link
    {
        return $this->attributes()->asEnum('referrerpolicy', ReferrerPolicy_link::class);
    }

    /**
     * An enum indicating which referrer to use when fetching the resource.
     *
     * @param null|ReferrerPolicy_link $referrerpolicy
     * @return static
     */
    public function setReferrerpolicy(null|ReferrerPolicy_link $referrerpolicy): static
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
     * This attribute is used to define the type of the content linked to. The
     * value of the attribute should be a MIME type such as text/html, text/css,
     * and so on. The common use of this attribute is to define the type of
     * stylesheet being referenced (such as text/css), but given that CSS is the
     * only stylesheet language used on the web, not only is it possible to omit
     * the type attribute, but is actually now recommended practice. It is also
     * used on rel="preload" link types, to make sure the browser only downloads
     * file types that it supports. 
     *
     * @return null|string|Stringable
     */
    public function type(): null|string|Stringable
    {
        return $this->attributes()->asString('type');
    }

    /**
     * This attribute is used to define the type of the content linked to. The
     * value of the attribute should be a MIME type such as text/html, text/css,
     * and so on. The common use of this attribute is to define the type of
     * stylesheet being referenced (such as text/css), but given that CSS is the
     * only stylesheet language used on the web, not only is it possible to omit
     * the type attribute, but is actually now recommended practice. It is also
     * used on rel="preload" link types, to make sure the browser only downloads
     * file types that it supports. 
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
     * This attribute is used to define the type of the content linked to. The
     * value of the attribute should be a MIME type such as text/html, text/css,
     * and so on. The common use of this attribute is to define the type of
     * stylesheet being referenced (such as text/css), but given that CSS is the
     * only stylesheet language used on the web, not only is it possible to omit
     * the type attribute, but is actually now recommended practice. It is also
     * used on rel="preload" link types, to make sure the browser only downloads
     * file types that it supports. 
     *
     * @return static
     */
    public function unsetType(): static
    {
        unset($this->attributes()['type']);
        return $this;
    }
}