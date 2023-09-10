<?php

namespace ByJoby\HTML\Html5\InlineTextSemantics;

use ByJoby\HTML\Tags\AbstractContainerTag;

/**
 * The <var> HTML element represents the name of a variable in a mathematical
 * expression or a programming context. It's typically presented using an
 * italicized version of the current typeface, although that behavior is
 * browser-dependent.
 *
 * Here's a simple example, using <var> to denote variable names in a
 * mathematical equation.
 *
 * ```
 * <p>A simple equation: <var>x</var> = <var>y</var> + 2</p>
 * ```
 *
 * Tag description by Mozilla Contributors licensed under CC-BY-SA 2.5
 * https://developer.mozilla.org/en-US/docs/Web/HTML/Element/u
 */
class VarTag extends AbstractContainerTag
{
    const TAG = 'var';
}