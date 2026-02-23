<?php

/**
 * HTML Object Strings
 * https://github.com/joby-lol/html-object-strings
 * (c) 2024-2026 Joby Elliott code@joby.lol
 * MIT License https://opensource.org/licenses/MIT
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
    public function setCrossorigin(null|CrossOriginValue $crossorigin): static
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
    public function unsetCrossorigin(): static
    {
        unset($this->attributes()['crossorigin']);
        return $this;
    }
}