<?php

namespace ByJoby\HTML\Html5\Tags;

use ByJoby\HTML\Html5\Enums\As_link;
use ByJoby\HTML\Html5\Enums\CrossOrigin;
use ByJoby\HTML\Html5\Enums\ReferrerPolicy_link;
use ByJoby\HTML\Html5\Enums\Rel_link;
use ByJoby\HTML\Html5\Exceptions\InvalidArgumentsException;

class LinkTagTest extends TagTestCase
{
    public function testAttributeHelpers(): void
    {
        $this->assertAttributeHelperMethods('referrerpolicy', LinkTag::class, ReferrerPolicy_link::origin, 'origin');
        $this->assertAttributeHelperMethods('crossorigin', LinkTag::class, CrossOrigin::anonymous, 'anonymous');
        $this->assertAttributeHelperMethods('crossorigin', LinkTag::class, CrossOrigin::useCredentials, 'use-credentials');
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
        $tag->setAs(As_link::document);
        $this->assertEquals('document', $tag->attributes()->asString('as'));
        // set as to fetch so crossorigin is required
        $tag->setAs(As_link::fetch, CrossOrigin::anonymous);
        $this->assertEquals('fetch', $tag->attributes()->asString('as'));
        $this->assertEquals('anonymous', $tag->attributes()->asString('crossorigin'));
    }

    public function testRelBasic(): void
    {
        $tag = new LinkTag();
        // set rel as a single attribute
        $tag->setRel(Rel_link::prefetch);
        $this->assertEquals('prefetch', $tag->attributes()->asString('rel'));
        // set rel as an array of attributes
        $tag->setRel([Rel_link::prefetch, Rel_link::next]);
        $this->assertEquals('prefetch next', $tag->attributes()->asString('rel'));
        // set deeper values
        $tag->setRel(Rel_link::preload, As_link::fetch, CrossOrigin::anonymous);
        $this->assertEquals('preload', $tag->attributes()->asString('rel'));
        $this->assertEquals('fetch', $tag->attributes()->asString('as'));
        $this->assertEquals('anonymous', $tag->attributes()->asString('crossorigin'));
    }

    public function testRelMIssingAs(): void
    {
        $this->expectException(InvalidArgumentsException::class);
        $tag = new LinkTag();
        $tag->setRel(Rel_link::preload);
    }

    public function testRelMIssingCrossorigin(): void
    {
        $this->expectException(InvalidArgumentsException::class);
        $tag = new LinkTag();
        $tag->setRel(Rel_link::preload, As_link::fetch);
    }
}