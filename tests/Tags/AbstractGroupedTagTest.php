<?php

namespace ByJoby\HTML\Tags;

use PHPUnit\Framework\TestCase;

class AbstractGroupedTagTest extends TestCase
{
    public function tag(string $name): AbstractGroupedTag
    {
        $tag = $this->getMockForAbstractClass(AbstractGroupedTag::class, [], '', true, true, true, ['tag']);
        $tag->method('tag')->willReturn($name);
        return $tag;
    }

    public function testEmptyRendering(): void
    {
        $tag = $this->tag('div');
        $this->assertEquals('<div></div>', $tag->__toString());
    }
}
