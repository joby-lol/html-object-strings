<?php

namespace ByJoby\HTML\Containers\DocumentTags;

use Stringable;

interface TitleTagInterface
{
    public function setContent(string|Stringable $content): static;
    public function content(): string|Stringable;
}