<?php

namespace ByJoby\HTML\Html5\Tags;

use ByJoby\HTML\ContentCategories\MetadataContent;
use ByJoby\HTML\Tags\AbstractTag;

class LinkTag extends AbstractTag implements MetadataContent
{
    const TAG = 'link';

    public function rel(): null|string
    {
        return $this->attributes()['rel'];
    }

    public function setRel(null|string $rel): static
    {
        $this->attributes()['rel'] = $rel;
        return $this;
    }

    public function unsetRel(): static
    {
        unset($this->attributes()['rel']);
        return $this;
    }

    public function as(): null|string
    {
        return $this->attributes()['as'];
    }

    public function setAs(null|string $as): static
    {
        $this->attributes()['as'] = $as;
        return $this;
    }

    public function unsetAs(): static
    {
        unset($this->attributes()['as']);
        return $this;
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

    public function hreflang(): null|string
    {
        return $this->attributes()['hreflang'];
    }

    public function setHreflang(null|string $hreflang): static
    {
        $this->attributes()['hreflang'] = $hreflang;
        return $this;
    }

    public function unsetHreflang(): static
    {
        unset($this->attributes()['hreflang']);
        return $this;
    }

    public function imagesizes(): null|string
    {
        return $this->attributes()['imagesizes'];
    }

    public function setImagesizes(null|string $imagesizes): static
    {
        $this->attributes()['imagesizes'] = $imagesizes;
        return $this;
    }

    public function unsetImagesizes(): static
    {
        unset($this->attributes()['imagesizes']);
        return $this;
    }

    public function imagesrcset(): null|string
    {
        return $this->attributes()['imagesrcset'];
    }

    public function setImagesrcset(null|string $imagesrcset): static
    {
        $this->attributes()['imagesrcset'] = $imagesrcset;
        return $this;
    }

    public function unsetImagesrcset(): static
    {
        unset($this->attributes()['imagesrcset']);
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

    public function media(): null|string
    {
        return $this->attributes()['media'];
    }

    public function setMedia(null|string $media): static
    {
        $this->attributes()['media'] = $media;
        return $this;
    }

    public function unsetMedia(): static
    {
        unset($this->attributes()['media']);
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
