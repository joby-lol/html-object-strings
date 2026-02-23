<?php

/**
 * HTML Object Strings
 * https://github.com/joby-lol/html-object-strings
 * (c) 2024-2026 Joby Elliott code@joby.lol
 * MIT License https://opensource.org/licenses/MIT
 */

namespace Joby\HTML\Html5\Tags;

use Joby\HTML\Tags\AbstractContainerTag;

/**
 * The <hgroup> element allows the grouping of a heading with any secondary
 * content, such as subheadings, an alternative title, or tagline. Each of these
 * types of content represented as a <p> element within the <hgroup>.
 *
 * Tag description by Mozilla Contributors licensed under CC-BY-SA 2.5
 * https://developer.mozilla.org/en-US/docs/Web/HTML/Element/hgroup
 */
class HgroupTag extends AbstractContainerTag
{
    const TAG = 'hgroup';
}