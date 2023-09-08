<?php

namespace ByJoby\HTML\Html5\TextContentTags;

use ByJoby\HTML\Tags\AbstractContainerTag;

/**
 * The <dt> HTML element specifies a term in a description or definition list,
 * and as such must be used inside a <dl> element. It is usually followed by a
 * <dd> element; however, multiple <dt> elements in a row indicate several terms
 * that are all defined by the immediate next <dd> element.
 *
 * The subsequent <dd> (Description Details) element provides the definition or
 * other related text associated with the term specified using <dt>.
 *
 * Tag description by Mozilla Contributors licensed under CC-BY-SA 2.5
 * https://developer.mozilla.org/en-US/docs/Web/HTML/Element/dt
 */
class DtTag extends AbstractContainerTag
{
    const TAG = 'dt';
}
