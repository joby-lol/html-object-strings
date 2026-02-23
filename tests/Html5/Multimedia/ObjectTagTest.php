<?php

namespace Joby\HTML\Html5\Multimedia;

use Joby\HTML\Html5\Tags\TagTestCase;

class ObjectTagTest extends TagTestCase
{

    public function testAttributeHelpers(): void
    {
        $this->assertAttributeHelperMethods('src', ObjectTag::class);
        $this->assertAttributeHelperMethods('type', ObjectTag::class);
    }

    public function testSrc(): void
    {
        $tag = new ObjectTag();
        $this->assertNull($tag->src());
        $tag->setSrc('https://example.com/resource.swf');
        $this->assertEquals('https://example.com/resource.swf', $tag->src());
        $tag->unsetSrc();
        $this->assertNull($tag->src());
    }

    public function testSrcNullUnsets(): void
    {
        $tag = new ObjectTag();
        $tag->setSrc('https://example.com/resource.swf');
        $tag->setSrc(null);
        $this->assertNull($tag->src());
    }

    public function testType(): void
    {
        $tag = new ObjectTag();
        $this->assertNull($tag->type());
        $tag->setType('application/pdf');
        $this->assertEquals('application/pdf', $tag->type());
        $tag->unsetType();
        $this->assertNull($tag->type());
    }

    public function testTypeNullUnsets(): void
    {
        $tag = new ObjectTag();
        $tag->setType('application/pdf');
        $tag->setType(null);
        $this->assertNull($tag->type());
    }

    public function testHeight(): void
    {
        $tag = new ObjectTag();
        $this->assertNull($tag->height());
        $tag->setHeight(480);
        $this->assertEquals(480, $tag->height());
        $tag->unsetHeight();
        $this->assertNull($tag->height());
    }

    public function testHeightZeroIsValid(): void
    {
        $tag = new ObjectTag();
        $tag->setHeight(0);
        $this->assertEquals(0, $tag->height());
    }

    public function testWidth(): void
    {
        $tag = new ObjectTag();
        $this->assertNull($tag->width());
        $tag->setWidth(640);
        $this->assertEquals(640, $tag->width());
        $tag->unsetWidth();
        $this->assertNull($tag->width());
    }

    public function testWidthZeroIsValid(): void
    {
        $tag = new ObjectTag();
        $tag->setWidth(0);
        $this->assertEquals(0, $tag->width());
    }

    public function testChaining(): void
    {
        $tag = new ObjectTag();
        $this->assertInstanceOf(ObjectTag::class, $tag->setSrc('https://example.com/resource.swf'));
        $this->assertInstanceOf(ObjectTag::class, $tag->unsetSrc());
        $this->assertInstanceOf(ObjectTag::class, $tag->setType('application/pdf'));
        $this->assertInstanceOf(ObjectTag::class, $tag->unsetType());
        $this->assertInstanceOf(ObjectTag::class, $tag->setHeight(480));
        $this->assertInstanceOf(ObjectTag::class, $tag->unsetHeight());
        $this->assertInstanceOf(ObjectTag::class, $tag->setWidth(640));
        $this->assertInstanceOf(ObjectTag::class, $tag->unsetWidth());
    }

}
