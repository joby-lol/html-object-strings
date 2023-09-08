<?php

namespace ByJoby\HTML\Html5\Enums;

/**
 * The translate global attribute is an enumerated attribute that is used to
 * specify whether an element's translatable attribute values and its Text node
 * children should be translated when the page is localized, or whether to leave
 * them unchanged.
 *
 * Description by Mozilla Contributors licensed under CC-BY-SA 2.5
 * https://developer.mozilla.org/en-US/docs/Web/HTML/Global_attributes/translate
 */
enum Translate: string
{
    case true = "yes";
    case false = "no";
}