<?php

namespace Joby\HTML\Html5\Tables;

use Joby\HTML\Html5\Tags\TagTestCase;

class TableTagTest extends TagTestCase
{

    // --- constructor ---

    public function testDefaultConstructor(): void
    {
        $tag = new TableTag();
        $this->assertEquals("<table>\r\n<tbody></tbody>\r\n</table>", (string) $tag);
    }

    // --- caption ---

    public function testAddCaption(): void
    {
        $tag = new TableTag();
        $caption = new CaptionTag('My Table');
        $tag->addChild($caption);
        $this->assertContains($caption, $tag->children());
    }

    public function testOnlyOneCaptionKept(): void
    {
        $tag = new TableTag();
        $caption1 = new CaptionTag('First');
        $caption2 = new CaptionTag('Second');
        $tag->addChild($caption1);
        $tag->addChild($caption2);
        $captions = array_filter(
            $tag->children(),
            fn($child) => $child instanceof CaptionTag
        );
        $this->assertCount(1, $captions);
    }

    // --- colgroup ---

    public function testAddColGroup(): void
    {
        $tag = new TableTag();
        $colgroup = new ColGroupTag();
        $tag->addChild($colgroup);
        $this->assertContains($colgroup, $tag->children());
    }

    public function testAddMultipleColGroups(): void
    {
        $tag = new TableTag();
        $tag->addChild(new ColGroupTag());
        $tag->addChild(new ColGroupTag());
        $colgroups = array_filter(
            $tag->children(),
            fn($child) => $child instanceof ColGroupTag
        );
        $this->assertCount(2, $colgroups);
    }

    // --- thead ---

    public function testAddThead(): void
    {
        $tag = new TableTag();
        $thead = new TheadTag();
        $tag->addChild($thead);
        $this->assertContains($thead, $tag->children());
    }

    public function testOnlyOneTheadKept(): void
    {
        $tag = new TableTag();
        $tag->addChild(new TheadTag());
        $tag->addChild(new TheadTag());
        $theads = array_filter(
            $tag->children(),
            fn($child) => $child instanceof TheadTag
        );
        $this->assertCount(1, $theads);
    }

    // --- tbody ---

    public function testAddTbody(): void
    {
        $tag = new TableTag();
        $tbody = new TbodyTag();
        $tag->addChild($tbody);
        $tbodies = array_filter(
            $tag->children(),
            fn($child) => $child instanceof TbodyTag
        );
        $this->assertCount(2, $tbodies); // implicit + explicit
    }

    public function testAddMultipleTbodies(): void
    {
        $tag = new TableTag();
        $tag->addChild(new TbodyTag());
        $tag->addChild(new TbodyTag());
        $tbodies = array_filter(
            $tag->children(),
            fn($child) => $child instanceof TbodyTag
        );
        $this->assertCount(3, $tbodies); // implicit + 2 explicit
    }

    // --- tfoot ---

    public function testAddTfoot(): void
    {
        $tag = new TableTag();
        $tfoot = new TfootTag();
        $tag->addChild($tfoot);
        $this->assertContains($tfoot, $tag->children());
    }

    public function testOnlyOneTfootKept(): void
    {
        $tag = new TableTag();
        $tag->addChild(new TfootTag());
        $tag->addChild(new TfootTag());
        $tfoots = array_filter(
            $tag->children(),
            fn($child) => $child instanceof TfootTag
        );
        $this->assertCount(1, $tfoots);
    }

    // --- addRow ---

    public function testAddRowAddsToImplicitTbody(): void
    {
        $tag = new TableTag();
        $tr = new TrTag();
        $tag->addRow($tr);
        $this->assertContains($tr, $tag->implicitTbody->children());
    }

    public function testAddMultipleRows(): void
    {
        $tag = new TableTag();
        $tr1 = new TrTag();
        $tr2 = new TrTag();
        $tag->addRow($tr1)->addRow($tr2);
        $this->assertContains($tr1, $tag->implicitTbody->children());
        $this->assertContains($tr2, $tag->implicitTbody->children());
    }

    // --- rejects invalid children ---

    public function testIgnoresNonTableChildren(): void
    {
        $tag = new TableTag();
        $tag->addChild(new TdTag());
        $this->assertEmpty($tag->implicitTbody->children());
    }

    // --- chaining ---

    public function testChaining(): void
    {
        $tag = new TableTag();
        $this->assertInstanceOf(TableTag::class, $tag->addChild(new CaptionTag()));
        $this->assertInstanceOf(TableTag::class, $tag->addChild(new ColGroupTag()));
        $this->assertInstanceOf(TableTag::class, $tag->addChild(new TheadTag()));
        $this->assertInstanceOf(TableTag::class, $tag->addChild(new TbodyTag()));
        $this->assertInstanceOf(TableTag::class, $tag->addChild(new TfootTag()));
        $this->assertInstanceOf(TableTag::class, $tag->addRow(new TrTag()));
    }

}
