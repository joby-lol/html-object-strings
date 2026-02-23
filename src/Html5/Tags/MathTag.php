<?php

/**
 * HTML Object Strings
 * https://github.com/joby-lol/html-object-strings
 * (c) 2024-2026 Joby Elliott code@joby.lol
 * MIT License https://opensource.org/licenses/MIT
 */

namespace Joby\HTML\Html5\Tags;

use Joby\HTML\Html5\Tags\MathTag\DisplayValue;
use Joby\HTML\Tags\AbstractContentTag;

/**
 * The <math> MathML element is the top-level MathML element, used to write a single mathematical formula. It can be placed in HTML content where flow content is permitted.
 *
 * Tag description by Mozilla Contributors licensed under CC-BY-SA 2.5
 * https://developer.mozilla.org/en-US/docs/Web/MathML/Reference/Element/math
 */
class MathTag extends AbstractContentTag
{

    const TAG = 'math';

    protected $content = '';

    public function __construct(string $content)
    {
        parent::__construct();
        $this->setContent($content);
    }

    /**
     * This enumerated attribute specifies how the enclosed MathML markup should be rendered. It can have one of the following values:
     * 
     * - block, which means that this element will be displayed in its own block outside the current span of text and with math-style set to normal.
     * - inline, which means that this element will be displayed inside the current span of text and with math-style set to compact.
     */
    public function setDisplay(null|DisplayValue $display = null): static
    {
        if ($display)
            $this->attributes()['display'] = $display->value;
        else
            $this->unsetDisplay();
        return $this;
    }

    /**
     * This enumerated attribute specifies how the enclosed MathML markup should be rendered. It can have one of the following values:
     * 
     * - block, which means that this element will be displayed in its own block outside the current span of text and with math-style set to normal.
     * - inline, which means that this element will be displayed inside the current span of text and with math-style set to compact.
     */
    public function unsetDisplay(): static
    {
        unset($this->attributes()['display']);
        return $this;
    }

    /**
     * This enumerated attribute specifies how the enclosed MathML markup should be rendered. It can have one of the following values:
     * 
     * - block, which means that this element will be displayed in its own block outside the current span of text and with math-style set to normal.
     * - inline, which means that this element will be displayed inside the current span of text and with math-style set to compact.
     */
    public function display(): DisplayValue|null
    {
        return $this->attributes()->asEnum('display', DisplayValue::class);
    }

}
