<?php

namespace Joby\HTML\Html5\Multimedia;

use Joby\HTML\Html5\Tags\TagTestCase;

class SourceTagTest extends TagTestCase
{

    public function testAttributeHelpers(): void
    {
        $this->assertAttributeHelperMethods('type', SourceTag::class);
        $this->assertAttributeHelperMethods('src', SourceTag::class);
        $this->assertAttributeHelperMethods('srcset', SourceTag::class);
        $this->assertAttributeHelperMethods('media', SourceTag::class);
    }

    // --- type ---

    public function testType(): void
    {
        $tag = new SourceTag();
        $this->assertNull($tag->type());
        $tag->setType('audio/ogg; codecs=vorbis');
        $this->assertEquals('audio/ogg; codecs=vorbis', $tag->type());
        $tag->unsetType();
        $this->assertNull($tag->type());
    }

    public function testTypeNullUnsets(): void
    {
        $tag = new SourceTag();
        $tag->setType('audio/ogg');
        $tag->setType(null);
        $this->assertNull($tag->type());
    }

    // --- src ---

    public function testSrc(): void
    {
        $tag = new SourceTag();
        $this->assertNull($tag->src());
        $tag->setSrc('https://example.com/audio.ogg');
        $this->assertEquals('https://example.com/audio.ogg', $tag->src());
        $tag->unsetSrc();
        $this->assertNull($tag->src());
    }

    public function testSrcNullUnsets(): void
    {
        $tag = new SourceTag();
        $tag->setSrc('https://example.com/audio.ogg');
        $tag->setSrc(null);
        $this->assertNull($tag->src());
    }

    // --- srcset ---

    public function testSrcset(): void
    {
        $tag = new SourceTag();
        $this->assertNull($tag->srcset());
        $tag->setSrcset('image-320w.jpg 320w, image-800w.jpg 800w');
        $this->assertEquals('image-320w.jpg 320w, image-800w.jpg 800w', $tag->srcset());
        $tag->unsetSrcset();
        $this->assertNull($tag->srcset());
    }

    public function testSrcsetNullUnsets(): void
    {
        $tag = new SourceTag();
        $tag->setSrcset('image-320w.jpg 320w');
        $tag->setSrcset(null);
        $this->assertNull($tag->srcset());
    }

    // --- sizes ---

    public function testSizes(): void
    {
        $tag = new SourceTag();
        $this->assertNull($tag->sizes());
        $tag->setSizes('(max-width: 600px) 100vw, 50vw');
        $this->assertEquals('(max-width: 600px) 100vw, 50vw', $tag->sizes());
        $tag->unsetSizes();
        $this->assertNull($tag->sizes());
    }

    public function testSizesNullUnsets(): void
    {
        $tag = new SourceTag();
        $tag->setSizes('(max-width: 600px) 100vw, 50vw');
        $tag->setSizes(null);
        $this->assertNull($tag->sizes());
    }

    public function testSizesEmptyStringIsValid(): void
    {
        // setSizes uses is_null, so empty string should be preserved
        $tag = new SourceTag();
        $tag->setSizes('');
        $this->assertEquals('', $tag->sizes());
    }

    // --- media ---

    public function testMedia(): void
    {
        $tag = new SourceTag();
        $this->assertNull($tag->media());
        $tag->setMedia('(min-width: 800px)');
        $this->assertEquals('(min-width: 800px)', $tag->media());
        $tag->unsetMedia();
        $this->assertNull($tag->media());
    }

    public function testMediaNullUnsets(): void
    {
        $tag = new SourceTag();
        $tag->setMedia('(min-width: 800px)');
        $tag->setMedia(null);
        $this->assertNull($tag->media());
    }

    // --- height/width ---

    public function testHeight(): void
    {
        $tag = new SourceTag();
        $this->assertNull($tag->height());
        $tag->setHeight(480);
        $this->assertEquals(480, $tag->height());
        $tag->unsetHeight();
        $this->assertNull($tag->height());
    }

    public function testHeightZeroIsValid(): void
    {
        $tag = new SourceTag();
        $tag->setHeight(0);
        $this->assertEquals(0, $tag->height());
    }

    public function testWidth(): void
    {
        $tag = new SourceTag();
        $this->assertNull($tag->width());
        $tag->setWidth(640);
        $this->assertEquals(640, $tag->width());
        $tag->unsetWidth();
        $this->assertNull($tag->width());
    }

    public function testWidthZeroIsValid(): void
    {
        $tag = new SourceTag();
        $tag->setWidth(0);
        $this->assertEquals(0, $tag->width());
    }

    // --- chaining ---

    public function testChaining(): void
    {
        $tag = new SourceTag();
        $this->assertInstanceOf(SourceTag::class, $tag->setType('audio/ogg'));
        $this->assertInstanceOf(SourceTag::class, $tag->unsetType());
        $this->assertInstanceOf(SourceTag::class, $tag->setSrc('https://example.com/audio.ogg'));
        $this->assertInstanceOf(SourceTag::class, $tag->unsetSrc());
        $this->assertInstanceOf(SourceTag::class, $tag->setSrcset('image.jpg 1x'));
        $this->assertInstanceOf(SourceTag::class, $tag->unsetSrcset());
        $this->assertInstanceOf(SourceTag::class, $tag->setSizes('100vw'));
        $this->assertInstanceOf(SourceTag::class, $tag->unsetSizes());
        $this->assertInstanceOf(SourceTag::class, $tag->setMedia('(min-width: 800px)'));
        $this->assertInstanceOf(SourceTag::class, $tag->unsetMedia());
        $this->assertInstanceOf(SourceTag::class, $tag->setHeight(480));
        $this->assertInstanceOf(SourceTag::class, $tag->unsetHeight());
        $this->assertInstanceOf(SourceTag::class, $tag->setWidth(640));
        $this->assertInstanceOf(SourceTag::class, $tag->unsetWidth());
    }

}
