<?php

namespace ByJoby\HTML\Html5\Tags;

use ByJoby\HTML\ContentCategories\MetadataContent;
use ByJoby\HTML\Tags\AbstractTag;

class MetaTag extends AbstractTag implements MetadataContent
{
    const TAG = 'meta';

    public function name(): null|string
    {
        return $this->attributes()->string('name');
    }

    public function setName(null|string $name): static
    {
        if (!$name) $this->attributes()['name'] = false;
        else $this->attributes()['name'] = $name;
        return $this;
    }

    public function unsetName(): static
    {
        unset($this->attributes()['name']);
        return $this;
    }

    public function content(): null|string
    {
        return $this->attributes()->string('content');
    }

    public function setContent(null|string $content): static
    {
        if (!$content) $this->attributes()['content'] = false;
        else $this->attributes()['content'] = $content;
        return $this;
    }

    public function unsetContent(): static
    {
        unset($this->attributes()['content']);
        return $this;
    }

    public function httpEquiv(): null|string
    {
        return $this->attributes()->string('http-equiv');
    }

    public function setHttpEquiv(null|string $http_equiv): static
    {
        if (!$http_equiv) $this->attributes()['http-equiv'] = false;
        else $this->attributes()['http-equiv'] = $http_equiv;
        return $this;
    }

    public function unsetHttpEquiv(): static
    {
        unset($this->attributes()['http-equiv']);
        return $this;
    }

    public function charset(): null|string
    {
        return $this->attributes()->string('charset');
    }

    public function setCharset(null|string $charset): static
    {
        if (!$charset) $this->attributes()['charset'] = false;
        else $this->attributes()['charset'] = $charset;
        return $this;
    }

    public function unsetCharset(): static
    {
        unset($this->attributes()['charset']);
        return $this;
    }
}
