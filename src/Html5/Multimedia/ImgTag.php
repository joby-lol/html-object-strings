<?php

namespace ByJoby\HTML\Html5\Multimedia;

use ByJoby\HTML\Helpers\BooleanAttribute;
use ByJoby\HTML\Html5\Multimedia\ImgTag\DecodingValue;
use ByJoby\HTML\Html5\Multimedia\ImgTag\ReferrerPolicyValue;
use ByJoby\HTML\Html5\Traits\CrossOriginTrait;
use ByJoby\HTML\Tags\AbstractTag;
use Stringable;

/**
 * The <img> HTML element embeds an image into the document.
 *
 * Tag description by Mozilla Contributors licensed under CC-BY-SA 2.5
 * https://developer.mozilla.org/en-US/docs/Web/HTML/Element/img
 */
class ImgTag extends AbstractTag
{
    use CrossOriginTrait;
    const TAG = "img";

    /**
     * Defines an alternative text description of the image.
     *
     * Setting this attribute to an empty string (alt="") indicates that this
     * image is not a key part of the content (it's decoration or a tracking
     * pixel), and that non-visual browsers may omit it from rendering. Visual
     * browsers will also hide the broken image icon if the alt is empty and the
     * image failed to display.
     *
     * @return null|string|Stringable
     */
    public function alt(): null|string|Stringable
    {
        return $this->attributes()->asString('alt');
    }

    /**
     * Defines an alternative text description of the image.
     *
     * Setting this attribute to an empty string (alt="") indicates that this
     * image is not a key part of the content (it's decoration or a tracking
     * pixel), and that non-visual browsers may omit it from rendering. Visual
     * browsers will also hide the broken image icon if the alt is empty and the
     * image failed to display.
     *
     * @param null|string|Stringable $alt
     * @return self
     */
    public function setAlt(null|string|Stringable $alt): self
    {
        if (is_null($alt)) $this->unsetAlt();
        else $this->attributes()['alt'] = $alt;
        return $this;
    }

    /**
     * Defines an alternative text description of the image.
     *
     * Setting this attribute to an empty string (alt="") indicates that this
     * image is not a key part of the content (it's decoration or a tracking
     * pixel), and that non-visual browsers may omit it from rendering. Visual
     * browsers will also hide the broken image icon if the alt is empty and the
     * image failed to display.
     *
     * @return self
     */
    public function unsetAlt(): self
    {
        unset($this->attributes()['alt']);
        return $this;
    }

    /**
     * This attribute provides a hint to the browser as to whether it should
     * perform image decoding along with rendering the other DOM content in a
     * single presentation step that looks more "correct" (sync), or render and
     * present the other DOM content first and then decode the image and present
     * it later (async). In practice, async means that the next paint does not
     * wait for the image to decode.
     *
     * It is often difficult to perceive any noticeable effect when using
     * decoding on static <img> elements. They'll likely be initially rendered
     * as empty images while the image files are fetched (either from the
     * network or from the cache) and then handled independently anyway, so the
     * "syncing" of content updates is less apparent. However, the blocking of
     * rendering while decoding happens, while often quite small, can be
     * measured — even if it is difficult to observe with the human eye. See
     * What does the image decoding attribute actually do? for a more detailed
     * analysis (tunetheweb.com, 2023).
     *
     * https://www.tunetheweb.com/blog/what-does-the-image-decoding-attribute-actually-do/
     *
     * @return null|DecodingValue
     */
    public function decoding(): null|DecodingValue
    {
        return $this->attributes()->asEnum('decoding', DecodingValue::class);
    }

    /**
     * This attribute provides a hint to the browser as to whether it should
     * perform image decoding along with rendering the other DOM content in a
     * single presentation step that looks more "correct" (sync), or render and
     * present the other DOM content first and then decode the image and present
     * it later (async). In practice, async means that the next paint does not
     * wait for the image to decode.
     *
     * It is often difficult to perceive any noticeable effect when using
     * decoding on static <img> elements. They'll likely be initially rendered
     * as empty images while the image files are fetched (either from the
     * network or from the cache) and then handled independently anyway, so the
     * "syncing" of content updates is less apparent. However, the blocking of
     * rendering while decoding happens, while often quite small, can be
     * measured — even if it is difficult to observe with the human eye. See
     * What does the image decoding attribute actually do? for a more detailed
     * analysis (tunetheweb.com, 2023).
     *
     * https://www.tunetheweb.com/blog/what-does-the-image-decoding-attribute-actually-do/
     *
     * @param null|DecodingValue $decoding
     * @return self
     */
    public function setDecoding(null|DecodingValue $decoding): self
    {
        if (!$decoding) $this->unsetDecoding();
        else $this->attributes()['decoding'] = $decoding->value;
        return $this;
    }

    /**
     * This attribute provides a hint to the browser as to whether it should
     * perform image decoding along with rendering the other DOM content in a
     * single presentation step that looks more "correct" (sync), or render and
     * present the other DOM content first and then decode the image and present
     * it later (async). In practice, async means that the next paint does not
     * wait for the image to decode.
     *
     * It is often difficult to perceive any noticeable effect when using
     * decoding on static <img> elements. They'll likely be initially rendered
     * as empty images while the image files are fetched (either from the
     * network or from the cache) and then handled independently anyway, so the
     * "syncing" of content updates is less apparent. However, the blocking of
     * rendering while decoding happens, while often quite small, can be
     * measured — even if it is difficult to observe with the human eye. See
     * What does the image decoding attribute actually do? for a more detailed
     * analysis (tunetheweb.com, 2023).
     *
     * https://www.tunetheweb.com/blog/what-does-the-image-decoding-attribute-actually-do/
     *
     * @return self
     */
    public function unsetDecoding(): self
    {
        unset($this->attributes()['decoding']);
        return $this;
    }

    /**
     * The intrinsic height of the image, in pixels. Must be an integer without
     * a unit.
     *
     * @return null|integer
     */
    public function height(): null|int
    {
        return $this->attributes()->asInt('height');
    }

    /**
     * The intrinsic height of the image, in pixels. Must be an integer without
     * a unit.
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
     * The intrinsic height of the image, in pixels. Must be an integer without
     * a unit.
     *
     * @return self
     */
    public function unsetHeight(): self
    {
        unset($this->attributes()['height']);
        return $this;
    }

    /**
     * This Boolean attribute indicates that the image is part of a server-side
     * map. If so, the coordinates where the user clicked on the image are sent
     * to the server.
     *
     * https://en.wikipedia.org/wiki/Image_map#Server-side
     *
     * @return boolean
     */
    public function ismap(): bool
    {
        return $this->attributes()['ismap'] === BooleanAttribute::true;
    }

    /**
     * This Boolean attribute indicates that the image is part of a server-side
     * map. If so, the coordinates where the user clicked on the image are sent
     * to the server.
     *
     * https://en.wikipedia.org/wiki/Image_map#Server-side
     *
     * @param boolean $ismap
     * @return self
     */
    public function setIsmap(bool $ismap): self
    {
        if ($ismap) $this->attributes()['ismap'] = BooleanAttribute::true;
        else unset($this->attributes()['ismap']);
        return $this;
    }

    /**
     * Defers loading the image until it reaches a calculated distance from the
     * viewport, as defined by the browser. The intent is to avoid the network
     * and storage bandwidth needed to handle the image until it's reasonably
     * certain that it will be needed. This generally improves the performance
     * of the content in most typical use cases.
     *
     * @return boolean
     */
    public function lazy(): bool
    {
        return $this->attributes()['loading'] == 'lazy';
    }

    /**
     * Defers loading the image until it reaches a calculated distance from the
     * viewport, as defined by the browser. The intent is to avoid the network
     * and storage bandwidth needed to handle the image until it's reasonably
     * certain that it will be needed. This generally improves the performance
     * of the content in most typical use cases.
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
     * One or more strings separated by commas, indicating a set of source
     * sizes. Each source size consists of:
     *  * A media condition. This must be omitted for the last item in the list.
     *  * A source size value.
     *
     * Media Conditions describe properties of the viewport, not of the image.
     * For example, (max-height: 500px) 1000px proposes to use a source of
     * 1000px width, if the viewport is not higher than 500px.
     *
     * @return null|string|Stringable
     */
    public function sizes(): null|string|Stringable
    {
        return $this->attributes()->asString('sizes');
    }

    /**
     * One or more strings separated by commas, indicating a set of source
     * sizes. Each source size consists of:
     *  * A media condition. This must be omitted for the last item in the list.
     *  * A source size value.
     *
     * Media Conditions describe properties of the viewport, not of the image.
     * For example, (max-height: 500px) 1000px proposes to use a source of
     * 1000px width, if the viewport is not higher than 500px.
     *
     * @param null|string|Stringable $sizes
     * @return self
     */
    public function setSizes(null|string|Stringable $sizes): self
    {
        if (is_null($sizes)) $this->unsetSizes();
        else $this->attributes()['sizes'] = $sizes;
        return $this;
    }

    /**
     * One or more strings separated by commas, indicating a set of source
     * sizes. Each source size consists of:
     *  * A media condition. This must be omitted for the last item in the list.
     *  * A source size value.
     *
     * Media Conditions describe properties of the viewport, not of the image.
     * For example, (max-height: 500px) 1000px proposes to use a source of
     * 1000px width, if the viewport is not higher than 500px.
     *
     * @return self
     */
    public function unsetSizes(): self
    {
        unset($this->attributes()['sizes']);
        return $this;
    }

    /**
     * The image URL. Mandatory for the <img> element. On browsers supporting
     * srcset, src is treated like a candidate image with a pixel density
     * descriptor 1x, unless an image with this pixel density descriptor is
     * already defined in srcset, or unless srcset contains w descriptors.
     *
     * @return null|string|Stringable
     */
    public function src(): null|string|Stringable
    {
        return $this->attributes()->asString('src');
    }

    /**
     * The image URL. Mandatory for the <img> element. On browsers supporting
     * srcset, src is treated like a candidate image with a pixel density
     * descriptor 1x, unless an image with this pixel density descriptor is
     * already defined in srcset, or unless srcset contains w descriptors.
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
     * The image URL. Mandatory for the <img> element. On browsers supporting
     * srcset, src is treated like a candidate image with a pixel density
     * descriptor 1x, unless an image with this pixel density descriptor is
     * already defined in srcset, or unless srcset contains w descriptors.
     *
     * @return static
     */
    public function unsetSrc(): self
    {
        unset($this->attributes()['src']);
        return $this;
    }

    /**
     * One or more strings separated by commas, indicating possible image
     * sources for the user agent to use. Each string is composed of:
     *  * A URL to an image
     *  * Optionally, whitespace followed by one of: 
     *    * A width descriptor (a positive integer directly followed by w). The
     *      width descriptor is divided by the source size given in the sizes
     *      attribute to calculate the effective pixel density.
     *    * A pixel density descriptor (a positive floating point number
     *      directly followed by x).
     *
     * If no descriptor is specified, the source is assigned the default
     * descriptor of 1x.
     *
     * If the srcset attribute uses width descriptors, the sizes attribute must
     * also be present, or the srcset itself will be ignored.
     *
     * The user agent selects any of the available sources at its discretion.
     * This provides them with significant leeway to tailor their selection
     * based on things like user preferences or bandwidth conditions.
     *
     * https://developer.mozilla.org/en-US/docs/Learn/HTML/Multimedia_and_embedding/Responsive_images
     *
     * @return null|string|Stringable
     */
    public function srcset(): null|string|Stringable
    {
        return $this->attributes()->asString('srcset');
    }

    /**
     * One or more strings separated by commas, indicating possible image
     * sources for the user agent to use. Each string is composed of:
     *  * A URL to an image
     *  * Optionally, whitespace followed by one of: 
     *    * A width descriptor (a positive integer directly followed by w). The
     *      width descriptor is divided by the source size given in the sizes
     *      attribute to calculate the effective pixel density.
     *    * A pixel density descriptor (a positive floating point number
     *      directly followed by x).
     *
     * If no descriptor is specified, the source is assigned the default
     * descriptor of 1x.
     *
     * If the srcset attribute uses width descriptors, the sizes attribute must
     * also be present, or the srcset itself will be ignored.
     *
     * The user agent selects any of the available sources at its discretion.
     * This provides them with significant leeway to tailor their selection
     * based on things like user preferences or bandwidth conditions.
     *
     * https://developer.mozilla.org/en-US/docs/Learn/HTML/Multimedia_and_embedding/Responsive_images
     *
     * @param null|string|Stringable $srcset
     * @return static
     */
    public function setSrcset(null|string|Stringable $srcset): self
    {
        if ($srcset) $this->attributes()['srcset'] = $srcset;
        else $this->unsetSrcset();
        return $this;
    }

    /**
     * One or more strings separated by commas, indicating possible image
     * sources for the user agent to use. Each string is composed of:
     *  * A URL to an image
     *  * Optionally, whitespace followed by one of: 
     *    * A width descriptor (a positive integer directly followed by w). The
     *      width descriptor is divided by the source size given in the sizes
     *      attribute to calculate the effective pixel density.
     *    * A pixel density descriptor (a positive floating point number
     *      directly followed by x).
     *
     * If no descriptor is specified, the source is assigned the default
     * descriptor of 1x.
     *
     * If the srcset attribute uses width descriptors, the sizes attribute must
     * also be present, or the srcset itself will be ignored.
     *
     * The user agent selects any of the available sources at its discretion.
     * This provides them with significant leeway to tailor their selection
     * based on things like user preferences or bandwidth conditions.
     *
     * https://developer.mozilla.org/en-US/docs/Learn/HTML/Multimedia_and_embedding/Responsive_images
     *
     * @return static
     */
    public function unsetSrcset(): self
    {
        unset($this->attributes()['srcset']);
        return $this;
    }

    /**
     * The intrinsic width of the image in pixels. Must be an integer without a
     * unit.
     *
     * @return null|integer
     */
    public function width(): null|int
    {
        return $this->attributes()->asInt('width');
    }

    /**
     * The intrinsic width of the image in pixels. Must be an integer without a
     * unit.
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
     * The intrinsic width of the image in pixels. Must be an integer without a
     * unit.
     *
     * @return self
     */
    public function unsetWidth(): self
    {
        unset($this->attributes()['width']);
        return $this;
    }

    /**
     * The partial URL (starting with #) of an image map associated with the
     * element.
     *
     * You can also pass in a MapTag object and its name will be automatically
     * extracted and used.
     *
     * @return null|string|Stringable
     */
    public function usemap(): null|string|Stringable
    {
        return $this->attributes()->asString('usemap');
    }

    /**
     * The partial URL (starting with #) of an image map associated with the
     * element.
     *
     * You can also pass in a MapTag object and its name will be automatically
     * extracted and used.
     *
     * @param null|string|Stringable $usemap
     * @return static
     */
    public function setUsemap(null|string|Stringable|MapTag $usemap): self
    {
        if (empty($usemap)) return $this->unsetUsemap();
        if ($usemap instanceof MapTag) $usemap = $usemap->name();
        if (!str_starts_with($usemap, '#')) $usemap = '#' . $usemap;
        $this->attributes()['usemap'] = $usemap;
        return $this;
    }

    /**
     * The partial URL (starting with #) of an image map associated with the
     * element.
     *
     * You can also pass in a MapTag object and its name will be automatically
     * extracted and used.
     *
     * @return static
     */
    public function unsetUsemap(): self
    {
        unset($this->attributes()['usemap']);
        return $this;
    }
}