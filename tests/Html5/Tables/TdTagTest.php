<?php

namespace Joby\HTML\Html5\Tables;

use Joby\HTML\Html5\Tags\TagTestCase;
use Joby\HTML\Nodes\Text;

class TdTagTest extends TagTestCase
{

    // --- constructor ---

    public function testDefaultConstructor(): void
    {
        $tag = new TdTag();
        $this->assertEmpty($tag->children());
    }

    // --- children ---

    public function testAddTextChild(): void
    {
        $tag = new TdTag();
        $text = new Text('cell content');
        $tag->addChild($text);
        $this->assertContains($text, $tag->children());
    }

    // --- colspan ---

    public function testColspanDefaultsToNull(): void
    {
        $tag = new TdTag();
        $this->assertNull($tag->colspan());
    }

    public function testSetColspan(): void
    {
        $tag = new TdTag();
        $tag->setColspan(3);
        $this->assertSame(3, $tag->colspan());
    }

    public function testSetColspanToNullUnsets(): void
    {
        $tag = new TdTag();
        $tag->setColspan(3)->setColspan(null);
        $this->assertNull($tag->colspan());
    }

    public function testUnsetColspan(): void
    {
        $tag = new TdTag();
        $tag->setColspan(3)->unsetColspan();
        $this->assertNull($tag->colspan());
    }

    // --- rowspan ---

    public function testRowspanDefaultsToNull(): void
    {
        $tag = new TdTag();
        $this->assertNull($tag->rowspan());
    }

    public function testSetRowspan(): void
    {
        $tag = new TdTag();
        $tag->setRowspan(2);
        $this->assertSame(2, $tag->rowspan());
    }

    public function testSetRowspanToNullUnsets(): void
    {
        $tag = new TdTag();
        $tag->setRowspan(2)->setRowspan(null);
        $this->assertNull($tag->rowspan());
    }

    public function testUnsetRowspan(): void
    {
        $tag = new TdTag();
        $tag->setRowspan(2)->unsetRowspan();
        $this->assertNull($tag->rowspan());
    }

    // --- headers ---

    public function testHeadersDefaultsToNull(): void
    {
        $tag = new TdTag();
        $this->assertNull($tag->headers());
    }

    public function testSetHeaders(): void
    {
        $tag = new TdTag();
        $tag->setHeaders('col1 col2');
        $this->assertSame('col1 col2', $tag->headers());
    }

    public function testSetHeadersToNullUnsets(): void
    {
        $tag = new TdTag();
        $tag->setHeaders('col1')->setHeaders(null);
        $this->assertNull($tag->headers());
    }

    public function testUnsetHeaders(): void
    {
        $tag = new TdTag();
        $tag->setHeaders('col1')->unsetHeaders();
        $this->assertNull($tag->headers());
    }

    // --- chaining ---

    public function testChaining(): void
    {
        $tag = new TdTag();
        $this->assertInstanceOf(TdTag::class, $tag->setColspan(2));
        $this->assertInstanceOf(TdTag::class, $tag->unsetColspan());
        $this->assertInstanceOf(TdTag::class, $tag->setRowspan(2));
        $this->assertInstanceOf(TdTag::class, $tag->unsetRowspan());
        $this->assertInstanceOf(TdTag::class, $tag->setHeaders('h1'));
        $this->assertInstanceOf(TdTag::class, $tag->unsetHeaders());
        $this->assertInstanceOf(TdTag::class, $tag->addChild(new Text('x')));
    }

}
