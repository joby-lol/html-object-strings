<?php

namespace ByJoby\HTML\Html5\TextContentTags;

use ByJoby\HTML\ContentCategories\FlowContent;
use ByJoby\HTML\DisplayTypes\DisplayBlock;
use ByJoby\HTML\Tags\AbstractContainerTag;

class OlTag extends AbstractContainerTag implements FlowContent, DisplayBlock
{
    const TAG = 'ol';
    const TYPE_LETTER_LOWER = 'a';
    const TYPE_LETTER_UPPER = 'A';
    const TYPE_ROMAN_LOWER = 'i';
    const TYPE_ROMAN_UPPER = 'I';
    const TYPE_NUMBER = '1';

    public function setReversed(bool $reversed): static
    {
        $this->attributes()['reversed'] = $reversed;
        return $this;
    }

    public function reversed(): bool
    {
        return !!$this->attributes()['reversed'];
    }

    public function start(): null|int
    {
        if (isset($this->attributes['start'])) {
            return intval($this->attributes()->string('start'));
        } else {
            return null;
        }
    }

    public function setStart(null|int $start): static
    {
        if (!$start) $this->attributes()['start'] = false;
        else $this->attributes()['start'] = strval($start);
        return $this;
    }

    public function unsetStart(): static
    {
        unset($this->attributes()['start']);
        return $this;
    }

    public function type(): null|string
    {
        return $this->attributes()->string('type');
    }

    public function setType(null|string $type): static
    {
        if (!in_array($type, ['a', 'A', 'i', 'I', '1'])) {
            $type = null;
        }
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
