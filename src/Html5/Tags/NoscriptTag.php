<?php

namespace ByJoby\HTML\Html5\Tags;

use ByJoby\HTML\ContentCategories\MetadataContent;
use ByJoby\HTML\ContentCategories\PhrasingContent;
use ByJoby\HTML\DisplayTypes\DisplayContents;
use ByJoby\HTML\Tags\AbstractContentTag;

/**
 * The <noscript> HTML element defines a section of HTML to be inserted if a
 * script type on the page is unsupported or if scripting is currently turned
 * off in the browser.
 *
 * Tag description by Mozilla Contributors licensed under CC-BY-SA 2.5
 * https://developer.mozilla.org/en-US/docs/Web/HTML/Element/noscript
 */
class NoscriptTag extends AbstractContentTag implements MetadataContent, PhrasingContent, DisplayContents
{
    const TAG = 'noscript';
}
