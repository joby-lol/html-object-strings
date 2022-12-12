<?php

namespace ByJoby\HTML\Nodes;

use PHPUnit\Framework\TestCase;

class TextTest extends TestCase
{
    public function testSimpleText(): void
    {
        $this->assertEquals('', new Text(''));
        $this->assertEquals('foo', new Text('foo'));
        $this->assertEquals('foo', new Text('<strong>foo</strong>'));
    }

    public function testModification(): void
    {
        $text = new Text('foo');
        $this->assertEquals('foo', $text->value());
        $text->setValue('bar');
        $this->assertEquals('bar', $text->value());
    }
}
