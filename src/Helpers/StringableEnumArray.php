<?php

namespace ByJoby\HTML\Helpers;

use ArrayIterator;
use BackedEnum;
use Stringable;

/**
 * @template T of BackedEnum
 * @extends ArrayIterator<int|string,T>
 */
class StringableEnumArray extends ArrayIterator implements Stringable
{
    /**
     * @param array<int|string,T> $array
     */
    public function __construct(
        $array = [],
        protected string $separator = ', '
    ) {
        parent::__construct($array);
    }

    public function __toString()
    {
        return implode(
            $this->separator,
            array_filter(
                $this->stringValues(),
                fn($e) => !empty($e)
            )
        );
    }

    /**
     * @return array<int|string,string>
     */
    protected function stringValues(): array
    {
        return array_map(
            function ($e) {
                if ($e instanceof BackedEnum) $e = $e->value;
                return strval($e);
            },
            $this->getArrayCopy()
        );
    }
}