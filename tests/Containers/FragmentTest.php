<?php

namespace ByJoby\HTML\Containers;

use ByJoby\HTML\Tags\AbstractContainerTag;
use ByJoby\HTML\Tags\AbstractTag;
use PHPUnit\Framework\TestCase;

class FragmentTest extends TestCase
{
    public function tag(string $name): AbstractContainerTag
    {
        $tag = $this->getMockForAbstractClass(AbstractContainerTag::class, [], '', true, true, true, ['tag']);
        $tag->method('tag')->willReturn($name);
        return $tag;
    }

    public function testConstruction()
    {
        $empty = new Fragment();
        $this->assertEquals('', $empty->__toString());
        $full = new Fragment(['a', 'b']);
        $this->assertEquals('a' . PHP_EOL . 'b', $full->__toString());
    }

    public function testNestingDocument(): Fragment
    {
        $fragment = new Fragment();
        $div1 = $this->tag('div');
        $div2 = $this->tag('div');
        // adding div1 to fragment sets its fragment
        $fragment->addChild($div1);
        $this->assertEquals($fragment, $div1->document());
        // adding div2 to div1 sets its document
        $div1->addChild($div2);
        $this->assertEquals($fragment, $div2->document());
        return $fragment;
    }

    /** @depends clone testNestingDocument */
    public function testDetaching(Fragment $fragment): void
    {
        /** @var AbstractContainerTag */
        $div1 = $fragment->children()[0];
        /** @var AbstractContainerTag */
        $div2 = $div1->children()[0];
        // add a span and verify it has the right parent
        $span = $this->tag('span');
        $div2->addChild($span);
        $this->assertEquals($fragment, $span->document());
        // detach and check document/parent of all nodes
        $div1->detach();
        $this->assertNull($div1->document());
        $this->assertNull($div1->parent());
        $this->assertNull($div2->document());
        $this->assertEquals($div1, $div2->parent());
        $this->assertNull($span->document());
        $this->assertEquals($div2, $span->parent());
        // try detaching again, to verify detaching a detached node does nothing
        $div1->detach();
        $this->assertNull($div1->document());
        $this->assertNull($div1->parent());
        $this->assertNull($div2->document());
        $this->assertEquals($div1, $div2->parent());
        $this->assertNull($span->document());
        $this->assertEquals($div2, $span->parent());
    }

    public function testMovingChild(): void
    {
        $fragment = new Fragment(['a', 'b']);
        $fragment->addChild($fragment->children()[0]);
        $this->assertEquals('b' . PHP_EOL . 'a', $fragment->__toString());
    }

    /** @depends clone testNestingDocument */
    public function testAddBeforeAndAfterOnChildren(Fragment $fragment): void
    {
        /** @var AbstractContainerTag */
        $div1 = $fragment->children()[0];
        /** @var AbstractContainerTag */
        $div2 = $div1->children()[0];
        $div2->addChild('a');
        // add child before a
        $div2->addChildBefore('b', 'a');
        $this->assertEquals($fragment, $div2->children()[0]->document());
        // add child after a
        $div2->addChildAfter('c', 'a');
        $this->assertEquals($fragment, $div2->children()[2]->document());
    }
}
