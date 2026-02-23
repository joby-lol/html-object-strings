<?php

/**
 * HTML Object Strings
 * https://github.com/joby-lol/html-object-strings
 * (c) 2024-2026 Joby Elliott code@joby.lol
 * MIT License https://opensource.org/licenses/MIT
 */

namespace Joby\HTML\Html5\Forms;

use Joby\HTML\Html5\Forms\Traits\FormControlTrait;
use Joby\HTML\Tags\AbstractContainerTag;

/**
 * The <fieldset> HTML element is used to group several controls as well as labels within a web form.
 *
 * Tag description by Mozilla Contributors licensed under CC-BY-SA 2.5
 * https://developer.mozilla.org/en-US/docs/Web/HTML/Reference/Elements/fieldset
 */
class FieldsetTag extends AbstractContainerTag
{

    use FormControlTrait;

    const TAG = 'fieldset';

}
