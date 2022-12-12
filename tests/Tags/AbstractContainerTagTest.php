<?php

namespace ByJoby\HTML\Tags;

use ByJoby\HTML\Nodes\Text;
use ByJoby\HTML\Nodes\UnsanitizedText;
use PHPUnit\Framework\TestCase;

class AbstractContainerTagTest extends TestCase
{
    public function tag(string $name): AbstractContainerTag
    {
        $tag = $this->getMockForAbstractClass(AbstractContainerTag::class, [], '', true, true, true, ['tag']);
        $tag->method('tag')->willReturn($name);
        return $tag;
    }

    public function testDIV(): AbstractContainerTag
    {
        $div = $this->tag('div');
        $this->assertEquals('<div></div>', $div->__toString());
        $span = $this->tag('span');
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

    public function testBooleanAttributes(): void
    {
        $tag = $this->tag('div');
        $tag->attributes()['a'] = true;
        $tag->attributes()['b'] = false;
        $tag->attributes()['c'] = null;
        $this->assertEquals('<div a></div>', $tag->__toString());
    }

    /** @depends clone testDIV */
    public function testMoreNesting(AbstractContainerTag $div): AbstractContainerTag
    {
        /** @var AbstractContainerTag */
        $span1 = $div->children()[0];
        $span2 = $this->tag('span');
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
        $span2 = $this->tag('span');
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
    public function testDetachCopy(AbstractContainerTag $div): void
    {
        /** @var AbstractContainerTag */
        $span = $div->children()[0];
        $copy = $span->detachCopy();
        $this->assertNull($copy->parent());
        $this->assertEquals($div, $span->parent());
    }

    public function testAddChildBefore(): void
    {
        $div = $this->tag('div');
        // add a string child
        $div->addChild('a');
        $div->addChildBefore('b', 'a');
        $this->assertEquals('b', $div->children()[0]->__toString());
        // add an actual node object
        $span = $this->tag('span');
        $div->addChildBefore($span, 'a');
        $this->assertEquals($span, $div->children()[1]->__toString());
        // add another object referencing the node object
        $div->addChildBefore('c', $span);
        $this->assertEquals('c', $div->children()[1]->__toString());
        // should throw an exception if reference child is not found
        $this->expectExceptionMessage('Reference child not found in this container');
        $div->addChildBefore('z', 'x');
    }

    public function testAddChildAfter(): void
    {
        $div = $this->tag('div');
        // add a string child
        $div->addChild('a');
        $div->addChildAfter('b', 'a');
        $this->assertEquals('b', $div->children()[1]->__toString());
        // add an actual node object
        $span = $this->tag('span');
        $div->addChildAfter($span, 'a');
        $this->assertEquals($span, $div->children()[1]->__toString());
        // add another object referencing the node object
        $div->addChildAfter('c', $span);
        $this->assertEquals('c', $div->children()[2]->__toString());
        // should throw an exception if reference child is not found
        $this->expectExceptionMessage('Reference child not found in this container');
        $div->addChildAfter('z', 'x');
    }
}
