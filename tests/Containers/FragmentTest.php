<?php

namespace Joby\HTML\Containers;

use Joby\HTML\Html5\InlineTextSemantics\ATag;
use Joby\HTML\Html5\TextContentTags\DivTag;
use Joby\HTML\Tags\AbstractContainerTag;
use PHPUnit\Framework\Attributes\Depends;
use PHPUnit\Framework\TestCase;

class FragmentTest extends TestCase
{

    public function tag(string $name): AbstractContainerTag
    {
        return new class($name) extends AbstractContainerTag
        {
            public function __construct(
                protected string $name
            ) {
            }
            public function tag(): string
            {
                return $this->name;
            }
        };
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

    #[Depends('testNestingDocument')]
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

    // --- walk ---

    public function testWalkYieldsDirectChildren(): void
    {
        $fragment = new Fragment();
        $div1 = new DivTag();
        $div2 = new DivTag();
        $fragment->addChild($div1);
        $fragment->addChild($div2);
        $found = iterator_to_array($fragment->walk(), false);
        $this->assertContains($div1, $found);
        $this->assertContains($div2, $found);
    }

    public function testWalkYieldsNestedChildren(): void
    {
        $fragment = new Fragment();
        $div = new DivTag();
        $inner = new DivTag();
        $div->addChild($inner);
        $fragment->addChild($div);
        $found = iterator_to_array($fragment->walk(), false);
        $this->assertContains($inner, $found);
    }

    public function testWalkDoesNotYieldSelf(): void
    {
        $fragment = new Fragment();
        $found = iterator_to_array($fragment->walk(), false);
        $this->assertNotContains($fragment, $found);
    }

    public function testWalkEmptyFragment(): void
    {
        $fragment = new Fragment();
        $found = iterator_to_array($fragment->walk(), false);
        $this->assertEmpty($found);
    }

    public function testWalkFilterByClass(): void
    {
        $fragment = new Fragment();
        $a = new ATag();
        $div = new DivTag();
        $fragment->addChild($a);
        $fragment->addChild($div);
        $found = iterator_to_array($fragment->walk(ATag::class), false);
        $this->assertContains($a, $found);
        $this->assertNotContains($div, $found);
    }

    public function testWalkFilterByClassFindsNestedNodes(): void
    {
        $fragment = new Fragment();
        $div = new DivTag();
        $a = new ATag();
        $div->addChild($a);
        $fragment->addChild($div);
        $found = iterator_to_array($fragment->walk(ATag::class), false);
        $this->assertContains($a, $found);
        $this->assertNotContains($div, $found);
    }

    public function testWalkFilterByClassTraversesNonMatchingContainers(): void
    {
        $fragment = new Fragment();
        $outer = new DivTag();
        $inner = new DivTag();
        $a = new ATag();
        $inner->addChild($a);
        $outer->addChild($inner);
        $fragment->addChild($outer);
        $found = iterator_to_array($fragment->walk(ATag::class), false);
        $this->assertContains($a, $found);
    }

    public function testWalkIsDepthFirst(): void
    {
        $fragment = new Fragment();
        $div = new DivTag();
        $inner = new DivTag();
        $a = new ATag();
        $inner->addChild($a);
        $div->addChild($inner);
        $fragment->addChild($div);
        $found = iterator_to_array($fragment->walk(), false);
        $divIndex = array_search($div, $found);
        $innerIndex = array_search($inner, $found);
        $aIndex = array_search($a, $found);
        $this->assertLessThan($innerIndex, $divIndex);
        $this->assertLessThan($aIndex, $innerIndex);
    }

    public function testClearChildrenRemovesAllChildren(): void
    {
        $fragment = new Fragment();
        $div1 = new DivTag();
        $div2 = new DivTag();
        $fragment->addChild($div1);
        $fragment->addChild($div2);
        $fragment->clearChildren();
        $this->assertEmpty($fragment->children());
    }

    public function testClearChildrenResetsParentOfRemovedChildren(): void
    {
        $fragment = new Fragment();
        $div = new DivTag();
        $fragment->addChild($div);
        $fragment->clearChildren();
        $this->assertNull($div->parentTag());
        $this->assertNull($div->parentDocument());
    }

    public function testClearChildrenOnEmptyFragmentDoesNotThrow(): void
    {
        $fragment = new Fragment();
        $fragment->clearChildren();
        $this->assertEmpty($fragment->children());
    }

    public function testClearChildrenAllowsAddingChildrenAfterwards(): void
    {
        $fragment = new Fragment();
        $div1 = new DivTag();
        $div2 = new DivTag();
        $fragment->addChild($div1);
        $fragment->clearChildren();
        $fragment->addChild($div2);
        $this->assertCount(1, $fragment->children());
        $this->assertContains($div2, $fragment->children());
    }

    public function testClearChildrenRendersEmpty(): void
    {
        $fragment = new Fragment(['a', 'b']);
        $fragment->clearChildren();
        $this->assertEquals('', $fragment->__toString());
    }

    public function testWalkStopsAtSpecifiedClass(): void
    {
        $fragment = new Fragment();
        $outer = new DivTag();
        $inner = new DivTag();
        $a = new ATag();
        $inner->addChild($a);
        $outer->addChild($inner);
        $fragment->addChild($outer);
        $found = iterator_to_array($fragment->walk(null, [DivTag::class]), false);
        $this->assertCount(1, $found);
        // $this->assertContains($outer, $found);
        // $this->assertNotContains($inner, $found);
        // $this->assertNotContains($a, $found);
    }

    public function testWalkStopAtClassIsStillYielded(): void
    {
        $fragment = new Fragment();
        $div = new DivTag();
        $fragment->addChild($div);
        $found = iterator_to_array($fragment->walk(null, [DivTag::class]), false);
        $this->assertContains($div, $found);
    }

    public function testWalkStopAtClassWithFilter(): void
    {
        $fragment = new Fragment();
        $outer = new DivTag();
        $inner = new DivTag();
        $a = new ATag();
        $inner->addChild($a);
        $outer->addChild($inner);
        $fragment->addChild($outer);
        // looking for ATag but stopping descent at DivTag - should find nothing
        $found = iterator_to_array($fragment->walk(ATag::class, [DivTag::class]), false);
        $this->assertEmpty($found);
    }

    public function testWalkStopAtMultipleClasses(): void
    {
        $fragment = new Fragment();
        $div = new DivTag();
        $a = new ATag();
        $inner = new DivTag();
        $div->addChild($inner);
        $fragment->addChild($div);
        $fragment->addChild($a);
        $found = iterator_to_array($fragment->walk(null, [DivTag::class, ATag::class]), false);
        $this->assertContains($div, $found);
        $this->assertContains($a, $found);
        $this->assertNotContains($inner, $found);
    }

    public function testWalkStopAtIsRespectedAtMultipleLevels(): void
    {
        $fragment = new Fragment();
        $outer = new DivTag();
        $middle = new DivTag();
        $inner = new ATag();
        $middle->addChild($inner);
        $outer->addChild($middle);
        $fragment->addChild($outer);
        // stopping at DivTag should prevent descent into middle, so ATag should not be found
        $found = iterator_to_array($fragment->walk(null, [DivTag::class]), false);
        $this->assertContains($outer, $found);
        $this->assertNotContains($middle, $found);
        $this->assertNotContains($inner, $found);
    }
}
