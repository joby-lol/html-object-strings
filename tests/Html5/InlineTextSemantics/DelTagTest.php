<?php

namespace Joby\HTML\Html5\InlineTextSemantics;

use Joby\HTML\Html5\InlineTextSemantics\TimeTag\DatetimeValue;
use Joby\HTML\Html5\Tags\TagTestCase;

class DelTagTest extends TagTestCase
{

    public function testAttributeHelpers(): void
    {
        $this->assertAttributeHelperMethods('cite', DelTag::class);
    }

    public function testCite(): void
    {
        $tag = new DelTag();
        $this->assertNull($tag->cite());
        $tag->setCite('https://example.com/minutes');
        $this->assertEquals('https://example.com/minutes', $tag->cite());
        $tag->unsetCite();
        $this->assertNull($tag->cite());
    }

    public function testCiteNullUnsets(): void
    {
        $tag = new DelTag();
        $tag->setCite('https://example.com/minutes');
        $tag->setCite(null);
        $this->assertNull($tag->cite());
    }

    public function testDatetime(): void
    {
        $tag = new DelTag();
        $this->assertNull($tag->datetime());
        $value = DatetimeValue::fromString('2011-11-18T14:54:39Z');
        $tag->setDatetime($value);
        $this->assertInstanceOf(DatetimeValue::class, $tag->datetime());
        $tag->unsetDatetime();
        $this->assertNull($tag->datetime());
    }

    public function testDatetimeNullUnsets(): void
    {
        $tag = new DelTag();
        $tag->setDatetime(DatetimeValue::fromString('2011-11-18T14:54:39Z'));
        $tag->setDatetime(null);
        $this->assertNull($tag->datetime());
    }

    public function testChaining(): void
    {
        $tag = new DelTag();
        $this->assertInstanceOf(DelTag::class, $tag->setCite('https://example.com/minutes'));
        $this->assertInstanceOf(DelTag::class, $tag->unsetCite());
        $this->assertInstanceOf(DelTag::class, $tag->setDatetime(DatetimeValue::fromString('2011-11-18T14:54:39Z')));
        $this->assertInstanceOf(DelTag::class, $tag->unsetDatetime());
    }

}
