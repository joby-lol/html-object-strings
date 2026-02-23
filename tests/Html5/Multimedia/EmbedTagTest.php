<?php

namespace Joby\HTML\Html5\Multimedia;

use Joby\HTML\Html5\Tags\TagTestCase;

class EmbedTagTest extends TagTestCase
{

    public function testAttributeHelpers(): void
    {
        $this->assertAttributeHelperMethods('src', EmbedTag::class);
        $this->assertAttributeHelperMethods('type', EmbedTag::class);
    }

    public function testSrc(): void
    {
        $tag = new EmbedTag();
        $this->assertNull($tag->src());
        $tag->setSrc('https://example.com/plugin.swf');
        $this->assertEquals('https://example.com/plugin.swf', $tag->src());
        $tag->unsetSrc();
        $this->assertNull($tag->src());
    }

    public function testSrcNullUnsets(): void
    {
        $tag = new EmbedTag();
        $tag->setSrc('https://example.com/plugin.swf');
        $tag->setSrc(null);
        $this->assertNull($tag->src());
    }

    public function testType(): void
    {
        $tag = new EmbedTag();
        $this->assertNull($tag->type());
        $tag->setType('application/x-shockwave-flash');
        $this->assertEquals('application/x-shockwave-flash', $tag->type());
        $tag->unsetType();
        $this->assertNull($tag->type());
    }

    public function testTypeNullUnsets(): void
    {
        $tag = new EmbedTag();
        $tag->setType('application/x-shockwave-flash');
        $tag->setType(null);
        $this->assertNull($tag->type());
    }

    public function testHeight(): void
    {
        $tag = new EmbedTag();
        $this->assertNull($tag->height());
        $tag->setHeight(480);
        $this->assertEquals(480, $tag->height());
        $tag->unsetHeight();
        $this->assertNull($tag->height());
    }

    public function testHeightZeroIsValid(): void
    {
        $tag = new EmbedTag();
        $tag->setHeight(0);
        $this->assertEquals(0, $tag->height());
    }

    public function testWidth(): void
    {
        $tag = new EmbedTag();
        $this->assertNull($tag->width());
        $tag->setWidth(640);
        $this->assertEquals(640, $tag->width());
        $tag->unsetWidth();
        $this->assertNull($tag->width());
    }

    public function testWidthZeroIsValid(): void
    {
        $tag = new EmbedTag();
        $tag->setWidth(0);
        $this->assertEquals(0, $tag->width());
    }

    public function testChaining(): void
    {
        $tag = new EmbedTag();
        $this->assertInstanceOf(EmbedTag::class, $tag->setSrc('https://example.com/plugin.swf'));
        $this->assertInstanceOf(EmbedTag::class, $tag->unsetSrc());
        $this->assertInstanceOf(EmbedTag::class, $tag->setType('application/x-shockwave-flash'));
        $this->assertInstanceOf(EmbedTag::class, $tag->unsetType());
        $this->assertInstanceOf(EmbedTag::class, $tag->setHeight(480));
        $this->assertInstanceOf(EmbedTag::class, $tag->unsetHeight());
        $this->assertInstanceOf(EmbedTag::class, $tag->setWidth(640));
        $this->assertInstanceOf(EmbedTag::class, $tag->unsetWidth());
    }

}
