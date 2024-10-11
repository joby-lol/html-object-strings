<?php

/**
 * Joby's HTML Object Strings: https://go.joby.lol/htmlobjectstrings
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

namespace Joby\HTML\Html5\Traits;

use Joby\HTML\Html5\Traits\CrossoriginTrait\CrossOriginValue;

trait CrossOriginTrait {
    /**
     * This enumerated attribute indicates whether CORS must be used when
     * fetching the resource. CORS-enabled images can be reused in the <canvas>
     * element without being tainted. The allowed values are: 
     *
     * @return null|CrossOriginValue
     */
    public function crossorigin(): null|CrossOriginValue
    {
        return $this->attributes()->asEnum('crossorigin', CrossOriginValue::class);
    }

    /**
     * This enumerated attribute indicates whether CORS must be used when
     * fetching the resource. CORS-enabled images can be reused in the <canvas>
     * element without being tainted. The allowed values are: 
     *
     * @param null|CrossOriginValue $crossorigin
     * @return static
     */
    public function setCrossorigin(null|CrossOriginValue $crossorigin): self
    {
        if (!$crossorigin) {
            $this->unsetCrossorigin();
        } else {
            $this->attributes()['crossorigin'] = $crossorigin->value;
        }
        return $this;
    }

    /**
     * This enumerated attribute indicates whether CORS must be used when
     * fetching the resource. CORS-enabled images can be reused in the <canvas>
     * element without being tainted. The allowed values are: 
     *
     * @return static
     */
    public function unsetCrossorigin(): self
    {
        unset($this->attributes()['crossorigin']);
        return $this;
    }
}