<?php

namespace ByJoby\HTML\Nodes;

use PHPUnit\Framework\TestCase;

class UnsanitizedTextTest extends TestCase
{
    public function testSimpleText(): void
    {
        $this->assertEquals('', new UnsanitizedText(''));
        $this->assertEquals('foo', new UnsanitizedText('foo'));
        $this->assertEquals('<strong>foo</strong>', new UnsanitizedText('<strong>foo</strong>'));
    }

    public function testModification(): void
    {
        $text = new UnsanitizedText('foo');
        $this->assertEquals('foo', $text->value());
        $text->setValue('bar');
        $this->assertEquals('bar', $text->value());
    }
}
