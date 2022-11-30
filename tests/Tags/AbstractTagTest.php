<?php

namespace ByJoby\HTML\Tags;

use ByJoby\HTML\Helpers\Attributes;
use ByJoby\HTML\Helpers\Classes;
use PHPUnit\Framework\TestCase;

class AbstractTagTest extends TestCase
{
    public function testBR(): AbstractTag
    {
        $br = $this->getMockForAbstractClass(AbstractTag::class);
        $br->method('tag')->will($this->returnValue('br'));
        $this->assertEquals('<br/>', $br->__toString());
        $this->assertInstanceOf(Classes::class, $br->classes());
        $this->assertInstanceOf(Attributes::class, $br->attributes());
        return $br;
    }

    /**
     * @depends clone testBR
     */
    public function testID(AbstractTag $tag): void
    {
        $this->assertNull($tag->id());
        $tag->setID('foo');
        $this->assertEquals('foo', $tag->id());
        $this->assertEquals('<br id="foo"/>', $tag->__toString());
        $tag->setID(null);
        $this->assertNull($tag->id());
        $this->assertEquals('<br/>', $tag->__toString());
    }

    /**
     * @depends clone testBR
     */
    public function testAttributes(AbstractTag $tag): void
    {
        $tag->attributes()['b'] = 'c';
        $tag->attributes()['a'] = 'b';
        $this->assertEquals('<br a="b" b="c"/>', $tag->__toString());
        unset($tag->attributes()['a']);
        $this->assertEquals('<br b="c"/>', $tag->__toString());
    }

    /**
     * @depends clone testBR
     */
    public function testSettingIDException(AbstractTag $tag): void
    {
        $this->expectExceptionMessage('Setting attribute is disallowed');
        $tag->attributes()['id'] = 'foo';
    }

    /**
     * @depends clone testBR
     */
    public function testSettingClassException(AbstractTag $tag): void
    {
        $this->expectExceptionMessage('Setting attribute is disallowed');
        $tag->attributes()['class'] = 'foo';
    }

    /**
     * @depends clone testBR
     */
    public function testSettingStyleException(AbstractTag $tag): void
    {
        $this->expectExceptionMessage('Setting attribute is disallowed');
        $tag->attributes()['style'] = 'foo';
    }
}
