<?php

namespace ByJoby\HTML\Helpers;

use PHPUnit\Framework\TestCase;

class ClassesTest extends TestCase
{
    public function testConstruction(): Classes
    {
        $classes = new Classes();
        $this->assertEquals([], $classes->getArray());
        $classes = new Classes(['a', 'c', ' a ', 'b', '!']);
        $this->assertEquals(['a', 'b', 'c'], $classes->getArray());
        return $classes;
    }

    public function testInvalidConstruction()
    {
        $this->expectExceptionMessage('Invalid class name');
        $classes = new Classes(['a', 'c', ' a ', 'b', '!'], false);
    }

    /**
     * @depends clone testConstruction
     */
    public function testAddRemove(Classes $classes): void
    {
        $classes->add('d');
        $this->assertEquals(['a', 'b', 'c', 'd'], $classes->getArray());
        $classes->add('-d');
        $this->assertEquals(['-d', 'a', 'b', 'c', 'd'], $classes->getArray());
        $classes->add('_A');
        $this->assertEquals(['-d', '_A', 'a', 'b', 'c', 'd'], $classes->getArray());
        $classes->remove('b');
        $this->assertEquals(['-d', '_A', 'a', 'c', 'd'], $classes->getArray());
        $this->expectExceptionMessage('Invalid class name');
        $classes->add('0a');
    }
}
