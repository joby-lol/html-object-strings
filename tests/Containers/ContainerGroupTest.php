<?php

namespace ByJoby\HTML\Containers;

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
}
