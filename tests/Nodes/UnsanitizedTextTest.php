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
}
