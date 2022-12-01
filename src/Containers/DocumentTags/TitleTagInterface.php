<?php

namespace ByJoby\HTML\Containers\DocumentTags;

use ByJoby\HTML\NodeInterface;

interface TitleTagInterface extends NodeInterface
{
    public function title(): string;
    public function setTitle(string $title): static;
}
