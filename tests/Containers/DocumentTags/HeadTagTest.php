<?php

namespace ByJoby\HTML\Containers\DocumentTags;

use PHPUnit\Framework\TestCase;

class HeadTagTest extends TestCase
{
    public function testTitle()
    {
        $head = new HeadTag;
        $this->assertInstanceOf(TitleTagInterface::class, $head->title());
        $this->assertEquals($head, $head->title()->parentTag());
    }
}
