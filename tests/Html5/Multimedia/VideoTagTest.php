<?php

namespace Joby\HTML\Html5\Multimedia;

use Joby\HTML\Html5\Tags\TagTestCase;

class VideoTagTest extends TagTestCase
{

    public function testAttributeHelpers(): void
    {
        $this->assertAttributeHelperMethods('poster', VideoTag::class);
    }

    public function testPlaysinline(): void
    {
        $tag = new VideoTag();
        $this->assertFalse($tag->playsinline());
        $tag->setPlaysinline(true);
        $this->assertTrue($tag->playsinline());
        $tag->setPlaysinline(false);
        $this->assertFalse($tag->playsinline());
    }

    public function testPoster(): void
    {
        $tag = new VideoTag();
        $this->assertNull($tag->poster());
        $tag->setPoster('https://example.com/poster.jpg');
        $this->assertEquals('https://example.com/poster.jpg', $tag->poster());
        $tag->unsetPoster();
        $this->assertNull($tag->poster());
    }

    public function testPosterNullUnsets(): void
    {
        $tag = new VideoTag();
        $tag->setPoster('https://example.com/poster.jpg');
        $tag->setPoster(null);
        $this->assertNull($tag->poster());
    }

    public function testChaining(): void
    {
        $tag = new VideoTag();
        $this->assertInstanceOf(VideoTag::class, $tag->setPlaysinline(true));
        $this->assertInstanceOf(VideoTag::class, $tag->setPoster('https://example.com/poster.jpg'));
        $this->assertInstanceOf(VideoTag::class, $tag->unsetPoster());
    }

    public function testHeight(): void
    {
        $tag = new VideoTag();
        $this->assertNull($tag->height());
        $tag->setHeight(480);
        $this->assertEquals(480, $tag->height());
        $tag->unsetHeight();
        $this->assertNull($tag->height());
    }

    public function testHeightNullUnsets(): void
    {
        $tag = new VideoTag();
        $tag->setHeight(480);
        $tag->setHeight(null);
        $this->assertNull($tag->height());
    }

    public function testHeightZeroIsValid(): void
    {
        $tag = new VideoTag();
        $tag->setHeight(0);
        $this->assertEquals(0, $tag->height());
    }

    public function testWidth(): void
    {
        $tag = new VideoTag();
        $this->assertNull($tag->width());
        $tag->setWidth(640);
        $this->assertEquals(640, $tag->width());
        $tag->unsetWidth();
        $this->assertNull($tag->width());
    }

    public function testWidthNullUnsets(): void
    {
        $tag = new VideoTag();
        $tag->setWidth(640);
        $tag->setWidth(null);
        $this->assertNull($tag->width());
    }

    public function testWidthZeroIsValid(): void
    {
        $tag = new VideoTag();
        $tag->setWidth(0);
        $this->assertEquals(0, $tag->width());
    }

}
