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

namespace Joby\HTML\Traits;

use Joby\HTML\Helpers\Attributes;
use Joby\HTML\Helpers\BooleanAttribute;
use Joby\HTML\Helpers\Classes;
use Joby\HTML\Helpers\Styles;
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

    public function setID(null|string|Stringable $id): self
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
            if ($value === BooleanAttribute::false) {
                // skip over false boolean attributes
                continue;
            }elseif ($value === BooleanAttribute::true) {
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
