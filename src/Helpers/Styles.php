<?php

namespace ByJoby\HTML\Helpers;

use ArrayAccess;
use Countable;
use Stringable;
use Traversable;

/**
 * A key difference in strategy between this class and Attributes or Classes is 
 * that it does not make significant validation attempts. CSS is an evolving
 * language, and it would be a fool's errand to try and thoroughly validate it.
 * 
 * To that end, this class is very accepting of not-obviously-malformed property
 * names and values.
 * 
 * @implements ArrayAccess<string,null|string|Stringable>
 */
class Styles implements Countable, ArrayAccess, Stringable
{
    /** @var array<string|string> */
    protected $styles = [];
    /** @var bool */
    protected $sorted = true;

    /**
     * @param null|array<string,string|Stringable>|Traversable<string,string|Stringable>|null $classes
     */
    public function __construct(null|array|Traversable $classes = null)
    {
        if (!$classes) return;
        foreach ($classes as $name => $value) {
            $this[$name] = $value;
        }
    }

    public function parse(string $css_string): void
    {
        foreach (explode(';', $css_string) as $rule) {
            $rule = explode(':', trim($rule));
            if (count($rule) == 2) $this[$rule[0]] = $rule[1];
        }
    }

    public function count(): int
    {
        return count($this->styles);
    }

    public function offsetExists(mixed $offset): bool
    {
        if (!$offset) return false;
        return isset($this->styles[$offset]);
    }

    public function offsetGet(mixed $offset): mixed
    {
        return @$this->styles[$offset];
    }

    public function offsetSet(mixed $offset, mixed $value): void
    {
        if (!$offset) return;
        if ($value) $value = trim($value);
        if (!$value) unset($this->styles[$offset]);
        else {
            if (!static::validate($offset, $value)) return;
            if (!isset($this->styles[$offset])) $this->sorted = false;
            $this->styles[$offset] = $value;
        }
    }

    public function offsetUnset(mixed $offset): void
    {
        unset($this->styles[$offset]);
    }

    /**
     * @return array<string,string>
     */
    public function getArray(): array
    {
        if (!$this->sorted) {
            ksort($this->styles);
            $this->sorted = true;
        }
        return $this->styles;
    }

    public function __toString(): string
    {
        $styles = [];
        foreach ($this->getArray() as $key => $value) {
            $styles[] = $key . ':' . $value;
        }
        return implode(';', $styles);
    }

    protected static function validate(null|string $property, null|string $value): bool
    {
        if (!$property) return false;
        elseif (!preg_match('/[a-z]/', $property)) return false;

        if ($value) $value = trim($value);
        if (!$value) return false;
        elseif (str_contains($value, ';')) return false;
        elseif (str_contains($value, ':')) return false;

        return true;
    }
}
