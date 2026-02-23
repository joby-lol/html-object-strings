<?php

/**
 * HTML Object Strings
 * https://github.com/joby-lol/html-object-strings
 * (c) 2024-2026 Joby Elliott code@joby.lol
 * MIT License https://opensource.org/licenses/MIT
 */

namespace Joby\HTML\Html5\Tags;

use Joby\HTML\Html5\Traits\HeightAndWidthTrait;
use Joby\HTML\Tags\AbstractContainerTag;

/**
 * The <canvas> HTML element with either the canvas scripting API or the WebGL API to draw graphics and animations.
 *
 * Tag description by Mozilla Contributors licensed under CC-BY-SA 2.5
 * https://developer.mozilla.org/en-US/docs/Web/HTML/Reference/Elements/canvas
 */
class CanvasTag extends AbstractContainerTag
{

    use HeightAndWidthTrait;

    const TAG = 'canvas';

}
