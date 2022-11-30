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
        if ($classes) {
            foreach ($classes as $name => $value) {
                $this[$name] = $value;
            }
        }
    }

    public function count(): int
    {
        return count($this->styles);
    }

    public function offsetExists(mixed $offset): bool
    {
        $offset = static::normalizePropertyName($offset);
        if (!$offset) return false;
        return isset($this->styles[$offset]);
    }

    public function offsetGet(mixed $offset): mixed
    {
        return @$this->styles[$offset];
    }

    public function offsetSet(mixed $offset, mixed $value): void
    {
        $offset = static::normalizePropertyName($offset);
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
        $offset = static::normalizePropertyName($offset);
        if (!$offset) return;
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

    public static function normalizePropertyName(null|string $name): null|string
    {
        if (!$name) return null;
        $name = trim(strtolower($name));
        $name = preg_replace('/[^a-z\-]/', '', $name);
        return $name;
    }

    public static function validate(null|string $property, null|string $value): bool
    {
        $property = static::normalizePropertyName($property);
        if (!$property) return false;
        if (!preg_match('/[a-z]/', $property)) return false;

        if ($value) $value = trim($value);
        if (!$value) return false;
        if (str_contains($value, ';')) return false;
        if (str_contains($value, ':')) return false;

        return true;
    }
}
