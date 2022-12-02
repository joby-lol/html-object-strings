<?php

namespace ByJoby\HTML\Html5\Tags;

use ByJoby\HTML\ContentCategories\MetadataContent;
use ByJoby\HTML\Tags\AbstractTag;

class MetaTag extends AbstractTag implements MetadataContent
{
    const TAG = 'meta';

    public function name(): null|string
    {
        return $this->attributes()['name'];
    }

    public function setName(null|string $name): static
    {
        $this->attributes()['name'] = $name;
        return $this;
    }

    public function unsetName(): static
    {
        unset($this->attributes()['name']);
        return $this;
    }

    public function content(): null|string
    {
        return $this->attributes()['content'];
    }

    public function setContent(null|string $content): static
    {
        $this->attributes()['content'] = $content;
        return $this;
    }

    public function unsetContent(): static
    {
        unset($this->attributes()['content']);
        return $this;
    }

    public function httpEquiv(): null|string
    {
        return $this->attributes()['http-equiv'];
    }

    public function setHttpEquiv(null|string $http_equiv): static
    {
        $this->attributes()['http-equiv'] = $http_equiv;
        return $this;
    }

    public function unsetHttpEquiv(): static
    {
        unset($this->attributes()['http-equiv']);
        return $this;
    }

    public function charset(): null|string
    {
        return $this->attributes()['charset'];
    }

    public function setCharset(null|string $charset): static
    {
        $this->attributes()['charset'] = $charset;
        return $this;
    }

    public function unsetCharset(): static
    {
        unset($this->attributes()['charset']);
        return $this;
    }
}
