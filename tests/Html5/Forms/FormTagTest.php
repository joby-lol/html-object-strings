<?php

namespace Joby\HTML\Html5\Forms;

use Joby\HTML\Html5\Enums\BrowsingContext;
use Joby\HTML\Html5\Tags\TagTestCase;

class FormTagTest extends TagTestCase
{

    // --- action ---

    public function testActionNullByDefault(): void
    {
        $tag = new FormTag();
        $this->assertNull($tag->action());
    }

    public function testAction(): void
    {
        $tag = new FormTag();
        $tag->setAction('https://example.com/submit');
        $this->assertEquals('https://example.com/submit', $tag->action());
        $tag->unsetAction();
        $this->assertNull($tag->action());
    }

    public function testActionNullUnsets(): void
    {
        $tag = new FormTag();
        $tag->setAction('https://example.com/submit');
        $tag->setAction(null);
        $this->assertNull($tag->action());
    }

    // --- enctype ---

    public function testEnctypeNullByDefault(): void
    {
        $tag = new FormTag();
        $this->assertNull($tag->enctype());
    }

    public function testEnctype(): void
    {
        $tag = new FormTag();
        $tag->setEnctype('multipart/form-data');
        $this->assertEquals('multipart/form-data', $tag->enctype());
        $tag->unsetEnctype();
        $this->assertNull($tag->enctype());
    }

    public function testEnctypeNullUnsets(): void
    {
        $tag = new FormTag();
        $tag->setEnctype('multipart/form-data');
        $tag->setEnctype(null);
        $this->assertNull($tag->enctype());
    }

    // --- method ---

    public function testMethodNullByDefault(): void
    {
        $tag = new FormTag();
        $this->assertNull($tag->method());
    }

    public function testMethod(): void
    {
        $tag = new FormTag();
        $tag->setMethod('post');
        $this->assertEquals('post', $tag->method());
        $tag->unsetMethod();
        $this->assertNull($tag->method());
    }

    public function testMethodDialog(): void
    {
        $tag = new FormTag();
        $tag->setMethod('dialog');
        $this->assertEquals('dialog', $tag->method());
    }

    public function testMethodNullUnsets(): void
    {
        $tag = new FormTag();
        $tag->setMethod('post');
        $tag->setMethod(null);
        $this->assertNull($tag->method());
    }

    // --- name ---

    public function testNameNullByDefault(): void
    {
        $tag = new FormTag();
        $this->assertNull($tag->name());
    }

    public function testName(): void
    {
        $tag = new FormTag();
        $tag->setName('my-form');
        $this->assertEquals('my-form', $tag->name());
        $tag->unsetName();
        $this->assertNull($tag->name());
    }

    public function testNameNullUnsets(): void
    {
        $tag = new FormTag();
        $tag->setName('my-form');
        $tag->setName(null);
        $this->assertNull($tag->name());
    }

    // --- novalidate ---

    public function testNovalidateFalseByDefault(): void
    {
        $tag = new FormTag();
        $this->assertFalse($tag->novalidate());
    }

    public function testNovalidate(): void
    {
        $tag = new FormTag();
        $tag->setNovalidate(true);
        $this->assertTrue($tag->novalidate());
        $tag->setNovalidate(false);
        $this->assertFalse($tag->novalidate());
    }

    // --- target ---

    public function testTargetNullByDefault(): void
    {
        $tag = new FormTag();
        $this->assertNull($tag->target());
    }

    public function testTargetBrowsingContext(): void
    {
        $tag = new FormTag();
        $tag->setTarget(BrowsingContext::blank);
        $this->assertEquals(BrowsingContext::blank, $tag->target());
        $tag->unsetTarget();
        $this->assertNull($tag->target());
    }

    public function testTargetCustomString(): void
    {
        $tag = new FormTag();
        $tag->setTarget('my-frame');
        $this->assertEquals('my-frame', $tag->target());
    }

    public function testTargetNullUnsets(): void
    {
        $tag = new FormTag();
        $tag->setTarget(BrowsingContext::blank);
        $tag->setTarget(null);
        $this->assertNull($tag->target());
    }

    // --- rel ---

    public function testRelNullByDefault(): void
    {
        $tag = new FormTag();
        $this->assertNull($tag->rel());
    }

    public function testRel(): void
    {
        $tag = new FormTag();
        $tag->setRel('nofollow noreferrer');
        $this->assertEquals('nofollow noreferrer', $tag->rel());
        $tag->unsetRel();
        $this->assertNull($tag->rel());
    }

    public function testRelNullUnsets(): void
    {
        $tag = new FormTag();
        $tag->setRel('nofollow');
        $tag->setRel(null);
        $this->assertNull($tag->rel());
    }

    // --- chaining ---

    public function testChaining(): void
    {
        $tag = new FormTag();
        $this->assertInstanceOf(FormTag::class, $tag->setAction('https://example.com/submit'));
        $this->assertInstanceOf(FormTag::class, $tag->unsetAction());
        $this->assertInstanceOf(FormTag::class, $tag->setEnctype('multipart/form-data'));
        $this->assertInstanceOf(FormTag::class, $tag->unsetEnctype());
        $this->assertInstanceOf(FormTag::class, $tag->setMethod('post'));
        $this->assertInstanceOf(FormTag::class, $tag->unsetMethod());
        $this->assertInstanceOf(FormTag::class, $tag->setName('my-form'));
        $this->assertInstanceOf(FormTag::class, $tag->unsetName());
        $this->assertInstanceOf(FormTag::class, $tag->setNovalidate(true));
        $this->assertInstanceOf(FormTag::class, $tag->setTarget(BrowsingContext::blank));
        $this->assertInstanceOf(FormTag::class, $tag->unsetTarget());
        $this->assertInstanceOf(FormTag::class, $tag->setRel('nofollow'));
        $this->assertInstanceOf(FormTag::class, $tag->unsetRel());
    }

}
