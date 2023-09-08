<?php

namespace ByJoby\HTML\Helpers;

use ArrayAccess;
use ArrayIterator;
use BackedEnum;
use Exception;
use IteratorAggregate;
use Stringable;
use Traversable;

/**
 * Holds and validates a set of HTML attribute name/value pairs for use in tags.
 *
 * @implements ArrayAccess<string,bool|string|number|Stringable>
 * @implements IteratorAggregate<string,bool|string|number|Stringable>
 */
class Attributes implements IteratorAggregate, ArrayAccess
{
    /** @var array<string,bool|string|number|Stringable> */
    protected $array = [];
    /** @var bool */
    protected $sorted = true;
    /** @var array<mixed,string> */
    protected $disallowed = [];

    /**
     * @param null|array<string,bool|string|number|Stringable> $array
     * @param array<mixed,string> $disallowed
     * @return void
     */
    public function __construct(null|array $array = null, $disallowed = [])
    {
        $this->disallowed = $disallowed;
        if (!$array) {
            return;
        }
        foreach ($array as $key => $value) {
            $this[$key] = $value;
        }
    }

    public function offsetExists(mixed $offset): bool
    {
        $offset = static::sanitizeOffset($offset);
        return isset($this->array[$offset]);
    }

    public function offsetGet(mixed $offset): mixed
    {
        $offset = static::sanitizeOffset($offset);
        return @$this->array[$offset];
    }

    public function offsetSet(mixed $offset, mixed $value): void
    {
        if (!$offset || !trim($offset)) {
            throw new Exception('Attribute name must be specified when setting');
        }
        $offset = static::sanitizeOffset($offset);
        if (in_array($offset, $this->disallowed)) {
            throw new Exception('Setting attribute is disallowed');
        }
        if (!isset($this->array[$offset])) {
            $this->sorted = false;
        }
        $this->array[$offset] = $value;
    }

    /**
     * Set a value as a stringable enum array, automatically converting from a single enum or normal array of enums.
     *
     * @template T of BackedEnum
     * @param string $offset
     * @param null|BackedEnum|StringableEnumArray<T>|array<string|int,T> $value
     * @param class-string<T> $enum_class
     * @param string $separator
     * @return static
     */
    public function setEnumArray(string $offset, null|BackedEnum|StringableEnumArray|array $value, string $enum_class, string $separator): static
    {
        if (is_null($value)) {
            $value = [];
        }
        if ($value instanceof BackedEnum) {
            $value = [$value];
        }
        if (is_array($value)) {
            $value = new StringableEnumArray($value, ' ');
        }
        $this->offsetSet($offset, $value);
        return $this;
    }

    /**
     * Returns a given offset's value as an array of enums.
     *
     * @template T of BackedEnum
     * @param string $offset
     * @param class-string<T> $enum_class
     * @param non-empty-string $separator
     * @return array<string|int,T>
     */
    public function asEnumArray(string $offset, string $enum_class, string $separator): array
    {
        $value = strval($this->offsetGet($offset));
        $value = explode($separator, $value);
        $value = array_map(
            $enum_class::tryFrom(...),
            $value
        );
        $value = array_filter(
            $value,
            fn($e) => !empty($e)
        );
        return $value;
    }

    /**
     * Returns a given offset's value as a string, if possible.
     *
     * @param string $offset
     * @return null|string|Stringable
     */
    public function asString(string $offset): null|string|Stringable
    {
        $value = $this->offsetGet($offset);
        if ($value instanceof Stringable || is_string($value)) {
            return $value;
        } else {
            return null;
        }
    }

    /**
     * Returns a given offset's value as an integer, if possible.
     *
     * @param string $offset
     * @return null|int
     */
    public function asInt(string $offset): null|int
    {
        $value = $this->asNumber($offset);
        if (is_int($value)) {
            return $value;
        } else {
            return null;
        }
    }

    /**
     * Returns a given offset's value as a float, if possible.
     *
     * @param string $offset
     * @return null|float
     */
    public function asFloat(string $offset): null|float
    {
        $value = $this->asNumber($offset);
        if (!is_null($value)) {
            return floatval($value);
        } else {
            return null;
        }
    }

    /**
     * Returns a given offset's value as a numeric type, if possible.
     *
     * @param string $offset
     * @return null|number
     */
    public function asNumber(string $offset): null|int|float
    {
        $value = $this->offsetGet($offset);
        if (is_numeric($value)) {
            if (is_string($value)) {
                if ($value == intval($value)) {
                    $value = intval($value);
                } else {
                    $value = floatval($value);
                }
            }
            return $value;
        } else {
            return null;
        }
    }

    /**
     * Return a given offset's value as an enum of the given class, if possible.
     * 
     * @template T of BackedEnum
     * @param string $offset
     * @param class-string<T> $enum_class
     * @return null|T
     */
    public function asEnum(string $offset, string $enum_class): null|BackedEnum
    {
        $value = $this->offsetGet($offset);
        if ($value instanceof Stringable) {
            $value = $value->__toString();
        }
        if (is_string($value) || is_int($value)) {
            return $enum_class::tryFrom($value);
        } else {
            return null;
        }
    }

    public function offsetUnset(mixed $offset): void
    {
        $offset = static::sanitizeOffset($offset);
        unset($this->array[$offset]);
    }

    /**
     * @return array<string,bool|string|number|Stringable>
     */
    public function getArray(): array
    {
        if (!$this->sorted) {
            ksort($this->array);
            $this->sorted = true;
        }
        return $this->array;
    }

    public function getIterator(): Traversable
    {
        return new ArrayIterator($this->getArray());
    }

    protected static function sanitizeOffset(string $offset): string
    {
        $offset = trim($offset);
        $offset = strtolower($offset);
        if (preg_match('/[\t\n\f \/>"\'=]/', $offset)) {
            throw new Exception('Invalid character in attribute name');
        }
        return $offset;
    }
}