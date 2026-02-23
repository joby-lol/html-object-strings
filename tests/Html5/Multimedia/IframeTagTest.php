<?php

namespace Joby\HTML\Html5\Multimedia;

use Joby\HTML\Html5\Multimedia\IframeTag\ReferrerPolicyValue;
use Joby\HTML\Html5\Multimedia\IframeTag\SandboxValue;
use Joby\HTML\Html5\Tags\TagTestCase;

class IframeTagTest extends TagTestCase
{

    public function testAttributeHelpers(): void
    {
        $this->assertAttributeHelperMethods('allow', IframeTag::class);
        $this->assertAttributeHelperMethods('name', IframeTag::class);
        $this->assertAttributeHelperMethods('src', IframeTag::class);
        $this->assertAttributeHelperMethods('srcdoc', IframeTag::class);
    }

    // --- allow ---

    public function testAllow(): void
    {
        $tag = new IframeTag();
        $this->assertNull($tag->allow());
        $tag->setAllow('camera; microphone');
        $this->assertEquals('camera; microphone', $tag->allow());
        $tag->unsetAllow();
        $this->assertNull($tag->allow());
    }

    public function testAllowNullUnsets(): void
    {
        $tag = new IframeTag();
        $tag->setAllow('camera');
        $tag->setAllow(null);
        $this->assertNull($tag->allow());
    }

    // --- lazy ---

    public function testLazy(): void
    {
        $tag = new IframeTag();
        $this->assertFalse($tag->lazy());
        $tag->setLazy(true);
        $this->assertTrue($tag->lazy());
        $tag->setLazy(false);
        $this->assertFalse($tag->lazy());
    }

    // --- name ---

    public function testName(): void
    {
        $tag = new IframeTag();
        $this->assertNull($tag->name());
        $tag->setName('my-frame');
        $this->assertEquals('my-frame', $tag->name());
        $tag->unsetName();
        $this->assertNull($tag->name());
    }

    public function testNameNullUnsets(): void
    {
        $tag = new IframeTag();
        $tag->setName('my-frame');
        $tag->setName(null);
        $this->assertNull($tag->name());
    }

    // --- referrerpolicy ---

    public function testReferrerpolicy(): void
    {
        $tag = new IframeTag();
        $this->assertNull($tag->referrerpolicy());
        $tag->setReferrerpolicy(ReferrerPolicyValue::origin);
        $this->assertEquals(ReferrerPolicyValue::origin, $tag->referrerpolicy());
        $tag->unsetReferrerpolicy();
        $this->assertNull($tag->referrerpolicy());
    }

    public function testReferrerpolicyNullUnsets(): void
    {
        $tag = new IframeTag();
        $tag->setReferrerpolicy(ReferrerPolicyValue::origin);
        $tag->setReferrerpolicy(null);
        $this->assertNull($tag->referrerpolicy());
    }

    // --- sandbox ---

    public function testSandboxNullByDefault(): void
    {
        $tag = new IframeTag();
        $this->assertNull($tag->sandbox());
    }

    public function testSandboxDenyAll(): void
    {
        $tag = new IframeTag();
        $tag->setSandbox(SandboxValue::denyAll);
        $this->assertEquals([SandboxValue::denyAll], $tag->sandbox());
        $this->assertEquals('', $tag->attributes()->asString('sandbox'));
    }

    public function testSandboxEmptyArrayImpliesDenyAll(): void
    {
        $tag = new IframeTag();
        $tag->setSandbox([]);
        $this->assertEquals([SandboxValue::denyAll], $tag->sandbox());
    }

    public function testSandboxSingleValue(): void
    {
        $tag = new IframeTag();
        $tag->setSandbox(SandboxValue::allowScripts);
        $this->assertEquals([SandboxValue::allowScripts], $tag->sandbox());
        $this->assertEquals('allow-scripts', $tag->attributes()->asString('sandbox'));
    }

    public function testSandboxArray(): void
    {
        $tag = new IframeTag();
        $tag->setSandbox([SandboxValue::allowScripts, SandboxValue::allowForms]);
        $this->assertEquals([SandboxValue::allowScripts, SandboxValue::allowForms], $tag->sandbox());
        $this->assertEquals('allow-scripts allow-forms', $tag->attributes()->asString('sandbox'));
    }

    public function testSandboxNullUnsets(): void
    {
        $tag = new IframeTag();
        $tag->setSandbox(SandboxValue::allowScripts);
        $tag->setSandbox(null);
        $this->assertNull($tag->sandbox());
    }

    public function testUnsetSandbox(): void
    {
        $tag = new IframeTag();
        $tag->setSandbox(SandboxValue::allowScripts);
        $tag->unsetSandbox();
        $this->assertNull($tag->sandbox());
    }

    // --- src ---

    public function testSrc(): void
    {
        $tag = new IframeTag();
        $this->assertNull($tag->src());
        $tag->setSrc('https://example.com');
        $this->assertEquals('https://example.com', $tag->src());
        $tag->unsetSrc();
        $this->assertNull($tag->src());
    }

    public function testSrcNullUnsets(): void
    {
        $tag = new IframeTag();
        $tag->setSrc('https://example.com');
        $tag->setSrc(null);
        $this->assertNull($tag->src());
    }

    // --- srcdoc ---

    public function testSrcdoc(): void
    {
        $tag = new IframeTag();
        $this->assertNull($tag->srcdoc());
        $tag->setSrcdoc('<p>Hello</p>');
        $this->assertEquals('<p>Hello</p>', $tag->srcdoc());
        $tag->unsetSrcdoc();
        $this->assertNull($tag->srcdoc());
    }

    public function testSrcdocNullUnsets(): void
    {
        $tag = new IframeTag();
        $tag->setSrcdoc('<p>Hello</p>');
        $tag->setSrcdoc(null);
        $this->assertNull($tag->srcdoc());
    }

    // --- height/width ---

    public function testHeight(): void
    {
        $tag = new IframeTag();
        $this->assertNull($tag->height());
        $tag->setHeight(480);
        $this->assertEquals(480, $tag->height());
        $tag->unsetHeight();
        $this->assertNull($tag->height());
    }

    public function testHeightZeroIsValid(): void
    {
        $tag = new IframeTag();
        $tag->setHeight(0);
        $this->assertEquals(0, $tag->height());
    }

    public function testWidth(): void
    {
        $tag = new IframeTag();
        $this->assertNull($tag->width());
        $tag->setWidth(640);
        $this->assertEquals(640, $tag->width());
        $tag->unsetWidth();
        $this->assertNull($tag->width());
    }

    public function testWidthZeroIsValid(): void
    {
        $tag = new IframeTag();
        $tag->setWidth(0);
        $this->assertEquals(0, $tag->width());
    }

    // --- chaining ---

    public function testChaining(): void
    {
        $tag = new IframeTag();
        $this->assertInstanceOf(IframeTag::class, $tag->setAllow('camera'));
        $this->assertInstanceOf(IframeTag::class, $tag->unsetAllow());
        $this->assertInstanceOf(IframeTag::class, $tag->setLazy(true));
        $this->assertInstanceOf(IframeTag::class, $tag->setName('my-frame'));
        $this->assertInstanceOf(IframeTag::class, $tag->unsetName());
        $this->assertInstanceOf(IframeTag::class, $tag->setReferrerpolicy(ReferrerPolicyValue::origin));
        $this->assertInstanceOf(IframeTag::class, $tag->unsetReferrerpolicy());
        $this->assertInstanceOf(IframeTag::class, $tag->setSandbox(SandboxValue::allowScripts));
        $this->assertInstanceOf(IframeTag::class, $tag->unsetSandbox());
        $this->assertInstanceOf(IframeTag::class, $tag->setSrc('https://example.com'));
        $this->assertInstanceOf(IframeTag::class, $tag->unsetSrc());
        $this->assertInstanceOf(IframeTag::class, $tag->setSrcdoc('<p>Hello</p>'));
        $this->assertInstanceOf(IframeTag::class, $tag->unsetSrcdoc());
        $this->assertInstanceOf(IframeTag::class, $tag->setHeight(480));
        $this->assertInstanceOf(IframeTag::class, $tag->unsetHeight());
        $this->assertInstanceOf(IframeTag::class, $tag->setWidth(640));
        $this->assertInstanceOf(IframeTag::class, $tag->unsetWidth());
    }

}
