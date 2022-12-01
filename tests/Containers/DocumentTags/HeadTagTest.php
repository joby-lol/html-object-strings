<?php

namespace ByJoby\HTML\Containers\DocumentTags;

use PHPUnit\Framework\TestCase;

class HeadTagTest extends TestCase
{
    public function testTitle()
    {
        $head = new HeadTag;
        $this->assertInstanceOf(TitleTagInterface::class, $head->title());
        $this->assertEquals($head, $head->title()->parent());
    }

    public function testNoTitleDetach()
    {
        $head = new HeadTag;
        $this->expectExceptionMessage('Not allowed to detach TitleTag');
        $head->title()->detach();
    }
}
