<?php

/**
 * HTML Object Strings
 * https://github.com/joby-lol/html-object-strings
 * (c) 2024-2026 Joby Elliott code@joby.lol
 * MIT License https://opensource.org/licenses/MIT
 */

namespace Joby\HTML\Html5\Forms\Traits;

use Joby\HTML\Helpers\BooleanAttribute;

/**
 * Provides the required attribute for form controls that support it, including <input>, <select>, and <textarea>.
 */
trait RequiredTrait
{

    /**
     * A Boolean attribute which, if present, indicates that the user must specify a value for the control before the form can be submitted.
     *
     * @return boolean
     */
    public function required(): bool
    {
        return $this->attributes()['required'] === BooleanAttribute::true;
    }

    /**
     * A Boolean attribute which, if present, indicates that the user must specify a value for the control before the form can be submitted.
     *
     * @param boolean $required
     * @return static
     */
    public function setRequired(bool $required): static
    {
        if ($required)
            $this->attributes()['required'] = BooleanAttribute::true;
        else
            unset($this->attributes()['required']);
        return $this;
    }

}
