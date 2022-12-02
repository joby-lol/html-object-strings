<?php

namespace ByJoby\HTML\Html5\Tags;

use ByJoby\HTML\ContentCategories\MetadataContent;
use ByJoby\HTML\Tags\AbstractTag;

class BaseTag extends AbstractTag implements MetadataContent
{
    const TAG = 'base';

    public function href(): null|string
    {
        return $this->attributes()['href'];
    }

    public function setHref(null|string $href): static
    {
        $this->attributes()['href'] = $href;
        return $this;
    }

    public function unsetHref(): static
    {
        unset($this->attributes()['href']);
        return $this;
    }

    public function target(): null|string
    {
        return $this->attributes()['target'];
    }

    public function setTarget(null|string $target): static
    {
        $this->attributes()['target'] = $target;
        return $this;
    }

    public function unsetTarget(): static
    {
        unset($this->attributes()['target']);
        return $this;
    }
}
