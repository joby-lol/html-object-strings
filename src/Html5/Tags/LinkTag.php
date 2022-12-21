<?php

namespace ByJoby\HTML\Html5\Tags;

use ByJoby\HTML\ContentCategories\MetadataContent;
use ByJoby\HTML\Tags\AbstractTag;

class LinkTag extends AbstractTag implements MetadataContent
{
    const TAG = 'link';

    public function rel(): null|string
    {
        return $this->attributes()->string('rel');
    }

    public function setRel(null|string $rel): static
    {
        if (!$rel) {
            $this->attributes()['rel'] = false;
        } else {
            $this->attributes()['rel'] = $rel;
        }
        return $this;
    }

    public function unsetRel(): static
    {
        unset($this->attributes()['rel']);
        return $this;
    }

    public function as(): null|string
    {
        return $this->attributes()->string('as');
    }

    public function setAs(null|string $as): static
    {
        if (!$as) {
            $this->attributes()['as'] = false;
        } else {
            $this->attributes()['as'] = $as;
        }
        return $this;
    }

    public function unsetAs(): static
    {
        unset($this->attributes()['as']);
        return $this;
    }

    public function crossorigin(): null|string
    {
        return $this->attributes()->string('crossorigin');
    }

    public function setCrossorigin(null|string $crossorigin): static
    {
        if (!$crossorigin) {
            $this->attributes()['crossorigin'] = false;
        } else {
            $this->attributes()['crossorigin'] = $crossorigin;
        }
        return $this;
    }

    public function unsetCrossorigin(): static
    {
        unset($this->attributes()['crossorigin']);
        return $this;
    }

    public function href(): null|string
    {
        return $this->attributes()->string('href');
    }

    public function setHref(null|string $href): static
    {
        if (!$href) {
            $this->attributes()['href'] = false;
        } else {
            $this->attributes()['href'] = $href;
        }
        return $this;
    }

    public function unsetHref(): static
    {
        unset($this->attributes()['href']);
        return $this;
    }

    public function hreflang(): null|string
    {
        return $this->attributes()->string('hreflang');
    }

    public function setHreflang(null|string $hreflang): static
    {
        if (!$hreflang) {
            $this->attributes()['hreflang'] = false;
        } else {
            $this->attributes()['hreflang'] = $hreflang;
        }
        return $this;
    }

    public function unsetHreflang(): static
    {
        unset($this->attributes()['hreflang']);
        return $this;
    }

    public function imagesizes(): null|string
    {
        return $this->attributes()->string('imagesizes');
    }

    public function setImagesizes(null|string $imagesizes): static
    {
        if (!$imagesizes) {
            $this->attributes()['imagesizes'] = false;
        } else {
            $this->attributes()['imagesizes'] = $imagesizes;
        }
        return $this;
    }

    public function unsetImagesizes(): static
    {
        unset($this->attributes()['imagesizes']);
        return $this;
    }

    public function imagesrcset(): null|string
    {
        return $this->attributes()->string('imagesrcset');
    }

    public function setImagesrcset(null|string $imagesrcset): static
    {
        if (!$imagesrcset) {
            $this->attributes()['imagesrcset'] = false;
        } else {
            $this->attributes()['imagesrcset'] = $imagesrcset;
        }
        return $this;
    }

    public function unsetImagesrcset(): static
    {
        unset($this->attributes()['imagesrcset']);
        return $this;
    }

    public function integrity(): null|string
    {
        return $this->attributes()->string('integrity');
    }

    public function setIntegrity(null|string $integrity): static
    {
        if (!$integrity) {
            $this->attributes()['integrity'] = false;
        } else {
            $this->attributes()['integrity'] = $integrity;
        }
        return $this;
    }

    public function unsetIntegrity(): static
    {
        unset($this->attributes()['integrity']);
        return $this;
    }

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

    public function referrerpolicy(): null|string
    {
        return $this->attributes()->string('referrerpolicy');
    }

    public function setReferrerpolicy(null|string $referrerpolicy): static
    {
        if (!$referrerpolicy) {
            $this->attributes()['referrerpolicy'] = false;
        } else {
            $this->attributes()['referrerpolicy'] = $referrerpolicy;
        }
        return $this;
    }

    public function unsetReferrerpolicy(): static
    {
        unset($this->attributes()['referrerpolicy']);
        return $this;
    }

    public function type(): null|string
    {
        return $this->attributes()->string('type');
    }

    public function setType(null|string $type): static
    {
        if (!$type) {
            $this->attributes()['type'] = false;
        } else {
            $this->attributes()['type'] = $type;
        }
        return $this;
    }

    public function unsetType(): static
    {
        unset($this->attributes()['type']);
        return $this;
    }
}
