<?php

namespace ByJoby\HTML\Html5\Tags;

use ByJoby\HTML\Helpers\StringableEnumArray;
use ByJoby\HTML\Html5\Tags\MetaTag\HttpEquivValue;
use ByJoby\HTML\Html5\Tags\MetaTag\NameValue;
use ByJoby\HTML\Html5\Tags\MetaTag\RobotsValue;
use ByJoby\HTML\Tags\AbstractTag;
use Stringable;

/**
 * The <meta> HTML element represents metadata that cannot be represented by
 * other HTML meta-related elements, like <base>, <link>, <script>, <style> or
 * <title>.
 *
 * Tag description by Mozilla Contributors licensed under CC-BY-SA 2.5
 * https://developer.mozilla.org/en-US/docs/Web/HTML/Element/meta
 */
class MetaTag extends AbstractTag
{
    const TAG = 'meta';

    /**
     * The name and content attributes can be used together to provide document
     * metadata in terms of name-value pairs, with the name attribute giving the
     * metadata name, and the content attribute giving the value.
     *
     * See standard metadata names for details about the set of standard
     * metadata names defined in the HTML specification.
     * https://developer.mozilla.org/en-US/docs/Web/HTML/Element/meta/name
     *
     * @param string|Stringable|NameValue $name
     * @param string|Stringable $content
     * @return static
     */
    public function setNameAndContent(string|Stringable|NameValue $name, string|Stringable $content): self
    {
        if ($name instanceof NameValue) {
            $name = $name->value;
        }
        unset($this->attributes()['http-equiv']);
        unset($this->attributes()['charset']);
        $this->attributes['name'] = $name;
        $this->attributes['content'] = $content;
        return $this;
    }

    /**
     * Defines a pragma directive. The attribute is named http-equiv(alent)
     * because all the allowed values are names of particular HTTP headers.
     *
     * @param HttpEquivValue $name
     * @param string|Stringable $content
     * @return static
     */
    public function setHttpEquivAndContent(HttpEquivValue $name, string|Stringable $content): self
    {
        unset($this->attributes()['name']);
        unset($this->attributes()['charset']);
        $this->attributes['http-equiv'] = $name->value;
        $this->attributes['content'] = $content;
        return $this;
    }

    /**
     * The behavior that cooperative crawlers, or "robots", should use with the
     * page
     *
     * @param RobotsValue|RobotsValue[] $robots
     * @return static
     */
    public function setRobots(RobotsValue|array $robots): self
    {
        if (!is_array($robots)) {
            $robots = [$robots];
        }
        $this->setNameAndContent(
            NameValue::robots,
            new StringableEnumArray($robots, ',')
        );
        return $this;
    }

    /**
     * Whether this tag defines the character set. Output is boolean because
     * "utf-8" is the only valid value.
     *
     * @return boolean
     */
    public function charset(): bool
    {
        return isset($this->attributes()['charset']);
    }

    /**
     * This attribute contains the value for the http-equiv or name attribute,
     * depending on which is used.
     *
     * @return null|string|Stringable
     */
    public function content(): null|string|Stringable
    {
        return $this->attributes()->asString('content');
    }

    /**
     * The name and content attributes can be used together to provide document
     * metadata in terms of name-value pairs, with the name attribute giving the
     * metadata name, and the content attribute giving the value.
     *
     * @return null|string|Stringable|NameValue
     */
    public function name(): null|string|Stringable|NameValue
    {
        return $this->attributes()->asEnum('name', NameValue::class)
            ?? $this->attributes()->asString('name');
    }

    /**
     * Defines a pragma directive. The attribute is named http-equiv(alent)
     * because all the allowed values are names of particular HTTP headers.
     *
     * @return null|HttpEquivValue
     */
    public function httpEquiv(): null|HttpEquivValue
    {
        return $this->attributes()->asEnum('http-equiv', HttpEquivValue::class);
    }

    /**
     * Set whether this tag should define the character set. Option is boolean
     * because "utf-8" is the only valid value.
     *
     * @param boolean $charset
     * @return static
     */
    public function setCharset(bool $charset): self
    {
        if ($charset) {
            $this->attributes()['charset'] = 'utf-8';
            unset($this->attributes()['name']);
            unset($this->attributes()['http-equiv']);
            unset($this->attributes()['content']);
        } else {
            unset($this->attributes()['charset']);
        }
        return $this;
    }
}