<?php

namespace ByJoby\HTML\Helpers;

use ArrayAccess;
use ArrayIterator;
use Exception;
use IteratorAggregate;
use Stringable;
use Traversable;

/**
 * Holds and validates a set of HTML attribute name/value pairs for use in tags.
 * 
 * @implements ArrayAccess<string,null|string|Stringable>
 * @implements IteratorAggregate<string,null|string|Stringable>
 */
class Attributes implements IteratorAggregate, ArrayAccess
{
    /** @var array<string,null|string|Stringable> */
    protected $array = [];
    /** @var bool */
    protected $sorted = true;
    /** @var array<mixed,string> */
    protected $disallowed = [];

    /**
     * @param null|array<string,null|string|Stringable> $array 
     * @param array<mixed,string> $disallowed
     * @return void 
     */
    public function __construct(null|array $array = null, $disallowed = [])
    {
        $this->disallowed = $disallowed;
        if (!$array) return;
        foreach ($array as $key => $value) {
            $this[$key] = $value;
        }
    }

    function offsetExists(mixed $offset): bool
    {
        $offset = static::sanitizeOffset($offset);
        return isset($this->array[$offset]);
    }

    function offsetGet(mixed $offset): mixed
    {
        $offset = static::sanitizeOffset($offset);
        return $this->array[$offset];
    }

    function offsetSet(mixed $offset, mixed $value): void
    {
        if (!$offset || !trim($offset)) throw new Exception('Attribute name must be specified when setting');
        $offset = static::sanitizeOffset($offset);
        if (in_array($offset, $this->disallowed)) throw new Exception('Setting attribute is disallowed');
        if (!isset($this->array[$offset])) $this->sorted = false;
        $this->array[$offset] = $value;
    }

    function offsetUnset(mixed $offset): void
    {
        $offset = static::sanitizeOffset($offset);
        unset($this->array[$offset]);
    }

    /**
     * @return array<string,null|string|Stringable>
     */
    function getArray(): array
    {
        if (!$this->sorted) {
            ksort($this->array);
            $this->sorted = true;
        }
        return $this->array;
    }

    function getIterator(): Traversable
    {
        return new ArrayIterator($this->getArray());
    }

    protected static function sanitizeOffset(string $offset): string
    {
        $offset = trim($offset);
        $offset = strtolower($offset);
        if (preg_match('/[\t\n\f \/>"\'=]/', $offset)) throw new Exception('Invalid character in attribute name');
        return $offset;
    }
}
