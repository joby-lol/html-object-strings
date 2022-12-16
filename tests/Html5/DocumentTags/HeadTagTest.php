<?php

namespace ByJoby\HTML\Html5\DocumentTags;

use ByJoby\HTML\Containers\DocumentTags\TitleTagInterface;
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
