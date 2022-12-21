<?php

namespace ByJoby\HTML\Tags;

use Stringable;

abstract class AbstractContentTag extends AbstractTag implements ContentTagInterface
{
    /** @var string|Stringable */
    protected $content = '';

    public function content(): string|Stringable
    {
        return trim($this->content, "\t\n\r\0x0B");
    }

    public function setContent(string|Stringable $content): static
    {
        $this->content = $content;
        return $this;
    }

    public function __toString(): string
    {
        $openingTag = sprintf('<%s>', implode(' ', $this->openingTagStrings()));
        $closingTag = sprintf('</%s>', $this->tag());
        $content = $this->content();
        if (!$content) {
            return $openingTag . $closingTag;
        } else {
            return implode(
                PHP_EOL,
                [
                $openingTag,
                $content,
                $closingTag
                ]
            );
        }
    }
}
