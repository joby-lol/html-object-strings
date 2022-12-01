<?php

namespace ByJoby\HTML\Tags;

use ByJoby\HTML\Helpers\Attributes;
use ByJoby\HTML\Helpers\Classes;
use ByJoby\HTML\Nodes\Text;
use ByJoby\HTML\Nodes\UnsanitizedText;
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

    /** @depends clone testDIV */
    public function testRemoveChild(AbstractContainerTag $div): void
    {
        $span2 = $this->getMockForAbstractClass(AbstractContainerTag::class);
        $span2->method('tag')->will($this->returnValue('span'));
        // add a second span and remove it using its object
        $div->addChild($span2);
        $this->assertCount(2, $div->children());
        $div->removeChild($span2);
        $this->assertCount(1, $div->children());
        // re-add second span and remove it using string
        $div->addChild($span2);
        $this->assertCount(2, $div->children());
        $div->removeChild('<span></span>');
        $this->assertCount(0, $div->children());
    }

    /** @depends clone testDIV */
    public function testTextChildren(AbstractContainerTag $div): void
    {
        $div->addChild('<strong>text</strong>');
        $div->addChild('<strong>unsanitized text</strong>', false, true);
        $this->assertInstanceOf(Text::class, $div->children()[1]);
        $this->assertInstanceOf(UnsanitizedText::class, $div->children()[2]);
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

    /** @depends clone testMoreNesting */
    public function testDetachCopy(AbstractContainerTag $div): void
    {
        $span1 = $div->children()[0];
        $span2 = $span1->children()[0];
        $copy = $span1->detachCopy();
        $this->assertNull($copy->parent());
        $this->assertEquals($div, $span1->parent());
    }

    public function testAddChildBefore(): void
    {
        $div = $this->getMockForAbstractClass(AbstractContainerTag::class);
        $div->method('tag')->will($this->returnValue('div'));
        // add a string child
        $div->addChild('a');
        $div->addChildBefore('b', 'a');
        $this->assertEquals('b', $div->children()[0]->__toString());
        // add an actual node object
        $span1 = $this->getMockForAbstractClass(AbstractContainerTag::class);
        $span1->method('tag')->will($this->returnValue('span'));
        $div->addChildBefore($span1, 'a');
        $this->assertEquals($span1, $div->children()[1]->__toString());
        // add another object referencing the node object
        $div->addChildBefore('c', $span1);
        $this->assertEquals('c', $div->children()[1]->__toString());
        // should throw an exception if reference child is not found
        $this->expectExceptionMessage('Reference child not found in this container');
        $div->addChildBefore('z', 'x');
    }

    public function testAddChildAfter(): void
    {
        $div = $this->getMockForAbstractClass(AbstractContainerTag::class);
        $div->method('tag')->will($this->returnValue('div'));
        // add a string child
        $div->addChild('a');
        $div->addChildAfter('b', 'a');
        $this->assertEquals('b', $div->children()[1]->__toString());
        // add an actual node object
        $span1 = $this->getMockForAbstractClass(AbstractContainerTag::class);
        $span1->method('tag')->will($this->returnValue('span'));
        $div->addChildAfter($span1, 'a');
        $this->assertEquals($span1, $div->children()[1]->__toString());
        // add another object referencing the node object
        $div->addChildAfter('c', $span1);
        $this->assertEquals('c', $div->children()[2]->__toString());
        // should throw an exception if reference child is not found
        $this->expectExceptionMessage('Reference child not found in this container');
        $div->addChildAfter('z', 'x');
    }
}
