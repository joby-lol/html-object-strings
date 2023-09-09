<?php

namespace ByJoby\HTML\Html5\Tags;

use ByJoby\HTML\Helpers\StringableEnumArray;
use ByJoby\HTML\Html5\Enums\HttpEquiv_meta;
use ByJoby\HTML\Html5\Enums\Name_meta;
use ByJoby\HTML\Html5\Enums\Robots_meta;
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
     * @param string|Stringable|Name_meta $name
     * @param string|Stringable $content
     * @return static
     */
    public function setNameAndContent(string|Stringable|Name_meta $name, string|Stringable $content): static
    {
        if ($name instanceof Name_meta) {
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
     * @param HttpEquiv_meta $name
     * @param string|Stringable $content
     * @return static
     */
    public function setHttpEquivAndContent(HttpEquiv_meta $name, string|Stringable $content): static
    {
        unset($this->attributes()['name']);
        unset($this->attributes()['charset']);
        $this->attributes['http-equiv'] = $name->value;
        $this->attributes['content'] = $content;
        return $this;
    }

    /**
     * he behavior that cooperative crawlers, or "robots", should use with the page
     *
     * @param Robots_meta|Robots_meta[] $robots
     * @return static
     */
    public function setRobots(Robots_meta|array $robots): static
    {
        if (!is_array($robots)) {
            $robots = [$robots];
        }
        $this->setNameAndContent(
            Name_meta::robots,
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
     * @return null|string|Stringable|Name_meta
     */
    public function name(): null|string|Stringable|Name_meta
    {
        return $this->attributes()->asEnum('name', Name_meta::class)
            ?? $this->attributes()->asString('name');
    }

    /**
     * Defines a pragma directive. The attribute is named http-equiv(alent)
     * because all the allowed values are names of particular HTTP headers.
     *
     * @return null|HttpEquiv_meta
     */
    public function httpEquiv(): null|HttpEquiv_meta
    {
        return $this->attributes()->asEnum('http-equiv', HttpEquiv_meta::class);
    }

    /**
     * Set whether this tag should define the character set. Option is boolean
     * because "utf-8" is the only valid value.
     *
     * @param boolean $charset
     * @return static
     */
    public function setCharset(bool $charset): static
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