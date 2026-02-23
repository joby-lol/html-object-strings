<?php

/**
 * HTML Object Strings
 * https://github.com/joby-lol/html-object-strings
 * (c) 2024-2026 Joby Elliott code@joby.lol
 * MIT License https://opensource.org/licenses/MIT
 */

namespace Joby\HTML\Html5\Tags;

use Joby\HTML\Html5\Tags\SvgTag\PreserveAspectRatioValue;

class SvgTagTest extends TagTestCase
{

    // --- constructor ---

    public function testConstructorSetsContent(): void
    {
        $tag = new SvgTag('<circle cx="50" cy="50" r="40"/>');
        $this->assertStringContainsString('<circle cx="50" cy="50" r="40"/>', (string) $tag->content());
    }

    public function testConstructorSetsXmlns(): void
    {
        $tag = new SvgTag('');
        $this->assertStringContainsString('xmlns="http://www.w3.org/2000/svg"', (string) $tag);
    }

    // --- height ---

    public function testHeightDefaultsToNull(): void
    {
        $tag = new SvgTag('');
        $this->assertNull($tag->height());
    }

    public function testSetHeight(): void
    {
        $tag = new SvgTag('');
        $tag->setHeight(100);
        $this->assertSame(100, $tag->height());
    }

    public function testSetHeightToNullUnsets(): void
    {
        $tag = new SvgTag('');
        $tag->setHeight(100)->setHeight(null);
        $this->assertNull($tag->height());
    }

    public function testUnsetHeight(): void
    {
        $tag = new SvgTag('');
        $tag->setHeight(100)->unsetHeight();
        $this->assertNull($tag->height());
    }

    // --- width ---

    public function testWidthDefaultsToNull(): void
    {
        $tag = new SvgTag('');
        $this->assertNull($tag->width());
    }

    public function testSetWidth(): void
    {
        $tag = new SvgTag('');
        $tag->setWidth(200);
        $this->assertSame(200, $tag->width());
    }

    public function testSetWidthToNullUnsets(): void
    {
        $tag = new SvgTag('');
        $tag->setWidth(200)->setWidth(null);
        $this->assertNull($tag->width());
    }

    public function testUnsetWidth(): void
    {
        $tag = new SvgTag('');
        $tag->setWidth(200)->unsetWidth();
        $this->assertNull($tag->width());
    }

    // --- viewBox ---

    public function testSetViewBox(): void
    {
        $tag = new SvgTag('');
        $tag->setViewBox(0, 0, 100, 200);
        $this->assertStringContainsString('viewbox="0 0 100 200"', (string) $tag);
    }

    public function testSetViewBoxWithNonzeroOrigin(): void
    {
        $tag = new SvgTag('');
        $tag->setViewBox(-10, -20, 100, 200);
        $this->assertStringContainsString('viewbox="-10 -20 100 200"', (string) $tag);
    }

    public function testUnsetViewBox(): void
    {
        $tag = new SvgTag('');
        $tag->setViewBox(0, 0, 100, 200)->unsetViewBox();
        $this->assertStringNotContainsString('viewbox=', (string) $tag);
    }

    // --- preserveAspectRatio ---

    public function testSetPreserveAspectRatioMeet(): void
    {
        $tag = new SvgTag('');
        $tag->setPreserveAspectRatio(PreserveAspectRatioValue::xMidYMid);
        $this->assertStringContainsString('preserveaspectratio="xMidYMid"', (string) $tag);
    }

    public function testSetPreserveAspectRatioSlice(): void
    {
        $tag = new SvgTag('');
        $tag->setPreserveAspectRatio(PreserveAspectRatioValue::xMidYMid, true);
        $this->assertStringContainsString('preserveaspectratio="xMidYMid slice"', (string) $tag);
    }

    public function testSetPreserveAspectRatioNone(): void
    {
        $tag = new SvgTag('');
        $tag->setPreserveAspectRatio(PreserveAspectRatioValue::none);
        $this->assertStringContainsString('preserveaspectratio="none"', (string) $tag);
    }

    public function testSetPreserveAspectRatioNullUnsets(): void
    {
        $tag = new SvgTag('');
        $tag->setPreserveAspectRatio(PreserveAspectRatioValue::xMidYMid)->setPreserveAspectRatio(null);
        $this->assertStringNotContainsString('preserveaspectratio=', (string) $tag);
    }

    public function testUnsetPreserveAspectRatio(): void
    {
        $tag = new SvgTag('');
        $tag->setPreserveAspectRatio(PreserveAspectRatioValue::xMidYMid)->unsetPreserveAspectRatio();
        $this->assertStringNotContainsString('preserveaspectratio=', (string) $tag);
    }

    // --- chaining ---

    public function testChaining(): void
    {
        $tag = new SvgTag('');
        $this->assertInstanceOf(SvgTag::class, $tag->setHeight(100));
        $this->assertInstanceOf(SvgTag::class, $tag->unsetHeight());
        $this->assertInstanceOf(SvgTag::class, $tag->setWidth(100));
        $this->assertInstanceOf(SvgTag::class, $tag->unsetWidth());
        $this->assertInstanceOf(SvgTag::class, $tag->setViewBox(0, 0, 100, 100));
        $this->assertInstanceOf(SvgTag::class, $tag->unsetViewBox());
        $this->assertInstanceOf(SvgTag::class, $tag->setPreserveAspectRatio(PreserveAspectRatioValue::xMidYMid));
        $this->assertInstanceOf(SvgTag::class, $tag->unsetPreserveAspectRatio());
    }

}
