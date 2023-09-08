<?php

namespace ByJoby\HTML\Traits;

use ByJoby\HTML\Helpers\Attributes;
use ByJoby\HTML\Helpers\Classes;
use ByJoby\HTML\Helpers\Styles;
use ByJoby\HTML\Html5\Enums\BooleanAttribute;
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

    abstract public function tag(): string;

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
        if ($id) {
            $this->id = static::sanitizeID($id);
        } else {
            $this->id = null;
        }
        return $this;
    }

    protected static function sanitizeID(string|Stringable $id): string
    {
        $id = trim($id);
        if (!preg_match('/^[_\-a-z][_\-a-z0-9]*$/i', $id)) {
            throw new Exception('Invalid tag ID');
        }
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
        return sprintf('<%s>', implode(' ', $this->openingTagStrings()));
    }

    /**
     * @return array<int,string>
     */
    protected function openingTagStrings(): array
    {
        $strings = [$this->tag()];
        if ($this->id) {
            $strings[] = sprintf('id="%s"', $this->id);
        }
        if ($this->classes()->count()) {
            $strings[] = sprintf('class="%s"', implode(' ', $this->classes()->getArray()));
        }
        if ($this->styles()->count()) {
            $strings[] = sprintf('style="%s"', $this->styles());
        }
        foreach ($this->attributes() as $name => $value) {
            if ($value == BooleanAttribute::false) {
                // skip over false boolean attributes
                continue;
            }elseif ($value == BooleanAttribute::true) {
                // true boolean attributes render as null
                $strings[] = $name;
            }elseif (is_string($value) || is_numeric($value) || $value instanceof Stringable) {
                $strings[] = sprintf('%s="%s"', $name, static::sanitizeAttribute(strval($value)));
            }
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
