<?php

namespace ByJoby\HTML\Html5\Tags;

use ByJoby\HTML\Html5\Tags\LinkTag\AsValue;
use ByJoby\HTML\Html5\Tags\LinkTag\ReferrerPolicyValue;
use ByJoby\HTML\Html5\Tags\LinkTag\RelValue;
use ByJoby\HTML\Html5\Exceptions\InvalidArgumentsException;
use ByJoby\HTML\Html5\Traits\CrossoriginTrait\CrossOriginValue;

class LinkTagTest extends TagTestCase
{
    public function testAttributeHelpers(): void
    {
        $this->assertAttributeHelperMethods('referrerpolicy', LinkTag::class, ReferrerPolicyValue::origin, 'origin');
        $this->assertAttributeHelperMethods('crossorigin', LinkTag::class, CrossOriginValue::anonymous, 'anonymous');
        $this->assertAttributeHelperMethods('crossorigin', LinkTag::class, CrossOriginValue::useCredentials, 'use-credentials');
        $this->assertAttributeHelperMethods('href', LinkTag::class);
        $this->assertAttributeHelperMethods('hreflang', LinkTag::class);
        $this->assertAttributeHelperMethods('imagesizes', LinkTag::class);
        $this->assertAttributeHelperMethods('imagesrcset', LinkTag::class);
        $this->assertAttributeHelperMethods('integrity', LinkTag::class);
        $this->assertAttributeHelperMethods('media', LinkTag::class);
        $this->assertAttributeHelperMethods('type', LinkTag::class);
    }

    public function testAsBasic(): void
    {
        $tag = new LinkTag();
        // set as to something that can be set alone
        $tag->setAs(AsValue::document);
        $this->assertEquals('document', $tag->attributes()->asString('as'));
        // set as to fetch so crossorigin is required
        $tag->setAs(AsValue::fetch, CrossOriginValue::anonymous);
        $this->assertEquals('fetch', $tag->attributes()->asString('as'));
        $this->assertEquals('anonymous', $tag->attributes()->asString('crossorigin'));
    }

    public function testRelBasic(): void
    {
        $tag = new LinkTag();
        // set rel as a single attribute
        $tag->setRel(RelValue::prefetch);
        $this->assertEquals('prefetch', $tag->attributes()->asString('rel'));
        // set rel as an array of attributes
        $tag->setRel([RelValue::prefetch, RelValue::next]);
        $this->assertEquals('prefetch next', $tag->attributes()->asString('rel'));
        // set deeper values
        $tag->setRel(RelValue::preload, AsValue::fetch, CrossOriginValue::anonymous);
        $this->assertEquals('preload', $tag->attributes()->asString('rel'));
        $this->assertEquals('fetch', $tag->attributes()->asString('as'));
        $this->assertEquals('anonymous', $tag->attributes()->asString('crossorigin'));
    }

    public function testRelMIssingAs(): void
    {
        $this->expectException(InvalidArgumentsException::class);
        $tag = new LinkTag();
        $tag->setRel(RelValue::preload);
    }

    public function testRelMIssingCrossorigin(): void
    {
        $this->expectException(InvalidArgumentsException::class);
        $tag = new LinkTag();
        $tag->setRel(RelValue::preload, AsValue::fetch);
    }
}