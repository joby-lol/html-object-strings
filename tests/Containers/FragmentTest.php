<?php

namespace ByJoby\HTML\Containers;

use ByJoby\HTML\Tags\AbstractContainerTag;
use PHPUnit\Framework\TestCase;

class FragmentTest extends TestCase
{
    public function tag(string $name): AbstractContainerTag
    {
        $tag = $this->getMockForAbstractClass(
            AbstractContainerTag::class,
            [], 'Mock_Tag_' . $name,
            true,
            true,
            true,
            ['tag']
        );
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
        $this->assertEquals($fragment, $div1->parentDocument());
        // adding div2 to div1 sets its document
        $div1->addChild($div2);
        $this->assertEquals($fragment, $div2->parentDocument());
        // div2's parent tag should be div1
        $this->assertEquals($div1, $div2->parentTag());
        // div1 should not have a parent tag
        $this->assertNull($div1->parentTag());
        return $fragment;
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
        $this->assertEquals($fragment, $div2->children()[0]->parentDocument());
        // add child after a
        $div2->addChildAfter('c', 'a');
        $this->assertEquals($fragment, $div2->children()[2]->parentDocument());
    }
}