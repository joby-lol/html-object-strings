<?php

/**
 * HTML Object Strings
 * https://github.com/joby-lol/html-object-strings
 * (c) 2024-2026 Joby Elliott code@joby.lol
 * MIT License https://opensource.org/licenses/MIT
 */

namespace Joby\HTML\Html5\Forms\ButtonTag;

/**
 * The default behavior of the button.
 *
 * Description by Mozilla Contributors licensed under CC-BY-SA 2.5
 * https://developer.mozilla.org/en-US/docs/Web/HTML/Reference/Elements/button#type
 */
enum TypeValue: string
{

    /**
     * The button submits the form data to the server. This is the default if
     * the attribute is not specified, or if it is dynamically changed to an
     * empty or invalid value.
     */
    case submit = "submit";

    /**
     * The button resets all the controls to their initial values.
     */
    case reset = "reset";

    /**
     * The button has no default behavior, and does nothing when pressed by
     * default. It can have client-side scripts listen to the element's events,
     * which are triggered when the events occur.
     */
    case button = "button";

}
