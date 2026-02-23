<?php

namespace Joby\HTML\Html5\InlineTextSemantics;

use Joby\HTML\Html5\InlineTextSemantics\TimeTag\DatetimeValue;
use Joby\HTML\Html5\Tags\TagTestCase;

class InsTagTest extends TagTestCase
{

    public function testAttributeHelpers(): void
    {
        $this->assertAttributeHelperMethods('cite', InsTag::class);
    }

    public function testCite(): void
    {
        $tag = new InsTag();
        $this->assertNull($tag->cite());
        $tag->setCite('https://example.com/minutes');
        $this->assertEquals('https://example.com/minutes', $tag->cite());
        $tag->unsetCite();
        $this->assertNull($tag->cite());
    }

    public function testCiteNullUnsets(): void
    {
        $tag = new InsTag();
        $tag->setCite('https://example.com/minutes');
        $tag->setCite(null);
        $this->assertNull($tag->cite());
    }

    public function testDatetime(): void
    {
        $tag = new InsTag();
        $this->assertNull($tag->datetime());
        $value = DatetimeValue::fromString('2011-11-18T14:54:39Z');
        $tag->setDatetime($value);
        $this->assertInstanceOf(DatetimeValue::class, $tag->datetime());
        $tag->unsetDatetime();
        $this->assertNull($tag->datetime());
    }

    public function testDatetimeNullUnsets(): void
    {
        $tag = new InsTag();
        $tag->setDatetime(DatetimeValue::fromString('2011-11-18T14:54:39Z'));
        $tag->setDatetime(null);
        $this->assertNull($tag->datetime());
    }

    public function testChaining(): void
    {
        $tag = new InsTag();
        $this->assertInstanceOf(InsTag::class, $tag->setCite('https://example.com/minutes'));
        $this->assertInstanceOf(InsTag::class, $tag->unsetCite());
        $this->assertInstanceOf(InsTag::class, $tag->setDatetime(DatetimeValue::fromString('2011-11-18T14:54:39Z')));
        $this->assertInstanceOf(InsTag::class, $tag->unsetDatetime());
    }

}
