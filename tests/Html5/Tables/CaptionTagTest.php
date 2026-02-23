<?php

namespace Joby\HTML\Html5\Tables;

use Joby\HTML\Html5\Tags\TagTestCase;

class CaptionTagTest extends TagTestCase
{

    // --- constructor ---

    public function testDefaultConstructor(): void
    {
        $tag = new CaptionTag();
        $this->assertSame('', (string) $tag->content());
    }

    public function testConstructorWithContent(): void
    {
        $tag = new CaptionTag('My Table');
        $this->assertStringContainsString('My Table', (string) $tag->content());
    }

    // --- content ---

    public function testSetContent(): void
    {
        $tag = new CaptionTag();
        $tag->setContent('Updated caption');
        $this->assertStringContainsString('Updated caption', (string) $tag->content());
    }

    // --- chaining ---

    public function testChaining(): void
    {
        $tag = new CaptionTag();
        $this->assertInstanceOf(CaptionTag::class, $tag->setContent('test'));
    }

}
