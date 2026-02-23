<?php

namespace Joby\HTML\Html5\Tables;

use Joby\HTML\Html5\Tables\ThTag\ScopeValue;
use Joby\HTML\Html5\Tags\TagTestCase;
use Joby\HTML\Nodes\Text;

class ThTagTest extends TagTestCase
{

    // --- constructor ---

    public function testDefaultConstructor(): void
    {
        $tag = new ThTag();
        $this->assertEmpty($tag->children());
    }

    // --- children ---

    public function testAddTextChild(): void
    {
        $tag = new ThTag();
        $text = new Text('header content');
        $tag->addChild($text);
        $this->assertContains($text, $tag->children());
    }

    // --- colspan (via CellTrait) ---

    public function testColspanDefaultsToNull(): void
    {
        $tag = new ThTag();
        $this->assertNull($tag->colspan());
    }

    public function testSetColspan(): void
    {
        $tag = new ThTag();
        $tag->setColspan(3);
        $this->assertSame(3, $tag->colspan());
    }

    public function testUnsetColspan(): void
    {
        $tag = new ThTag();
        $tag->setColspan(3)->unsetColspan();
        $this->assertNull($tag->colspan());
    }

    // --- rowspan (via CellTrait) ---

    public function testRowspanDefaultsToNull(): void
    {
        $tag = new ThTag();
        $this->assertNull($tag->rowspan());
    }

    public function testSetRowspan(): void
    {
        $tag = new ThTag();
        $tag->setRowspan(2);
        $this->assertSame(2, $tag->rowspan());
    }

    public function testUnsetRowspan(): void
    {
        $tag = new ThTag();
        $tag->setRowspan(2)->unsetRowspan();
        $this->assertNull($tag->rowspan());
    }

    // --- headers (via CellTrait) ---

    public function testHeadersDefaultsToNull(): void
    {
        $tag = new ThTag();
        $this->assertNull($tag->headers());
    }

    public function testSetHeaders(): void
    {
        $tag = new ThTag();
        $tag->setHeaders('col1 col2');
        $this->assertSame('col1 col2', $tag->headers());
    }

    public function testUnsetHeaders(): void
    {
        $tag = new ThTag();
        $tag->setHeaders('col1')->unsetHeaders();
        $this->assertNull($tag->headers());
    }

    // --- scope ---

    public function testScopeDefaultsToNull(): void
    {
        $tag = new ThTag();
        $this->assertNull($tag->scope());
    }

    public function testSetScope(): void
    {
        $tag = new ThTag();
        $tag->setScope(ScopeValue::col);
        $this->assertSame(ScopeValue::col, $tag->scope());
    }

    public function testSetScopeAllValues(): void
    {
        $tag = new ThTag();
        foreach (ScopeValue::cases() as $case) {
            $tag->setScope($case);
            $this->assertSame($case, $tag->scope());
        }
    }

    public function testSetScopeToNullUnsets(): void
    {
        $tag = new ThTag();
        $tag->setScope(ScopeValue::row)->setScope(null);
        $this->assertNull($tag->scope());
    }

    public function testUnsetScope(): void
    {
        $tag = new ThTag();
        $tag->setScope(ScopeValue::row)->unsetScope();
        $this->assertNull($tag->scope());
    }

    // --- abbr ---

    public function testAbbrDefaultsToNull(): void
    {
        $tag = new ThTag();
        $this->assertNull($tag->abbr());
    }

    public function testSetAbbr(): void
    {
        $tag = new ThTag();
        $tag->setAbbr('Name');
        $this->assertSame('Name', $tag->abbr());
    }

    public function testSetAbbrToNullUnsets(): void
    {
        $tag = new ThTag();
        $tag->setAbbr('Name')->setAbbr(null);
        $this->assertNull($tag->abbr());
    }

    public function testUnsetAbbr(): void
    {
        $tag = new ThTag();
        $tag->setAbbr('Name')->unsetAbbr();
        $this->assertNull($tag->abbr());
    }

    // --- chaining ---

    public function testChaining(): void
    {
        $tag = new ThTag();
        $this->assertInstanceOf(ThTag::class, $tag->setColspan(2));
        $this->assertInstanceOf(ThTag::class, $tag->unsetColspan());
        $this->assertInstanceOf(ThTag::class, $tag->setRowspan(2));
        $this->assertInstanceOf(ThTag::class, $tag->unsetRowspan());
        $this->assertInstanceOf(ThTag::class, $tag->setHeaders('h1'));
        $this->assertInstanceOf(ThTag::class, $tag->unsetHeaders());
        $this->assertInstanceOf(ThTag::class, $tag->setScope(ScopeValue::col));
        $this->assertInstanceOf(ThTag::class, $tag->unsetScope());
        $this->assertInstanceOf(ThTag::class, $tag->setAbbr('N'));
        $this->assertInstanceOf(ThTag::class, $tag->unsetAbbr());
        $this->assertInstanceOf(ThTag::class, $tag->addChild(new Text('x')));
    }

}
