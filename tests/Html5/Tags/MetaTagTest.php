<?php

namespace ByJoby\HTML\Html5\Tags;

use ByJoby\HTML\Html5\Enums\HttpEquiv_meta;
use ByJoby\HTML\Html5\Enums\Name_meta;

class MetaTagTest extends TagTestCase
{
    public function testCharset(): void
    {
        $tag = new MetaTag();
        $tag->setCharset(true);
        $this->assertEquals("utf-8", $tag->attributes()['charset']);
        $tag->setCharset(false);
        $this->assertNull($tag->attributes()['charset']);
    }

    public function testName(): void
    {
        $tag = new MetaTag();
        $tag->setNameAndContent(Name_meta::application, 'test');
        $this->assertEquals(Name_meta::application->value, $tag->attributes()['name']);
        $this->assertEquals('test', $tag->attributes()['content']);
    }

    public function testHttpEquiv(): void
    {
        $tag = new MetaTag();
        $tag->setHttpEquivAndContent(HttpEquiv_meta::mime, 'text/plain');
        $this->assertEquals(HttpEquiv_meta::mime->value, $tag->attributes()['http-equiv']);
        $this->assertEquals('text/plain', $tag->attributes()['content']);
    }

    public function testNameOverrides(): void
    {
        $tag = new MetaTag();
        $tag->setCharset(true);
        $tag->setHttpEquivAndContent(HttpEquiv_meta::mime, 'text/plain');
        $tag->setNameAndContent(Name_meta::application, 'test');
        $this->assertNull($tag->attributes()['charset']);
        $this->assertNull($tag->attributes()['http-equiv']);
    }

    public function testHttpEquivOverrides(): void
    {
        $tag = new MetaTag();
        $tag->setCharset(true);
        $tag->setNameAndContent(Name_meta::application, 'test');
        $tag->setHttpEquivAndContent(HttpEquiv_meta::mime, 'text/plain');
        $this->assertNull($tag->attributes()['charset']);
        $this->assertNull($tag->attributes()['name']);
    }

    public function testCharsetOverrides(): void
    {
        $tag = new MetaTag();
        $tag->setHttpEquivAndContent(HttpEquiv_meta::mime, 'text/plain');
        $tag->setNameAndContent(Name_meta::application, 'test');
        $tag->setCharset(true);
        $this->assertNull($tag->attributes()['name']);
        $this->assertNull($tag->attributes()['http-equiv']);
        $this->assertNull($tag->attributes()['content']);
    }
}