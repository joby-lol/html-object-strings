<?php

namespace ByJoby\HTML\Containers;

use ByJoby\HTML\Html5\Tags\LinkTag;
use ByJoby\HTML\Html5\Tags\ScriptTag;
use ByJoby\HTML\Nodes\Comment;
use ByJoby\HTML\Nodes\Text;
use PHPUnit\Framework\TestCase;

class ContainerGroupTest extends TestCase
{
    public function testCatchAll()
    {
        $group = ContainerGroup::catchAll();
        $this->assertTrue($group->willAccept('Foo'));
    }

    public function testCatchNone()
    {
        $group = new ContainerGroup(function () {
            return false;
        });
        $this->assertFalse($group->willAccept('Foo'));
    }

    public function testOfTag()
    {
        $group = ContainerGroup::ofTag('script');
        $this->assertTrue($group->willAccept(new ScriptTag));
        $this->assertFalse($group->willAccept(new LinkTag));
        $this->assertFalse($group->willAccept(new Comment('comment')));
        $this->assertFalse($group->willAccept(new Text('comment')));
    }

    public function testLimits()
    {
        $group = ContainerGroup::catchAll(2);
        $group->addChild('a');
        $group->addChild('b');
        $this->assertEquals('a' . PHP_EOL . 'b', $group->__toString());
        // appending a child drops the first one
        $group->addChild('c');
        $this->assertEquals('b' . PHP_EOL . 'c', $group->__toString());
        // prepending a child drops the last one
        $group->addChild('d', true);
        $this->assertEquals('d' . PHP_EOL . 'b', $group->__toString());
        // adding a child before another drops the last child
        $group->addChildBefore('e', 'b');
        $this->assertEquals('d' . PHP_EOL . 'e', $group->__toString());
        // adding a child after another drops the first child
        $group->addChildAfter('f', 'e');
        $this->assertEquals('e' . PHP_EOL . 'f', $group->__toString());
    }
}
