<?php

namespace ByJoby\HTML\Html5\Tags;

use ByJoby\HTML\Html5\Tags\MetaTag\HttpEquivValue;
use ByJoby\HTML\Html5\Tags\MetaTag\NameValue;

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
        $tag->setNameAndContent(NameValue::application, 'test');
        $this->assertEquals(NameValue::application->value, $tag->attributes()['name']);
        $this->assertEquals('test', $tag->attributes()['content']);
    }

    public function testHttpEquiv(): void
    {
        $tag = new MetaTag();
        $tag->setHttpEquivAndContent(HttpEquivValue::mime, 'text/plain');
        $this->assertEquals(HttpEquivValue::mime->value, $tag->attributes()['http-equiv']);
        $this->assertEquals('text/plain', $tag->attributes()['content']);
    }

    public function testNameOverrides(): void
    {
        $tag = new MetaTag();
        $tag->setCharset(true);
        $tag->setHttpEquivAndContent(HttpEquivValue::mime, 'text/plain');
        $tag->setNameAndContent(NameValue::application, 'test');
        $this->assertNull($tag->attributes()['charset']);
        $this->assertNull($tag->attributes()['http-equiv']);
    }

    public function testHttpEquivOverrides(): void
    {
        $tag = new MetaTag();
        $tag->setCharset(true);
        $tag->setNameAndContent(NameValue::application, 'test');
        $tag->setHttpEquivAndContent(HttpEquivValue::mime, 'text/plain');
        $this->assertNull($tag->attributes()['charset']);
        $this->assertNull($tag->attributes()['name']);
    }

    public function testCharsetOverrides(): void
    {
        $tag = new MetaTag();
        $tag->setHttpEquivAndContent(HttpEquivValue::mime, 'text/plain');
        $tag->setNameAndContent(NameValue::application, 'test');
        $tag->setCharset(true);
        $this->assertNull($tag->attributes()['name']);
        $this->assertNull($tag->attributes()['http-equiv']);
        $this->assertNull($tag->attributes()['content']);
    }
}