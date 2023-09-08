<?php

namespace ByJoby\HTML\Html5\DocumentTags;

use ByJoby\HTML\Containers\DocumentTags\DoctypeInterface;
use ByJoby\HTML\Traits\NodeTrait;

/**
 * In HTML, the doctype is the required "<!DOCTYPE html>" preamble found at the
 * top of all documents. Its sole purpose is to prevent a browser from switching
 * into so-called "quirks mode" when rendering a document; that is, the
 * "<!DOCTYPE html>" doctype ensures that the browser makes a best-effort
 * attempt at following the relevant specifications, rather than using a
 * different rendering mode that is incompatible with some specifications.
 *
 * Tag description by Mozilla Contributors licensed under CC-BY-SA 2.5
 * https://developer.mozilla.org/en-US/docs/Glossary/Doctype
 */
class Doctype implements DoctypeInterface
{
    use NodeTrait;

    public function __toString(): string
    {
        return '<!DOCTYPE html>';
    }
}
