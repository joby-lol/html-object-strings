<?php

namespace ByJoby\HTML\Html5\Tags;

use ByJoby\HTML\ContentCategories\MetadataContent;
use ByJoby\HTML\ContentCategories\PhrasingContent;
use ByJoby\HTML\DisplayTypes\DisplayNone;
use ByJoby\HTML\Tags\AbstractContentTag;

class ScriptTag extends AbstractContentTag implements MetadataContent, PhrasingContent, DisplayNone
{
    const TAG = 'noscript';

    public function setAsync(bool $async): static
    {
        if ($async) $this->attributes()['async'] = null;
        else unset($this->attributes()['async']);
        return $this;
    }

    public function async(): bool
    {
        return isset($this->attributes()['async']);
    }

    public function setDefer(bool $defer): static
    {
        if ($defer) $this->attributes()['defer'] = null;
        else unset($this->attributes()['defer']);
        return $this;
    }

    public function defer(): bool
    {
        return isset($this->attributes()['defer']);
    }

    public function crossorigin(): null|string
    {
        return $this->attributes()['crossorigin'];
    }

    public function setCrossorigin(null|string $crossorigin): static
    {
        $this->attributes()['crossorigin'] = $crossorigin;
        return $this;
    }

    public function unsetCrossorigin(): static
    {
        unset($this->attributes()['crossorigin']);
        return $this;
    }

    public function integrity(): null|string
    {
        return $this->attributes()['integrity'];
    }

    public function setIntegrity(null|string $integrity): static
    {
        $this->attributes()['integrity'] = $integrity;
        return $this;
    }

    public function unsetIntegrity(): static
    {
        unset($this->attributes()['integrity']);
        return $this;
    }

    public function nomodule(): null|string
    {
        return $this->attributes()['nomodule'];
    }

    public function setNomodule(null|string $nomodule): static
    {
        $this->attributes()['nomodule'] = $nomodule;
        return $this;
    }

    public function unsetNomodule(): static
    {
        unset($this->attributes()['nomodule']);
        return $this;
    }

    public function nonce(): null|string
    {
        return $this->attributes()['nonce'];
    }

    public function setNonce(null|string $nonce): static
    {
        $this->attributes()['nonce'] = $nonce;
        return $this;
    }

    public function unsetNonce(): static
    {
        unset($this->attributes()['nonce']);
        return $this;
    }

    public function referrerpolicy(): null|string
    {
        return $this->attributes()['referrerpolicy'];
    }

    public function setReferrerpolicy(null|string $referrerpolicy): static
    {
        $this->attributes()['referrerpolicy'] = $referrerpolicy;
        return $this;
    }

    public function unsetReferrerpolicy(): static
    {
        unset($this->attributes()['referrerpolicy']);
        return $this;
    }

    public function src(): null|string
    {
        return $this->attributes()['src'];
    }

    public function setSrc(null|string $src): static
    {
        $this->attributes()['src'] = $src;
        return $this;
    }

    public function unsetSrc(): static
    {
        unset($this->attributes()['src']);
        return $this;
    }

    public function type(): null|string
    {
        return $this->attributes()['type'];
    }

    public function setType(null|string $type): static
    {
        $this->attributes()['type'] = $type;
        return $this;
    }

    public function unsetType(): static
    {
        unset($this->attributes()['type']);
        return $this;
    }
}
