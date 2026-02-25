<?php

namespace Joby\HTML\Tags;

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

    /**
     * Implementations should override this method if they need to do any escaping or other processing before rendering content.
     * 
     * @return string
     */
    protected function contentForRendering(): string
    {
        return (string) $this->content();
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
        $content = $this->contentForRendering();
        if (!$content) {
            return $openingTag . $closingTag;
        } elseif ($this->inline) {
            return $openingTag . $content . $closingTag;
        } else {
            return $openingTag . PHP_EOL . $content . PHP_EOL . $closingTag;
        }
    }
}
