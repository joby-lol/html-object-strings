<?php

namespace ByJoby\HTML\Html5\Traits;

use ByJoby\HTML\Html5\Traits\CrossoriginTrait\CrossOriginValue;

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