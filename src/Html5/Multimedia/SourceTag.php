<?php

namespace ByJoby\HTML\Html5\Multimedia;

use ByJoby\HTML\Html5\Traits\HeightAndWidthTrait;
use ByJoby\HTML\Tags\AbstractTag;
use Stringable;

/**
 * The <source> HTML element specifies multiple media resources for the
 * <picture>, the <audio> element, or the <video> element. It is a void element,
 * meaning that it has no content and does not have a closing tag. It is
 * commonly used to offer the same media content in multiple file formats in
 * order to provide compatibility with a broad range of browsers given their
 * differing support for image file formats and media file formats.
 *
 * Tag description by Mozilla Contributors licensed under CC-BY-SA 2.5
 * https://developer.mozilla.org/en-US/docs/Web/HTML/Element/source
 */
class SourceTag extends AbstractTag
{
    use HeightAndWidthTrait;
    const TAG = "source";

    /**
     * The MIME media type of the image or other media type, optionally with a
     * codecs parameter.
     *
     * Example: `audio/ogg; codecs=vorbis`
     *
     * @return null|string|Stringable
     */
    public function type(): null|string|Stringable
    {
        return $this->attributes()->asString('type');
    }

    /**
     * The MIME media type of the image or other media type, optionally with a
     * codecs parameter.
     *
     * Example: `audio/ogg; codecs=vorbis`
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
     * The MIME media type of the image or other media type, optionally with a
     * codecs parameter.
     *
     * Example: `audio/ogg; codecs=vorbis`
     *
     * @return static
     */
    public function unsetType(): self
    {
        unset($this->attributes()['type']);
        return $this;
    }

    /**
     * Required if the source element's parent is an <audio> and <video>
     * element, but not allowed if the source element's parent is a <picture>
     * element.
     *
     * Address of the media resource.
     *
     * @return null|string|Stringable
     */
    public function src(): null|string|Stringable
    {
        return $this->attributes()->asString('src');
    }

    /**
     * Required if the source element's parent is an <audio> and <video>
     * element, but not allowed if the source element's parent is a <picture>
     * element.
     *
     * Address of the media resource.
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
     * Required if the source element's parent is an <audio> and <video>
     * element, but not allowed if the source element's parent is a <picture>
     * element.
     *
     * Address of the media resource.
     *
     * @return static
     */
    public function unsetSrc(): self
    {
        unset($this->attributes()['src']);
        return $this;
    }

    /**
     * Required if the source element's parent is a <picture> element, but not
     * allowed if the source element's parent is an <audio> or <video> element.
     *
     * A list of one or more strings, separated by commas, indicating a set of
     * possible images represented by the source for the browser to use. Each
     * string is composed of:
     *   * One URL specifying an image.
     *   * A width descriptor, which consists of a string containing a positive
     *     integer directly followed by "w", such as 300w. The default value, if
     *     missing, is the infinity.
     *   * A pixel density descriptor, that is a positive floating number
     *     directly followed by "x". The default value, if missing, is 1x.
     *
     * Each string in the list must have at least a width descriptor or a pixel
     * density descriptor to be valid. The two types of descriptors should not
     * be mixed together and only one should be used consistently throughout the
     * list. Among the list, the value of each descriptor must be unique. The
     * browser chooses the most adequate image to display at a given point of
     * time. If the sizes attribute is present, then a width descriptor must be
     * specified for each string. If the browser does not support srcset, then
     * src will be used for the default source.
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
     * Required if the source element's parent is a <picture> element, but not
     * allowed if the source element's parent is an <audio> or <video> element.
     *
     * A list of one or more strings, separated by commas, indicating a set of
     * possible images represented by the source for the browser to use. Each
     * string is composed of:
     *   * One URL specifying an image.
     *   * A width descriptor, which consists of a string containing a positive
     *     integer directly followed by "w", such as 300w. The default value, if
     *     missing, is the infinity.
     *   * A pixel density descriptor, that is a positive floating number
     *     directly followed by "x". The default value, if missing, is 1x.
     *
     * Each string in the list must have at least a width descriptor or a pixel
     * density descriptor to be valid. The two types of descriptors should not
     * be mixed together and only one should be used consistently throughout the
     * list. Among the list, the value of each descriptor must be unique. The
     * browser chooses the most adequate image to display at a given point of
     * time. If the sizes attribute is present, then a width descriptor must be
     * specified for each string. If the browser does not support srcset, then
     * src will be used for the default source.
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
     * Required if the source element's parent is a <picture> element, but not
     * allowed if the source element's parent is an <audio> or <video> element.
     *
     * A list of one or more strings, separated by commas, indicating a set of
     * possible images represented by the source for the browser to use. Each
     * string is composed of:
     *   * One URL specifying an image.
     *   * A width descriptor, which consists of a string containing a positive
     *     integer directly followed by "w", such as 300w. The default value, if
     *     missing, is the infinity.
     *   * A pixel density descriptor, that is a positive floating number
     *     directly followed by "x". The default value, if missing, is 1x.
     *
     * Each string in the list must have at least a width descriptor or a pixel
     * density descriptor to be valid. The two types of descriptors should not
     * be mixed together and only one should be used consistently throughout the
     * list. Among the list, the value of each descriptor must be unique. The
     * browser chooses the most adequate image to display at a given point of
     * time. If the sizes attribute is present, then a width descriptor must be
     * specified for each string. If the browser does not support srcset, then
     * src will be used for the default source.
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
     * Allowed if the source element's parent is a <picture> element, but not
     * allowed if the source element's parent is an <audio> or <video> element.
     *
     * A list of source sizes that describes the final rendered width of the
     * image represented by the source. Each source size consists of a
     * comma-separated list of media condition-length pairs. Before laying the
     * page out, the browser uses this information to determine which image is
     * defined in srcset to use. Please note that sizes will have its effect
     * only if width dimension descriptors are provided with srcset instead of
     * pixel ratio values (200w instead of 2x for example).
     *
     * @return null|string|Stringable
     */
    public function sizes(): null|string|Stringable
    {
        return $this->attributes()->asString('sizes');
    }

    /**
     * Allowed if the source element's parent is a <picture> element, but not
     * allowed if the source element's parent is an <audio> or <video> element.
     *
     * A list of source sizes that describes the final rendered width of the
     * image represented by the source. Each source size consists of a
     * comma-separated list of media condition-length pairs. Before laying the
     * page out, the browser uses this information to determine which image is
     * defined in srcset to use. Please note that sizes will have its effect
     * only if width dimension descriptors are provided with srcset instead of
     * pixel ratio values (200w instead of 2x for example).
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
     * Allowed if the source element's parent is a <picture> element, but not
     * allowed if the source element's parent is an <audio> or <video> element.
     *
     * A list of source sizes that describes the final rendered width of the
     * image represented by the source. Each source size consists of a
     * comma-separated list of media condition-length pairs. Before laying the
     * page out, the browser uses this information to determine which image is
     * defined in srcset to use. Please note that sizes will have its effect
     * only if width dimension descriptors are provided with srcset instead of
     * pixel ratio values (200w instead of 2x for example).
     *
     * @return self
     */
    public function unsetSizes(): self
    {
        unset($this->attributes()['sizes']);
        return $this;
    }

    /**
     * Allowed if the source element's parent is a <picture> element, but not
     * allowed if the source element's parent is an <audio> or <video> element.
     *
     * Media query of the resource's intended media.
     *
     * @return null|string|Stringable
     */
    public function media(): null|string|Stringable
    {
        return $this->attributes()->asString('media');
    }

    /**
     * Allowed if the source element's parent is a <picture> element, but not
     * allowed if the source element's parent is an <audio> or <video> element.
     *
     * Media query of the resource's intended media.
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
     * Allowed if the source element's parent is a <picture> element, but not
     * allowed if the source element's parent is an <audio> or <video> element.
     *
     * Media query of the resource's intended media.
     *
     * @return static
     */
    public function unsetMedia(): self
    {
        unset($this->attributes()['media']);
        return $this;
    }
}