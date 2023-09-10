<?php

namespace ByJoby\HTML\Html5\InlineTextSemantics;

use ByJoby\HTML\Helpers\BooleanAttribute;
use ByJoby\HTML\Html5\Enums\BrowsingContext;
use ByJoby\HTML\Html5\InlineTextSemantics\ATag\ReferrerPolicyValue;
use ByJoby\HTML\Html5\InlineTextSemantics\ATag\RelValue;
use ByJoby\HTML\Html5\Traits\HyperlinkTrait;
use ByJoby\HTML\Tags\AbstractContainerTag;
use Stringable;

/**
 * The <a> HTML element (or anchor element), with its href attribute, creates a
 * hyperlink to web pages, files, email addresses, locations in the same page,
 * or anything else a URL can address.
 *
 * Tag description by Mozilla Contributors licensed under CC-BY-SA 2.5
 * https://developer.mozilla.org/en-US/docs/Web/HTML/Element/a
 */
class ATag extends AbstractContainerTag
{
    use HyperlinkTrait;
    const TAG = 'a';
}