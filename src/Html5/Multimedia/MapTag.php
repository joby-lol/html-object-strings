<?php

namespace ByJoby\HTML\Html5\Multimedia;

use ByJoby\HTML\Containers\ContainerGroup;
use ByJoby\HTML\Tags\AbstractContainerTag;
use ByJoby\HTML\Tags\AbstractGroupedTag;
use Stringable;

/**
 * The <map> HTML element is used with <area> elements to define an image map (a
 * clickable link area).
 *
 * Tag description by Mozilla Contributors licensed under CC-BY-SA 2.5
 * https://developer.mozilla.org/en-US/docs/Web/HTML/Element/map
 */
class MapTag extends AbstractGroupedTag
{
    const TAG = "map";
    /** @var int */
    protected static $autoname_counter = 0;

    /**
     * A name can be specified in the constructor. Because a name must be
     * present, if one is not specified one will be automatically generated.
     *
     * @param string|Stringable|null $name
     */
    public function __construct(string|Stringable $name = null)
    {
        $this->addGroup(ContainerGroup::ofTag('area'));
        if (!$name) $name = static::autoname();
        $this->setName($name);
    }

    /**
     * Automatically generate a name from an incrementing counter
     *
     * @return string
     */
    protected static function autoname(): string
    {
        return sprintf(
            "%s-tag--%s",
            static::TAG,
            static::$autoname_counter++
        );
    }

    /**
     * The name attribute gives the map a name so that it can be referenced. The
     * attribute must be present and must have a non-empty value with no space
     * characters. The value of the name attribute must not be equal to the
     * value of the name attribute of another <map> element in the same
     * document. If the id attribute is also specified, both attributes must
     * have the same value.
     *
     * @return string|Stringable
     */
    public function name(): string|Stringable
    {
        $name = $this->attributes()->asString('name');
        if (!$name) {
            $name = static::autoname();
            $this->setName($name);
        }
        return $name;
    }

    /**
     * The name attribute gives the map a name so that it can be referenced. The
     * attribute must be present and must have a non-empty value with no space
     * characters. The value of the name attribute must not be equal to the
     * value of the name attribute of another <map> element in the same
     * document. If the id attribute is also specified, both attributes must
     * have the same value.
     *
     * @param string|Stringable $name
     * @return self
     */
    public function setName(string|Stringable $name): self
    {
        $this->attributes()['name'] = $name;
        return $this;
    }
}