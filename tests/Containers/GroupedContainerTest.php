<?php

namespace ByJoby\HTML\Containers;

use ByJoby\HTML\Html5\Tags\BaseTag;
use ByJoby\HTML\Html5\Tags\LinkTag;
use ByJoby\HTML\Html5\Tags\ScriptTag;
use ByJoby\HTML\Html5\Tags\StyleTag;
use ByJoby\HTML\Nodes\Comment;
use PHPUnit\Framework\TestCase;

class GroupedContainerTest extends TestCase
{
    public function testGroupedContainerBasicFunctions()
    {
        $container = new GroupedContainer();
        $script = new ScriptTag;
        $style = new StyleTag;
        $link = new LinkTag;
        $base = new BaseTag;
        // initially accepts nothing
        $this->assertFalse($container->willAccept($script));
        $this->assertFalse($container->willAccept($style));
        $this->assertFalse($container->willAccept($link));
        $this->assertFalse($container->willAccept($base));
        // also ensure none of these accept non-tag node
        $this->assertFalse($container->willAccept(new Comment('test comment')));
        // add group to hold style tags
        $container->addGroup($styleGroup = ContainerGroup::ofTag('style'));
        $this->assertFalse($container->willAccept($script));
        $this->assertTrue($container->willAccept($style));
        $this->assertFalse($container->willAccept($link));
        $this->assertFalse($container->willAccept($base));
        // add group to hold link tags by class
        $container->addGroupBefore($linkGroup = ContainerGroup::ofClass(LinkTag::class), $styleGroup);
        $this->assertFalse($container->willAccept($script));
        $this->assertTrue($container->willAccept($style));
        $this->assertTrue($container->willAccept($link));
        $this->assertFalse($container->willAccept($base));
        // add group to hold script tags by class
        $container->addGroupAfter($scriptGroup = ContainerGroup::ofClass(ScriptTag::class), $styleGroup);
        $this->assertTrue($container->willAccept($script));
        $this->assertTrue($container->willAccept($style));
        $this->assertTrue($container->willAccept($link));
        $this->assertFalse($container->willAccept($base));
        // add catch-all group
        $container->addGroup($catchAll = ContainerGroup::catchAll());
        $this->assertTrue($container->willAccept($script));
        $this->assertTrue($container->willAccept($style));
        $this->assertTrue($container->willAccept($link));
        $this->assertTrue($container->willAccept($base));
        // add script tag
        $container->addChild($script);
        $this->assertEquals($script->__toString(), $container->__toString());
        // add style tag (it's before the style tag)
        $container->addChild($style);
        $this->assertEquals(
            implode(PHP_EOL, [
                $style->__toString(),
                $script->__toString(),
            ]),
            $container->__toString()
        );
        // add link tag  (it's after the style tag)
        $container->addChild($link);
        $this->assertEquals(
            implode(PHP_EOL, [
                $link->__toString(),
                $style->__toString(),
                $script->__toString(),
            ]),
            $container->__toString()
        );
        // add base (it's at the beginning)
        $container->addChild($base);
        $this->assertEquals(
            implode(PHP_EOL, [
                $link->__toString(),
                $style->__toString(),
                $script->__toString(),
                $base->__toString(),
            ]),
            $container->__toString()
        );
    }

    public function testContains()
    {
        $container = new GroupedContainer();
        $this->assertFalse($container->contains('a'));
        $container->addGroup(ContainerGroup::catchAll());
        $container->addChild('a');
        $this->assertTrue($container->contains('a'));
        $container->addChild($script = new ScriptTag);
        $this->assertTrue($container->contains($script));
    }

    public function testAddAndRemoveChild()
    {
        $container = new GroupedContainer();
        $container->addGroup(ContainerGroup::catchAll());
        $container->addChild('a');
        $container->addChildBefore('b', 'a');
        $container->addChildAfter('c', 'b');
        $this->assertEquals(implode(PHP_EOL, ['b', 'c', 'a']), $container->__toString());
        // remove child c
        $container->removeChild('c');
        $this->assertEquals(implode(PHP_EOL, ['b', 'a']), $container->__toString());
    }
}
