<?php

namespace Joby\HTML\Html5\Multimedia;

use Joby\HTML\Html5\Multimedia\AbstractPlaybackTag\PreloadValue;
use Joby\HTML\Html5\Tags\TagTestCase;
use Joby\HTML\Html5\Traits\CrossoriginTrait\CrossOriginValue;

/**
 * Tests AbstractPlaybackTag shared behavior via AudioTag, then AudioTag-specific
 * concerns, then VideoTag additions separately.
 */
class AudioTagTest extends TagTestCase
{

    public function testAttributeHelpers(): void
    {
        $this->assertAttributeHelperMethods('src', AudioTag::class);
        $this->assertAttributeHelperMethods('crossorigin', AudioTag::class, CrossOriginValue::anonymous, 'anonymous');
        $this->assertAttributeHelperMethods('crossorigin', AudioTag::class, CrossOriginValue::useCredentials, 'use-credentials');
    }

    public function testAutoplay(): void
    {
        $tag = new AudioTag();
        $this->assertFalse($tag->autoplay());
        $tag->setAutoplay(true);
        $this->assertTrue($tag->autoplay());
        $tag->setAutoplay(false);
        $this->assertFalse($tag->autoplay());
    }

    public function testControls(): void
    {
        $tag = new AudioTag();
        $this->assertFalse($tag->controls());
        $tag->setControls(true);
        $this->assertTrue($tag->controls());
        $tag->setControls(false);
        $this->assertFalse($tag->controls());
    }

    public function testLoop(): void
    {
        $tag = new AudioTag();
        $this->assertFalse($tag->loop());
        $tag->setLoop(true);
        $this->assertTrue($tag->loop());
        $tag->setLoop(false);
        $this->assertFalse($tag->loop());
    }

    public function testMuted(): void
    {
        $tag = new AudioTag();
        $this->assertFalse($tag->muted());
        $tag->setMuted(true);
        $this->assertTrue($tag->muted());
        $tag->setMuted(false);
        $this->assertFalse($tag->muted());
    }

    public function testSrc(): void
    {
        $tag = new AudioTag();
        $this->assertNull($tag->src());
        $tag->setSrc('https://example.com/audio.mp3');
        $this->assertEquals('https://example.com/audio.mp3', $tag->src());
        $tag->unsetSrc();
        $this->assertNull($tag->src());
    }

    public function testSrcNullUnsets(): void
    {
        $tag = new AudioTag();
        $tag->setSrc('https://example.com/audio.mp3');
        $tag->setSrc(null);
        $this->assertNull($tag->src());
    }

    public function testPreload(): void
    {
        $tag = new AudioTag();
        $this->assertNull($tag->preload());
        $tag->setPreload(PreloadValue::metadata);
        $this->assertEquals(PreloadValue::metadata, $tag->preload());
        $this->assertEquals('metadata', $tag->attributes()->asString('preload'));
        $tag->unsetPreload();
        $this->assertNull($tag->preload());
    }

    public function testPreloadNullUnsets(): void
    {
        $tag = new AudioTag();
        $tag->setPreload(PreloadValue::auto);
        $tag->setPreload(null);
        $this->assertNull($tag->preload());
    }

    public function testPreloadAllValues(): void
    {
        $tag = new AudioTag();
        foreach (PreloadValue::cases() as $case) {
            $tag->setPreload($case);
            $this->assertEquals($case, $tag->preload());
        }
    }

    public function testChaining(): void
    {
        $tag = new AudioTag();
        $this->assertInstanceOf(AudioTag::class, $tag->setAutoplay(true));
        $this->assertInstanceOf(AudioTag::class, $tag->setControls(true));
        $this->assertInstanceOf(AudioTag::class, $tag->setLoop(true));
        $this->assertInstanceOf(AudioTag::class, $tag->setMuted(true));
        $this->assertInstanceOf(AudioTag::class, $tag->setSrc('https://example.com/audio.mp3'));
        $this->assertInstanceOf(AudioTag::class, $tag->unsetSrc());
        $this->assertInstanceOf(AudioTag::class, $tag->setPreload(PreloadValue::metadata));
        $this->assertInstanceOf(AudioTag::class, $tag->unsetPreload());
    }

}
