<?php

namespace ByJoby\HTML\Nodes;

use PHPUnit\Framework\TestCase;

class CommentTest extends TestCase
{
    public function testSimpleText(): void
    {
        $this->assertEquals('<!--  -->', new Comment(''));
        $this->assertEquals('<!-- foo -->', new Comment('foo'));
        $this->assertEquals('<!-- foo-bar -->', new Comment('foo-bar'));
        $this->assertNotEquals('<!-- foo--bar -->', new Comment('foo--bar'));
    }

    public function testModification(): void
    {
        $comment = new Comment('foo');
        $this->assertEquals('foo', $comment->value());
        $comment->setValue('bar');
        $this->assertEquals('bar', $comment->value());
    }
}
