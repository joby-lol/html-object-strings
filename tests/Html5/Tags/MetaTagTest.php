<?php

namespace Joby\HTML\Html5\Tags;

use Joby\HTML\Html5\Tags\MetaTag\HttpEquivValue;
use Joby\HTML\Html5\Tags\MetaTag\NameValue;
use Joby\HTML\Html5\Tags\MetaTag\RobotsValue;

class MetaTagTest extends TagTestCase
{

    // --- setNameAndContent ---

    public function testSetNameAndContentWithString(): void
    {
        $tag = new MetaTag();
        $tag->setNameAndContent('author', 'Jane Smith');
        $this->assertEquals('Jane Smith', $tag->content());
        $this->assertEquals('author', $tag->attributes()->asString('name'));
        $this->assertNull($tag->httpEquiv());
        $this->assertFalse($tag->charset());
    }

    public function testSetNameAndContentWithEnum(): void
    {
        $tag = new MetaTag();
        $tag->setNameAndContent(NameValue::description, 'A great page');
        $this->assertEquals(NameValue::description, $tag->name());
        $this->assertEquals('A great page', $tag->content());
    }

    public function testSetNameAndContentClearsHttpEquiv(): void
    {
        $tag = new MetaTag();
        $tag->setHttpEquivAndContent(HttpEquivValue::refresh, '30');
        $tag->setNameAndContent(NameValue::author, 'Jane');
        $this->assertNull($tag->httpEquiv());
    }

    public function testSetNameAndContentClearsCharset(): void
    {
        $tag = new MetaTag();
        $tag->setCharset(true);
        $tag->setNameAndContent(NameValue::author, 'Jane');
        $this->assertFalse($tag->charset());
    }

    // --- name() returns enum or string ---

    public function testNameReturnsEnumForKnownValue(): void
    {
        $tag = new MetaTag();
        $tag->setNameAndContent(NameValue::keywords, 'php, html');
        $this->assertInstanceOf(NameValue::class, $tag->name());
        $this->assertEquals(NameValue::keywords, $tag->name());
    }

    public function testNameReturnsStringForUnknownValue(): void
    {
        $tag = new MetaTag();
        $tag->setNameAndContent('custom-name', 'some value');
        $this->assertEquals('custom-name', $tag->name());
    }

    public function testNameNullByDefault(): void
    {
        $tag = new MetaTag();
        $this->assertNull($tag->name());
    }

    // --- setHttpEquivAndContent ---

    public function testSetHttpEquivAndContent(): void
    {
        $tag = new MetaTag();
        $tag->setHttpEquivAndContent(HttpEquivValue::refresh, '30');
        $this->assertEquals(HttpEquivValue::refresh, $tag->httpEquiv());
        $this->assertEquals('30', $tag->content());
        $this->assertNull($tag->name());
        $this->assertFalse($tag->charset());
    }

    public function testSetHttpEquivClearsName(): void
    {
        $tag = new MetaTag();
        $tag->setNameAndContent(NameValue::author, 'Jane');
        $tag->setHttpEquivAndContent(HttpEquivValue::refresh, '30');
        $this->assertNull($tag->name());
    }

    public function testSetHttpEquivClearsCharset(): void
    {
        $tag = new MetaTag();
        $tag->setCharset(true);
        $tag->setHttpEquivAndContent(HttpEquivValue::refresh, '30');
        $this->assertFalse($tag->charset());
    }

    public function testHttpEquivNullByDefault(): void
    {
        $tag = new MetaTag();
        $this->assertNull($tag->httpEquiv());
    }

    // --- charset ---

    public function testCharsetFalseByDefault(): void
    {
        $tag = new MetaTag();
        $this->assertFalse($tag->charset());
    }

    public function testSetCharsetTrue(): void
    {
        $tag = new MetaTag();
        $tag->setCharset(true);
        $this->assertTrue($tag->charset());
        $this->assertEquals('utf-8', $tag->attributes()->asString('charset'));
    }

    public function testSetCharsetFalse(): void
    {
        $tag = new MetaTag();
        $tag->setCharset(true);
        $tag->setCharset(false);
        $this->assertFalse($tag->charset());
    }

    public function testSetCharsetClearsNameAndContent(): void
    {
        $tag = new MetaTag();
        $tag->setNameAndContent(NameValue::author, 'Jane');
        $tag->setCharset(true);
        $this->assertNull($tag->name());
        $this->assertNull($tag->content());
    }

    public function testSetCharsetClearsHttpEquiv(): void
    {
        $tag = new MetaTag();
        $tag->setHttpEquivAndContent(HttpEquivValue::refresh, '30');
        $tag->setCharset(true);
        $this->assertNull($tag->httpEquiv());
    }

    // --- setRobots ---

    public function testSetRobotsSingle(): void
    {
        $tag = new MetaTag();
        $tag->setRobots(RobotsValue::noIndex);
        $this->assertEquals(NameValue::robots, $tag->name());
        $this->assertEquals('noindex', $tag->content());
    }

    public function testSetRobotsArray(): void
    {
        $tag = new MetaTag();
        $tag->setRobots([RobotsValue::noIndex, RobotsValue::noFollow]);
        $this->assertEquals('noindex,nofollow', $tag->content());
    }

    // --- chaining ---

    public function testChaining(): void
    {
        $tag = new MetaTag();
        $this->assertInstanceOf(MetaTag::class, $tag->setNameAndContent(NameValue::author, 'Jane'));
        $this->assertInstanceOf(MetaTag::class, $tag->setHttpEquivAndContent(HttpEquivValue::refresh, '30'));
        $this->assertInstanceOf(MetaTag::class, $tag->setRobots(RobotsValue::noIndex));
        $this->assertInstanceOf(MetaTag::class, $tag->setCharset(true));
        $this->assertInstanceOf(MetaTag::class, $tag->setCharset(false));
    }

}
