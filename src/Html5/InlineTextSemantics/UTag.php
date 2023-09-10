<?php

namespace ByJoby\HTML\Html5\InlineTextSemantics;

use ByJoby\HTML\Tags\AbstractContainerTag;

/**
 * The <u> HTML element represents a span of inline text which should be
 * rendered in a way that indicates that it has a non-textual annotation. This
 * is rendered by default as a simple solid underline, but may be altered using
 * CSS.
 *
 * Valid use cases for the <u> element include annotating spelling errors,
 * applying a proper name mark to denote proper names in Chinese text, and other
 * forms of annotation.
 *
 * You should not use <u> to underline text for presentation purposes, or to
 * denote titles of books.
 *
 * In most cases, you should use an element other than <u>, such as:
 *
 *  * <em> to denote stress emphasis
 *  * <b> to draw attention to text
 *  * <mark> to mark key words or phrases
 *  * <strong> to indicate that text has strong importance
 *  * <cite> to mark the titles of books or other publications
 *  * <i> to denote technical terms, transliterations, thoughts, or names of
 *    vessels in Western texts
 *
 * Tag description by Mozilla Contributors licensed under CC-BY-SA 2.5
 * https://developer.mozilla.org/en-US/docs/Web/HTML/Element/u
 */
class UTag extends AbstractContainerTag
{
    const TAG = 'u';
}