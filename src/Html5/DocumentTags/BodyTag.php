<?php

namespace ByJoby\HTML\Html5\DocumentTags;

use ByJoby\HTML\Containers\DocumentTags\BodyTagInterface;
use ByJoby\HTML\Tags\AbstractContainerTag;

/**
 * The <body> HTML element represents the content of an HTML document. There can
 * be only one <body> element in a document.
 *
 * Tag description by Mozilla Contributors licensed under CC-BY-SA 2.5
 * https://developer.mozilla.org/en-US/docs/Web/HTML/Element/body
 */
class BodyTag extends AbstractContainerTag implements BodyTagInterface
{
    const TAG = 'body';
}
