<?php

/**
 * HTML Object Strings
 * https://github.com/joby-lol/html-object-strings
 * (c) 2024-2026 Joby Elliott code@joby.lol
 * MIT License https://opensource.org/licenses/MIT
 */

namespace Joby\HTML\Html5\Forms;

use Joby\HTML\Html5\Forms\InputTag\TypeValue;
use Joby\HTML\Html5\Forms\Traits\FormControlTrait;
use Joby\HTML\Html5\Forms\Traits\RequiredTrait;
use Joby\HTML\Html5\Forms\Traits\ValueTrait;
use Joby\HTML\Tags\AbstractTag;
use Stringable;

/**
 * The <input> HTML element is used to create interactive controls for web-based forms in order to accept data from the user; a wide variety of types of input data and control widgets are available, depending on the device and user agent. The <input> element is one of the most powerful and complex in all of HTML due to the sheer number of combinations of input types and attributes.
 *
 * Tag description by Mozilla Contributors licensed under CC-BY-SA 2.5
 * https://developer.mozilla.org/en-US/docs/Web/HTML/Reference/Elements/input
 */
class InputTag extends AbstractTag
{

    use FormControlTrait;
    use ValueTrait;
    use RequiredTrait;

    const TAG = "input";

    public function __construct(TypeValue $type = TypeValue::text)
    {
        parent::__construct();
        $this->setType($type);
    }

    /**
     * A string specifying a name for the input control. This name is submitted along with the control's value when the form data is submitted.
     * 
     * Consider the name a required attribute (even though it's not). If an input has no name specified, or name is empty, the input's value is not submitted with the form! (Disabled controls, unchecked radio buttons, unchecked checkboxes, and reset buttons are also not sent.)
     */
    public function setName(string|Stringable|null $name): static
    {
        if ($name)
            $this->attributes()["name"] = $name;
        else
            $this->unsetName();
        return $this;
    }

    /**
     * A string specifying a name for the input control. This name is submitted along with the control's value when the form data is submitted.
     * 
     * Consider the name a required attribute (even though it's not). If an input has no name specified, or name is empty, the input's value is not submitted with the form! (Disabled controls, unchecked radio buttons, unchecked checkboxes, and reset buttons are also not sent.)
     */
    public function unsetName(): static
    {
        unset($this->attributes()["name"]);
        return $this;
    }

    /**
     * A string specifying a name for the input control. This name is submitted along with the control's value when the form data is submitted.
     * 
     * Consider the name a required attribute (even though it's not). If an input has no name specified, or name is empty, the input's value is not submitted with the form! (Disabled controls, unchecked radio buttons, unchecked checkboxes, and reset buttons are also not sent.)
     */
    public function name(): string|Stringable|null
    {
        return $this->attributes()->asString("name");
    }

    /**
     * How an <input> works varies considerably depending on the value of its type attribute, hence the different types are covered in their own separate reference pages. If this attribute is not specified, the default type adopted is text.
     */
    public function setType(TypeValue $type = TypeValue::text): static
    {
        $this->attributes()["type"] = $type->value;
        return $this;
    }

    /**
     * How an <input> works varies considerably depending on the value of its type attribute, hence the different types are covered in their own separate reference pages. If this attribute is not specified, the default type adopted is text.
     */
    public function type(): TypeValue
    {
        return $this->attributes()->asEnum("type", TypeValue::class)
            ?? TypeValue::text;
    }

}
