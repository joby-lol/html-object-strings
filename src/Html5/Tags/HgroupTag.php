<?php

namespace ByJoby\HTML\Html5\Tags;

use ByJoby\HTML\ContentCategories\HeadingContent;
use ByJoby\HTML\DisplayTypes\DisplayBlock;
use ByJoby\HTML\Tags\AbstractContainerTag;

/**
 * The <hgroup> element allows the grouping of a heading with any secondary
 * content, such as subheadings, an alternative title, or tagline. Each of these
 * types of content represented as a <p> element within the <hgroup>.
 *
 * Tag description by Mozilla Contributors licensed under CC-BY-SA 2.5
 * https://developer.mozilla.org/en-US/docs/Web/HTML/Element/hgroup
 */
class HgroupTag extends AbstractContainerTag implements DisplayBlock, HeadingContent
{
    const TAG = 'hgroup';
}