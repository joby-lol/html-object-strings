<?php

namespace ByJoby\HTML\Traits;

use ArrayIterator;
use ByJoby\HTML\ContainerInterface;
use ByJoby\HTML\Helpers\Attributes;
use ByJoby\HTML\Helpers\Classes;
use ByJoby\HTML\Helpers\Styles;
use ByJoby\HTML\NodeInterface;
use Exception;
use Stringable;

trait TagTrait
{
    /** @var null|string */
    protected $id;
    /** @var Attributes */
    protected $attributes;
    /** @var Classes */
    protected $classes;
    /** @var Styles */
    protected $styles;

    abstract function tag(): string;

    public function __construct()
    {
        $this->attributes = new Attributes(null, ['id', 'class', 'style']);
        $this->classes = new Classes();
        $this->styles = new Styles();
    }

    public function id(): null|string
    {
        return $this->id;
    }

    public function setID(null|string|Stringable $id): static
    {
        if ($id) $this->id = static::sanitizeID($id);
        else $this->id = null;
        return $this;
    }

    protected static function sanitizeID(string|Stringable $id): string
    {
        $id = trim($id);
        if (!preg_match('/^[_\-a-z][_\-a-z0-9]*$/i', $id)) throw new Exception('Invalid ID name');
        return $id;
    }

    public function attributes(): Attributes
    {
        return $this->attributes;
    }

    public function classes(): Classes
    {
        return $this->classes;
    }

    public function styles(): Styles
    {
        return $this->styles;
    }

    public function __toString(): string
    {
        return sprintf('<%s/>', implode(' ', $this->openingTagStrings()));
    }

    /**
     * @return array<int,string>
     */
    protected function openingTagStrings(): array
    {
        $strings = [$this->tag()];
        if ($this->id) $strings[] = sprintf('id="%s"', $this->id);
        if ($this->classes()->count()) {
            $strings[] = sprintf('class="%s"', implode(' ', $this->classes()->getArray()));
        }
        if ($this->styles()->count()) {
            $strings[] = sprintf('style="%s"', $this->styles());
        }
        foreach ($this->attributes() as $name => $value) {
            if ($value === null) $strings[] = $name;
            else $strings[] = sprintf('%s="%s"', $name, static::sanitizeAttribute($value));
        }
        return $strings;
    }

    protected static function sanitizeAttribute(string $value): string
    {
        return str_replace(
            ['<', '>', '&', '"'],
            ['&lt;', '&gt;', '&amp;', '&quot;'],
            $value
        );
    }
}
