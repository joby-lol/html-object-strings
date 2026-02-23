<?php

namespace Joby\HTML\Html5\InlineTextSemantics;

use Joby\HTML\Helpers\BooleanAttribute;
use Joby\HTML\Html5\Enums\BrowsingContext;
use Joby\HTML\Html5\Tags\TagTestCase;
use Joby\HTML\Html5\Traits\HyperlinkTrait\RelValue;
use Joby\HTML\Html5\Traits\HyperlinkTrait\ReferrerPolicyValue;

class ATagTest extends TagTestCase
{

    public function testAttributeHelpers(): void
    {
        $this->assertAttributeHelperMethods('href', ATag::class);
        $this->assertAttributeHelperMethods('hreflang', ATag::class);
        $this->assertAttributeHelperMethods('ping', ATag::class);
        $this->assertAttributeHelperMethods('type', ATag::class);
    }

    // --- href ---

    public function testHref(): void
    {
        $tag = new ATag();
        $this->assertNull($tag->href());
        $tag->setHref('https://example.com');
        $this->assertEquals('https://example.com', $tag->href());
        $tag->unsetHref();
        $this->assertNull($tag->href());
    }

    public function testHrefNullUnsets(): void
    {
        $tag = new ATag();
        $tag->setHref('https://example.com');
        $tag->setHref(null);
        $this->assertNull($tag->href());
    }

    public function testUnsetHrefAlsoUnsetsHreflang(): void
    {
        $tag = new ATag();
        $tag->setHref('https://example.com');
        $tag->setHreflang('en');
        $tag->unsetHref();
        $this->assertNull($tag->hreflang());
    }

    // --- download ---

    public function testDownloadBoolean(): void
    {
        $tag = new ATag();
        $this->assertNull($tag->download());
        $tag->setDownload(BooleanAttribute::true);
        $this->assertEquals(BooleanAttribute::true, $tag->download());
        $tag->unsetDownload();
        $this->assertNull($tag->download());
    }

    public function testDownloadWithFilename(): void
    {
        $tag = new ATag();
        $tag->setDownload('file.pdf');
        $this->assertEquals('file.pdf', $tag->download());
    }

    public function testDownloadFalseUnsets(): void
    {
        $tag = new ATag();
        $tag->setDownload(BooleanAttribute::true);
        $tag->setDownload(BooleanAttribute::false);
        $this->assertNull($tag->download());
    }

    public function testDownloadNullUnsets(): void
    {
        $tag = new ATag();
        $tag->setDownload(BooleanAttribute::true);
        $tag->setDownload(null);
        $this->assertNull($tag->download());
    }

    // --- hreflang ---

    public function testHreflang(): void
    {
        $tag = new ATag();
        $this->assertNull($tag->hreflang());
        $tag->setHreflang('en');
        $this->assertEquals('en', $tag->hreflang());
        $tag->unsetHreflang();
        $this->assertNull($tag->hreflang());
    }

    public function testHreflangNullUnsets(): void
    {
        $tag = new ATag();
        $tag->setHreflang('en');
        $tag->setHreflang(null);
        $this->assertNull($tag->hreflang());
    }

    // --- ping ---

    public function testPing(): void
    {
        $tag = new ATag();
        $this->assertNull($tag->ping());
        $tag->setPing('https://example.com/ping');
        $this->assertEquals('https://example.com/ping', $tag->ping());
        $tag->unsetPing();
        $this->assertNull($tag->ping());
    }

    public function testPingNullUnsets(): void
    {
        $tag = new ATag();
        $tag->setPing('https://example.com/ping');
        $tag->setPing(null);
        $this->assertNull($tag->ping());
    }

    // --- referrerpolicy ---

    public function testReferrerpolicy(): void
    {
        $tag = new ATag();
        $this->assertNull($tag->referrerpolicy());
        $tag->setReferrerpolicy(ReferrerPolicyValue::origin);
        $this->assertEquals(ReferrerPolicyValue::origin, $tag->referrerpolicy());
        $tag->unsetReferrerpolicy();
        $this->assertNull($tag->referrerpolicy());
    }

    public function testReferrerpolicyNullUnsets(): void
    {
        $tag = new ATag();
        $tag->setReferrerpolicy(ReferrerPolicyValue::origin);
        $tag->setReferrerpolicy(null);
        $this->assertNull($tag->referrerpolicy());
    }

    // --- rel ---

    public function testRelSingle(): void
    {
        $tag = new ATag();
        $this->assertEquals([], $tag->rel());
        $tag->setRel(RelValue::noFollow);
        $this->assertEquals([RelValue::noFollow], $tag->rel());
        $tag->unsetRel();
        $this->assertEquals([], $tag->rel());
    }

    public function testRelArray(): void
    {
        $tag = new ATag();
        $tag->setRel([RelValue::noFollow, RelValue::noOpener]);
        $this->assertEquals([RelValue::noFollow, RelValue::noOpener], $tag->rel());
        $this->assertEquals('nofollow noopener', $tag->attributes()->asString('rel'));
    }

    public function testRelNullUnsets(): void
    {
        $tag = new ATag();
        $tag->setRel(RelValue::noFollow);
        $tag->setRel(null);
        $this->assertEquals([], $tag->rel());
    }

    // --- target ---

    public function testTargetBrowsingContext(): void
    {
        $tag = new ATag();
        $this->assertNull($tag->target());
        $tag->setTarget(BrowsingContext::blank);
        $this->assertEquals(BrowsingContext::blank, $tag->target());
        $this->assertEquals('_blank', $tag->attributes()->asString('target'));
        $tag->unsetTarget();
        $this->assertNull($tag->target());
    }

    public function testTargetCustomString(): void
    {
        $tag = new ATag();
        $tag->setTarget('my-frame');
        $this->assertEquals('my-frame', $tag->target());
    }

    public function testTargetAllBrowsingContexts(): void
    {
        $tag = new ATag();
        foreach (BrowsingContext::cases() as $case) {
            $tag->setTarget($case);
            $this->assertEquals($case, $tag->target());
        }
    }

    public function testTargetNullUnsets(): void
    {
        $tag = new ATag();
        $tag->setTarget(BrowsingContext::blank);
        $tag->setTarget(null);
        $this->assertNull($tag->target());
    }

    // --- type ---

    public function testType(): void
    {
        $tag = new ATag();
        $this->assertNull($tag->type());
        $tag->setType('text/html');
        $this->assertEquals('text/html', $tag->type());
        $tag->unsetType();
        $this->assertNull($tag->type());
    }

    public function testTypeNullUnsets(): void
    {
        $tag = new ATag();
        $tag->setType('text/html');
        $tag->setType(null);
        $this->assertNull($tag->type());
    }

    // --- chaining ---

    public function testChaining(): void
    {
        $tag = new ATag();
        $this->assertInstanceOf(ATag::class, $tag->setHref('https://example.com'));
        $this->assertInstanceOf(ATag::class, $tag->unsetHref());
        $this->assertInstanceOf(ATag::class, $tag->setDownload(BooleanAttribute::true));
        $this->assertInstanceOf(ATag::class, $tag->unsetDownload());
        $this->assertInstanceOf(ATag::class, $tag->setHreflang('en'));
        $this->assertInstanceOf(ATag::class, $tag->unsetHreflang());
        $this->assertInstanceOf(ATag::class, $tag->setPing('https://example.com/ping'));
        $this->assertInstanceOf(ATag::class, $tag->unsetPing());
        $this->assertInstanceOf(ATag::class, $tag->setReferrerpolicy(ReferrerPolicyValue::origin));
        $this->assertInstanceOf(ATag::class, $tag->unsetReferrerpolicy());
        $this->assertInstanceOf(ATag::class, $tag->setRel(RelValue::noFollow));
        $this->assertInstanceOf(ATag::class, $tag->unsetRel());
        $this->assertInstanceOf(ATag::class, $tag->setTarget(BrowsingContext::blank));
        $this->assertInstanceOf(ATag::class, $tag->unsetTarget());
        $this->assertInstanceOf(ATag::class, $tag->setType('text/html'));
        $this->assertInstanceOf(ATag::class, $tag->unsetType());
    }

}
