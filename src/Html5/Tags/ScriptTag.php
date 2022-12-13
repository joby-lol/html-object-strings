<?php

namespace ByJoby\HTML\Html5\Tags;

use ByJoby\HTML\ContentCategories\MetadataContent;
use ByJoby\HTML\ContentCategories\PhrasingContent;
use ByJoby\HTML\DisplayTypes\DisplayNone;
use ByJoby\HTML\Tags\AbstractContentTag;

class ScriptTag extends AbstractContentTag implements MetadataContent, PhrasingContent, DisplayNone
{
    const TAG = 'script';

    public function setAsync(bool $async): static
    {
        $this->attributes()['async'] = $async;
        return $this;
    }

    public function async(): bool
    {
        return !!$this->attributes()['async'];
    }

    public function setDefer(bool $defer): static
    {
        $this->attributes()['defer'] = $defer;
        return $this;
    }

    public function defer(): bool
    {
        return !!$this->attributes()['defer'];
    }

    public function crossorigin(): null|string
    {
        return $this->attributes()->string('crossorigin');
    }

    public function setCrossorigin(null|string $crossorigin): static
    {
        if (!$crossorigin) $this->attributes()['crossorigin'] = false;
        else $this->attributes()['crossorigin'] = $crossorigin;
        return $this;
    }

    public function unsetCrossorigin(): static
    {
        unset($this->attributes()['crossorigin']);
        return $this;
    }

    public function integrity(): null|string
    {
        return $this->attributes()->string('integrity');
    }

    public function setIntegrity(null|string $integrity): static
    {
        if (!$integrity) $this->attributes()['integrity'] = false;
        else $this->attributes()['integrity'] = $integrity;
        return $this;
    }

    public function unsetIntegrity(): static
    {
        unset($this->attributes()['integrity']);
        return $this;
    }

    public function setNomodule(bool $nomodule): static
    {
        $this->attributes()['nomodule'] = $nomodule;
        return $this;
    }

    public function nomodule(): bool
    {
        return !!$this->attributes()['nomodule'];
    }

    public function nonce(): null|string
    {
        return $this->attributes()->string('nonce');
    }

    public function setNonce(null|string $nonce): static
    {
        if (!$nonce) $this->attributes()['nonce'] = false;
        else $this->attributes()['nonce'] = $nonce;
        return $this;
    }

    public function unsetNonce(): static
    {
        unset($this->attributes()['nonce']);
        return $this;
    }

    public function referrerpolicy(): null|string
    {
        return $this->attributes()->string('referrerpolicy');
    }

    public function setReferrerpolicy(null|string $referrerpolicy): static
    {
        if (!$referrerpolicy) $this->attributes()['referrerpolicy'] = false;
        else $this->attributes()['referrerpolicy'] = $referrerpolicy;
        return $this;
    }

    public function unsetReferrerpolicy(): static
    {
        unset($this->attributes()['referrerpolicy']);
        return $this;
    }

    public function src(): null|string
    {
        return $this->attributes()->string('src');
    }

    public function setSrc(null|string $src): static
    {
        if (!$src) $this->attributes()['src'] = false;
        else $this->attributes()['src'] = $src;
        return $this;
    }

    public function unsetSrc(): static
    {
        unset($this->attributes()['src']);
        return $this;
    }

    public function type(): null|string
    {
        return $this->attributes()->string('type');
    }

    public function setType(null|string $type): static
    {
        if (!$type) $this->attributes()['type'] = false;
        else $this->attributes()['type'] = $type;
        return $this;
    }

    public function unsetType(): static
    {
        unset($this->attributes()['type']);
        return $this;
    }
}
