<?php

namespace Joby\HTML\Html5\Tags;

use Joby\HTML\Html5\Tags\TagTestCase;

class DetailsTagTest extends TagTestCase
{

    // --- constructor ---

    public function testDefaultConstructor(): void
    {
        $tag = new DetailsTag();
        $this->assertFalse($tag->open());
    }

    public function testConstructorWithSummary(): void
    {
        $summary = new SummaryTag();
        $tag = new DetailsTag($summary);
        $this->assertContains($summary, $tag->children());
    }

    public function testConstructorWithOpen(): void
    {
        $tag = new DetailsTag(null, true);
        $this->assertTrue($tag->open());
    }

    public function testConstructorWithBoth(): void
    {
        $summary = new SummaryTag();
        $tag = new DetailsTag($summary, true);
        $this->assertContains($summary, $tag->children());
        $this->assertTrue($tag->open());
    }

    // --- open ---

    public function testOpen(): void
    {
        $tag = new DetailsTag();
        $tag->setOpen(true);
        $this->assertTrue($tag->open());
        $tag->setOpen(false);
        $this->assertFalse($tag->open());
    }

    // --- summary limit ---

    public function testOnlyOneSummaryKept(): void
    {
        $tag = new DetailsTag();
        $tag->addChild(new SummaryTag());
        $tag->addChild(new SummaryTag());
        $summaries = array_filter(
            $tag->children(),
            fn($child) => $child instanceof SummaryTag
        );
        $this->assertCount(1, $summaries);
    }

    // --- chaining ---

    public function testChaining(): void
    {
        $tag = new DetailsTag();
        $this->assertInstanceOf(DetailsTag::class, $tag->setOpen(true));
        $this->assertInstanceOf(DetailsTag::class, $tag->setOpen(false));
    }

}
