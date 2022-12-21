<?php

namespace ByJoby\HTML\Helpers;

use ArrayIterator;
use Countable;
use Exception;
use IteratorAggregate;
use Stringable;
use Traversable;

/**
 * Holds and sorts a list of CSS classes, including validation and add/remove/contains methods.
 */
class Classes implements Countable
{
    /** @var array<int,string|Stringable> */
    protected $classes = [];
    /** @var bool */
    protected $sorted = true;

    /**
     * @param null|array<mixed,string|Stringable>|Traversable<mixed,string|Stringable> $array
     */
    public function __construct(null|array|Traversable $array = null, bool $no_exception = true)
    {
        if (!$array) {
            return;
        }
        foreach ($array as $class) {
            $this->add($class, $no_exception);
        }
    }

    public function parse(string $class_string): void
    {
        foreach (explode(' ', $class_string) as $class) {
            $class = trim($class);
            if ($class) {
                $this->add($class);
            }
        }
    }

    public function count(): int
    {
        return count($this->classes);
    }

    /**
     * @return array<int,string|Stringable>
     */
    public function getArray(): array
    {
        if (!$this->sorted) {
            sort($this->classes);
            $this->sorted = true;
        }
        return $this->classes;
    }

    public function add(string|Stringable $class, bool $no_exception = false): static
    {
        try {
            $class = static::sanitizeClassName($class, true);
        } catch (\Throwable $th) {
            if ($no_exception) {
                return $this;
            } else {
                throw $th;
            }
        }
        if (!in_array($class, $this->classes)) {
            $this->classes[] = $class;
            $this->sorted = false;
        }
        return $this;
    }

    public function remove(string|Stringable $class): static
    {
        $class = static::sanitizeClassName($class);
        $this->classes = array_values(array_filter(
            $this->classes,
            function (string|Stringable $e) use ($class): bool {
                return $e != $class;
            }
        ));
        return $this;
    }

    public function contains(string|Stringable $class): bool
    {
        $class = static::sanitizeClassName($class);
        return in_array($class, $this->classes);
    }

    protected static function sanitizeClassName(string $class, bool $validate = false): string
    {
        $class = trim($class);
        if ($validate && !preg_match('/^[_\-a-z][_\-a-z0-9]*$/i', $class)) {
            throw new Exception('Invalid class name');
        }
        return $class;
    }
}
