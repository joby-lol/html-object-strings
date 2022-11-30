<?php

namespace ByJoby\HTML\Tags;

use ByJoby\HTML\Helpers\Attributes;
use ByJoby\HTML\Helpers\Classes;
use PHPUnit\Framework\TestCase;

class AbstractContainerTagTest extends TestCase
{
    public function testDIV(): AbstractContainerTag
    {
        $div = $this->getMockForAbstractClass(AbstractContainerTag::class);
        $div->method('tag')->will($this->returnValue('div'));
        $this->assertEquals('<div></div>', $div->__toString());
        $span = $this->getMockForAbstractClass(AbstractContainerTag::class);
        $span->method('tag')->will($this->returnValue('span'));
        $div->addChild($span);
        $div->attributes()['a'] = 'b';
        $this->assertEquals(
            implode(PHP_EOL, [
                '<div a="b">',
                '<span></span>',
                '</div>',
            ]),
            $div->__toString()
        );
        $this->assertEquals($div, $span->parent());
        return $div;
    }

    /** @depends clone testDIV */
    public function testMoreNesting(AbstractContainerTag $div): AbstractContainerTag
    {
        $span1 = $div->children()[0];
        $span2 = $this->getMockForAbstractClass(AbstractContainerTag::class);
        $span2->method('tag')->will($this->returnValue('span'));
        $span1->addChild($span2);
        $this->assertEquals(
            implode(PHP_EOL, [
                '<div a="b">',
                '<span>',
                '<span></span>',
                '</span>',
                '</div>',
            ]),
            $div->__toString()
        );
        return $div;
    }

    /** @depends clone testMoreNesting */
    public function testDetach(AbstractContainerTag $div): void
    {
        $span1 = $div->children()[0];
        $span2 = $span1->children()[0];
        $span1->detach();
        $this->assertEquals('<div a="b"></div>', $div->__toString());
        $this->assertNull($span1->parent());
    }
}
