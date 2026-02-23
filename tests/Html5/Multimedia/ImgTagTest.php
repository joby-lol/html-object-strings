<?php

namespace Joby\HTML\Html5\Multimedia;

use Joby\HTML\Html5\Multimedia\ImgTag\DecodingValue;
use Joby\HTML\Html5\Multimedia\ImgTag\ReferrerPolicyValue;
use Joby\HTML\Html5\Tags\TagTestCase;
use Joby\HTML\Html5\Traits\CrossoriginTrait\CrossOriginValue;

class ImgTagTest extends TagTestCase
{

    public function testAttributeHelpers(): void
    {
        $this->assertAttributeHelperMethods('src', ImgTag::class);
        $this->assertAttributeHelperMethods('crossorigin', ImgTag::class, CrossOriginValue::anonymous, 'anonymous');
        $this->assertAttributeHelperMethods('crossorigin', ImgTag::class, CrossOriginValue::useCredentials, 'use-credentials');
    }

    // --- alt ---

    public function testAlt(): void
    {
        $tag = new ImgTag();
        $this->assertNull($tag->alt());
        $tag->setAlt('A cat sitting on a mat');
        $this->assertEquals('A cat sitting on a mat', $tag->alt());
        $tag->unsetAlt();
        $this->assertNull($tag->alt());
    }

    public function testAltEmptyStringIsValid(): void
    {
        // empty alt is semantically meaningful (decorative image)
        $tag = new ImgTag();
        $tag->setAlt('');
        $this->assertEquals('', $tag->alt());
    }

    public function testAltNullUnsets(): void
    {
        $tag = new ImgTag();
        $tag->setAlt('A cat');
        $tag->setAlt(null);
        $this->assertNull($tag->alt());
    }

    // --- decoding ---

    public function testDecoding(): void
    {
        $tag = new ImgTag();
        $this->assertNull($tag->decoding());
        $tag->setDecoding(DecodingValue::async);
        $this->assertEquals(DecodingValue::async, $tag->decoding());
        $this->assertEquals('async', $tag->attributes()->asString('decoding'));
        $tag->unsetDecoding();
        $this->assertNull($tag->decoding());
    }

    public function testDecodingNullUnsets(): void
    {
        $tag = new ImgTag();
        $tag->setDecoding(DecodingValue::async);
        $tag->setDecoding(null);
        $this->assertNull($tag->decoding());
    }

    public function testDecodingAllValues(): void
    {
        $tag = new ImgTag();
        foreach (DecodingValue::cases() as $case) {
            $tag->setDecoding($case);
            $this->assertEquals($case, $tag->decoding());
        }
    }

    // --- ismap ---

    public function testIsmap(): void
    {
        $tag = new ImgTag();
        $this->assertFalse($tag->ismap());
        $tag->setIsmap(true);
        $this->assertTrue($tag->ismap());
        $tag->setIsmap(false);
        $this->assertFalse($tag->ismap());
    }

    // --- lazy ---

    public function testLazy(): void
    {
        $tag = new ImgTag();
        $this->assertFalse($tag->lazy());
        $tag->setLazy(true);
        $this->assertTrue($tag->lazy());
        $tag->setLazy(false);
        $this->assertFalse($tag->lazy());
    }

    // --- referrerpolicy ---

    public function testReferrerpolicy(): void
    {
        $tag = new ImgTag();
        $this->assertNull($tag->referrerpolicy());
        $tag->setReferrerpolicy(ReferrerPolicyValue::origin);
        $this->assertEquals(ReferrerPolicyValue::origin, $tag->referrerpolicy());
        $tag->unsetReferrerpolicy();
        $this->assertNull($tag->referrerpolicy());
    }

    public function testReferrerpolicyNullUnsets(): void
    {
        $tag = new ImgTag();
        $tag->setReferrerpolicy(ReferrerPolicyValue::origin);
        $tag->setReferrerpolicy(null);
        $this->assertNull($tag->referrerpolicy());
    }

    // --- sizes ---

    public function testSizes(): void
    {
        $tag = new ImgTag();
        $this->assertNull($tag->sizes());
        $tag->setSizes('(max-width: 600px) 100vw, 50vw');
        $this->assertEquals('(max-width: 600px) 100vw, 50vw', $tag->sizes());
        $tag->unsetSizes();
        $this->assertNull($tag->sizes());
    }

    public function testSizesNullUnsets(): void
    {
        $tag = new ImgTag();
        $tag->setSizes('(max-width: 600px) 100vw, 50vw');
        $tag->setSizes(null);
        $this->assertNull($tag->sizes());
    }

    // --- src ---

    public function testSrc(): void
    {
        $tag = new ImgTag();
        $this->assertNull($tag->src());
        $tag->setSrc('https://example.com/image.jpg');
        $this->assertEquals('https://example.com/image.jpg', $tag->src());
        $tag->unsetSrc();
        $this->assertNull($tag->src());
    }

    public function testSrcNullUnsets(): void
    {
        $tag = new ImgTag();
        $tag->setSrc('https://example.com/image.jpg');
        $tag->setSrc(null);
        $this->assertNull($tag->src());
    }

    // --- srcset ---

    public function testSrcset(): void
    {
        $tag = new ImgTag();
        $this->assertNull($tag->srcset());
        $tag->setSrcset('image-320w.jpg 320w, image-800w.jpg 800w');
        $this->assertEquals('image-320w.jpg 320w, image-800w.jpg 800w', $tag->srcset());
        $tag->unsetSrcset();
        $this->assertNull($tag->srcset());
    }

    public function testSrcsetNullUnsets(): void
    {
        $tag = new ImgTag();
        $tag->setSrcset('image-320w.jpg 320w');
        $tag->setSrcset(null);
        $this->assertNull($tag->srcset());
    }

    // --- usemap ---

    public function testUsemapWithHash(): void
    {
        $tag = new ImgTag();
        $this->assertNull($tag->usemap());
        $tag->setUsemap('#my-map');
        $this->assertEquals('#my-map', $tag->usemap());
        $tag->unsetUsemap();
        $this->assertNull($tag->usemap());
    }

    public function testUsemapAutoPrefixesHash(): void
    {
        $tag = new ImgTag();
        $tag->setUsemap('my-map');
        $this->assertEquals('#my-map', $tag->usemap());
    }

    public function testUsemapFromMapTag(): void
    {
        $map = new MapTag('my-map');
        $tag = new ImgTag();
        $tag->setUsemap($map);
        $this->assertEquals('#my-map', $tag->usemap());
    }

    public function testUsemapNullUnsets(): void
    {
        $tag = new ImgTag();
        $tag->setUsemap('my-map');
        $tag->setUsemap(null);
        $this->assertNull($tag->usemap());
    }

    // --- height/width ---

    public function testHeight(): void
    {
        $tag = new ImgTag();
        $this->assertNull($tag->height());
        $tag->setHeight(480);
        $this->assertEquals(480, $tag->height());
        $tag->unsetHeight();
        $this->assertNull($tag->height());
    }

    public function testHeightZeroIsValid(): void
    {
        $tag = new ImgTag();
        $tag->setHeight(0);
        $this->assertEquals(0, $tag->height());
    }

    public function testWidth(): void
    {
        $tag = new ImgTag();
        $this->assertNull($tag->width());
        $tag->setWidth(640);
        $this->assertEquals(640, $tag->width());
        $tag->unsetWidth();
        $this->assertNull($tag->width());
    }

    public function testWidthZeroIsValid(): void
    {
        $tag = new ImgTag();
        $tag->setWidth(0);
        $this->assertEquals(0, $tag->width());
    }

    // --- chaining ---

    public function testChaining(): void
    {
        $tag = new ImgTag();
        $this->assertInstanceOf(ImgTag::class, $tag->setAlt('A cat'));
        $this->assertInstanceOf(ImgTag::class, $tag->unsetAlt());
        $this->assertInstanceOf(ImgTag::class, $tag->setDecoding(DecodingValue::async));
        $this->assertInstanceOf(ImgTag::class, $tag->unsetDecoding());
        $this->assertInstanceOf(ImgTag::class, $tag->setIsmap(true));
        $this->assertInstanceOf(ImgTag::class, $tag->setLazy(true));
        $this->assertInstanceOf(ImgTag::class, $tag->setReferrerpolicy(ReferrerPolicyValue::origin));
        $this->assertInstanceOf(ImgTag::class, $tag->unsetReferrerpolicy());
        $this->assertInstanceOf(ImgTag::class, $tag->setSizes('100vw'));
        $this->assertInstanceOf(ImgTag::class, $tag->unsetSizes());
        $this->assertInstanceOf(ImgTag::class, $tag->setSrc('https://example.com/image.jpg'));
        $this->assertInstanceOf(ImgTag::class, $tag->unsetSrc());
        $this->assertInstanceOf(ImgTag::class, $tag->setSrcset('image.jpg 1x'));
        $this->assertInstanceOf(ImgTag::class, $tag->unsetSrcset());
        $this->assertInstanceOf(ImgTag::class, $tag->setUsemap('my-map'));
        $this->assertInstanceOf(ImgTag::class, $tag->unsetUsemap());
        $this->assertInstanceOf(ImgTag::class, $tag->setHeight(480));
        $this->assertInstanceOf(ImgTag::class, $tag->unsetHeight());
        $this->assertInstanceOf(ImgTag::class, $tag->setWidth(640));
        $this->assertInstanceOf(ImgTag::class, $tag->unsetWidth());
    }

}
