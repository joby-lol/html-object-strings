<?php

namespace ByJoby\HTML\Nodes;

use PHPUnit\Framework\TestCase;

class CDataTest extends TestCase
{
    public function testSimpleText(): void
    {
        $this->assertEquals('<![CDATA[]]>', new CData(''));
        $this->assertEquals('<![CDATA[foo]]>', new CData('foo'));
        $this->assertEquals('<![CDATA[foo-bar]]>', new CData('foo-bar'));
        $this->assertEquals('<![CDATA[foo]]]]><![CDATA[>bar]]>', (new CData('foo]]>bar'))->__toString());
    }

    public function testModification(): void
    {
        $cdata = new CData('foo');
        $this->assertEquals('foo', $cdata->value());
        $cdata->setValue('bar');
        $this->assertEquals('bar', $cdata->value());
    }
}
