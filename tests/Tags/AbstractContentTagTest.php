<?php

namespace ByJoby\HTML\Tags;

use PHPUnit\Framework\TestCase;

class AbstractContentTagTest extends TestCase
{
    public function tag(string $name): AbstractContentTag
    {
        $tag = $this->getMockForAbstractClass(AbstractContentTag::class, [], '', true, true, true, ['tag']);
        $tag->method('tag')->willReturn($name);
        return $tag;
    }

    public function testContent(): void
    {
        $content = 'this content goes in the tag';
        $tag = $this->tag('div');
        $this->assertEquals('', $tag->content());
        $this->assertEquals('<div></div>', $tag->__toString());
        $tag->setContent($content);
        $this->assertEquals($content, $tag->content());
        $this->assertEquals('<div>' . PHP_EOL . $content . PHP_EOL . '</div>', $tag->__toString());
    }
}
