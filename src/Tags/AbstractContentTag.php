<?php

namespace ByJoby\HTML\Tags;

use Stringable;

abstract class AbstractContentTag extends AbstractTag implements ContentTagInterface
{
    /** @var string|Stringable */
    protected $content = '';
    /** @var bool */
    protected $inline = false;

    public function content(): string|Stringable
    {
        return trim($this->content, "\t\n\r\0x0B");
    }

    public function setContent(string|Stringable $content): self
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
        } elseif ($this->inline) {
            return $openingTag . $content . $closingTag;
        } else {
            return $openingTag . PHP_EOL . $content . PHP_EOL . $closingTag;
        }
    }
}
