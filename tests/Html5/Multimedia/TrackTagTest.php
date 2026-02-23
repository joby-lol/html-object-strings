<?php

namespace Joby\HTML\Html5\Multimedia;

use Joby\HTML\Html5\Multimedia\TrackTag\KindValue;
use Joby\HTML\Html5\Tags\TagTestCase;

class TrackTagTest extends TagTestCase
{

    public function testAttributeHelpers(): void
    {
        $this->assertAttributeHelperMethods('label', TrackTag::class);
        $this->assertAttributeHelperMethods('src', TrackTag::class);
        $this->assertAttributeHelperMethods('srclang', TrackTag::class);
    }

    public function testDefault(): void
    {
        $tag = new TrackTag();
        $this->assertFalse($tag->default());
        $tag->setDefault(true);
        $this->assertTrue($tag->default());
        $tag->setDefault(false);
        $this->assertFalse($tag->default());
    }

    public function testKind(): void
    {
        $tag = new TrackTag();
        $this->assertNull($tag->kind());
        $tag->setKind(KindValue::subtitles);
        $this->assertEquals(KindValue::subtitles, $tag->kind());
        $this->assertEquals('subtitles', $tag->attributes()->asString('kind'));
        $tag->unsetKind();
        $this->assertNull($tag->kind());
    }

    public function testKindNullUnsets(): void
    {
        $tag = new TrackTag();
        $tag->setKind(KindValue::captions);
        $tag->setKind(null);
        $this->assertNull($tag->kind());
    }

    public function testKindAllValues(): void
    {
        $tag = new TrackTag();
        foreach (KindValue::cases() as $case) {
            $tag->setKind($case);
            $this->assertEquals($case, $tag->kind());
        }
    }

    public function testLabel(): void
    {
        $tag = new TrackTag();
        $this->assertNull($tag->label());
        $tag->setLabel('English');
        $this->assertEquals('English', $tag->label());
        $tag->unsetLabel();
        $this->assertNull($tag->label());
    }

    public function testLabelNullUnsets(): void
    {
        $tag = new TrackTag();
        $tag->setLabel('English');
        $tag->setLabel(null);
        $this->assertNull($tag->label());
    }

    public function testSrc(): void
    {
        $tag = new TrackTag();
        $this->assertNull($tag->src());
        $tag->setSrc('https://example.com/subtitles.vtt');
        $this->assertEquals('https://example.com/subtitles.vtt', $tag->src());
        $tag->unsetSrc();
        $this->assertNull($tag->src());
    }

    public function testSrcNullUnsets(): void
    {
        $tag = new TrackTag();
        $tag->setSrc('https://example.com/subtitles.vtt');
        $tag->setSrc(null);
        $this->assertNull($tag->src());
    }

    public function testSrclang(): void
    {
        $tag = new TrackTag();
        $this->assertNull($tag->srclang());
        $tag->setSrclang('en');
        $this->assertEquals('en', $tag->srclang());
        $tag->unsetSrclang();
        $this->assertNull($tag->srclang());
    }

    public function testSrclangNullUnsets(): void
    {
        $tag = new TrackTag();
        $tag->setSrclang('en');
        $tag->setSrclang(null);
        $this->assertNull($tag->srclang());
    }

    public function testChaining(): void
    {
        $tag = new TrackTag();
        $this->assertInstanceOf(TrackTag::class, $tag->setDefault(true));
        $this->assertInstanceOf(TrackTag::class, $tag->setKind(KindValue::subtitles));
        $this->assertInstanceOf(TrackTag::class, $tag->unsetKind());
        $this->assertInstanceOf(TrackTag::class, $tag->setLabel('English'));
        $this->assertInstanceOf(TrackTag::class, $tag->unsetLabel());
        $this->assertInstanceOf(TrackTag::class, $tag->setSrc('https://example.com/subtitles.vtt'));
        $this->assertInstanceOf(TrackTag::class, $tag->unsetSrc());
        $this->assertInstanceOf(TrackTag::class, $tag->setSrclang('en'));
        $this->assertInstanceOf(TrackTag::class, $tag->unsetSrclang());
    }

}
