<?php

namespace ByJoby\HTML\Helpers;

use ArrayAccess;
use ArrayIterator;
use BackedEnum;
use ByJoby\HTML\Helpers\BooleanAttribute;
use Exception;
use IteratorAggregate;
use Stringable;
use Traversable;

/**
 * Holds and validates a set of HTML attribute name/value pairs for use in tags.
 *
 * @implements ArrayAccess<string,string|number|Stringable|BooleanAttribute>
 * @implements IteratorAggregate<string,string|number|Stringable|BooleanAttribute>
 */
class Attributes implements IteratorAggregate, ArrayAccess
{
    /** @var array<string,string|number|Stringable|BooleanAttribute> */
    protected $array = [];
    /** @var bool */
    protected $sorted = true;
    /** @var array<mixed,string> */
    protected $disallowed = [];

    /**
     * @param null|array<string,string|number|Stringable|BooleanAttribute|BooleanAttribute> $array
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
     * Set a value as an array of enums, which will be internally saved as a
     * string separated by $separator. An array of Enum values can also be
     * retrieved using asEnumArray().
     *
     * @template T of BackedEnum
     * @param string $offset
     * @param null|BackedEnum|array<string|int,T> $value
     * @param class-string<T> $enum_class
     * @param string $separator
     * @return static
     */
    public function setEnumArray(string $offset, null|BackedEnum|array $value, string $enum_class, string $separator): self
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
     * Returns a given offset's value as an array of enums. Note that this
     * method always returns an array, it will simply be empty for empty
     * attributes, unset attributes, or attributes with no valid values in them.
     *
     * @template T of BackedEnum
     * @param string $offset
     * @param class-string<T> $enum_class
     * @param non-empty-string $separator
     * @return array<string|int,T>
     */
    public function asEnumArray(string $offset, string $enum_class, string $separator): array
    {
        $value = $this->offsetGet($offset);
        // short circuit if value is a boolean attribute
        if ($value instanceof BooleanAttribute) {
            return [];
        }
        // process as string
        $value = strval($value);
        $value = explode($separator, $value);
        if (!$enum_class::cases()) {
            // short-circuit if there are no cases in the enum
            return [];
        } elseif (is_string($enum_class::cases()[0]->value)) {
            // look at string values only
            $value = array_map(
                fn(string|int $e) => $enum_class::tryFrom(strval($e)),
                $value
            );
        } else {
            // look at int values only
            $value = array_map(
                fn(string|int $e) => $enum_class::tryFrom(intval($e)),
                $value
            );
        }
        // filter and return
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
        if (is_numeric($value)) {
            $value = strval($value);
        }
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
        if (is_numeric($value)) {
            return intval($value);
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
     * @return array<string,string|number|Stringable|BooleanAttribute>
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