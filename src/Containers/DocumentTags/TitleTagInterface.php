<?php

namespace ByJoby\HTML\Containers\DocumentTags;

use ByJoby\HTML\Tags\TagInterface;

interface TitleTagInterface extends TagInterface
{
    public function title(): string;
    public function setTitle(string $title): static;
}
