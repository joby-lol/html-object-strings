<?php

/**
 * Joby's HTML Object Strings: https://code.byjoby.com/html-object-strings/
 * MIT License: Copyright (c) 2024 Joby Elliott
 * 
 * Permission is hereby granted, free of charge, to any person obtaining a copy
 * of this software and associated documentation files (the "Software"), to deal
 * in the Software without restriction, including without limitation the rights
 * to use, copy, modify, merge, publish, distribute, sublicense, and/or sell
 * copies of the Software, and to permit persons to whom the Software is
 * furnished to do so, subject to the following conditions:
 * 
 * The above copyright notice and this permission notice shall be included in
 * all copies or substantial portions of the Software.
 * 
 * THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR
 * IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY,
 * FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE
 * AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER
 * LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM,
 * OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN THE 
 * SOFTWARE.
 */

namespace Joby\HTML\Helpers;

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