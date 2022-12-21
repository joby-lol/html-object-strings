<?php

namespace ByJoby\HTML\Html5\Tags;

use ByJoby\HTML\ContentCategories\MetadataContent;
use ByJoby\HTML\Tags\AbstractContentTag;

class StyleTag extends AbstractContentTag implements MetadataContent
{
    const TAG = 'style';

    public function media(): null|string
    {
        return $this->attributes()->string('media');
    }

    public function setMedia(null|string $media): static
    {
        if (!$media) {
            $this->attributes()['media'] = false;
        } else {
            $this->attributes()['media'] = $media;
        }
        return $this;
    }

    public function unsetMedia(): static
    {
        unset($this->attributes()['media']);
        return $this;
    }

    public function nonce(): null|string
    {
        return $this->attributes()->string('nonce');
    }

    public function setNonce(null|string $nonce): static
    {
        if (!$nonce) {
            $this->attributes()['nonce'] = false;
        } else {
            $this->attributes()['nonce'] = $nonce;
        }
        return $this;
    }

    public function unsetNonce(): static
    {
        unset($this->attributes()['nonce']);
        return $this;
    }
}
