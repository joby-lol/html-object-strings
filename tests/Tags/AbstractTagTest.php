<?php

namespace ByJoby\HTML\Tags;

use ByJoby\HTML\Helpers\Attributes;
use ByJoby\HTML\Helpers\Classes;
use PHPUnit\Framework\TestCase;

class AbstractTagTest extends TestCase
{

    public function tag(string $name): AbstractTag
    {
        $tag = $this->getMockForAbstractClass(AbstractTag::class, [], '', true, true, true, ['tag']);
        $tag->method('tag')->willReturn($name);
        return $tag;
    }

    public function testBR(): AbstractTag
    {
        $br = $this->tag('br');
        $this->assertEquals('<br>', $br->__toString());
        $this->assertInstanceOf(Classes::class, $br->classes());
        $this->assertInstanceOf(Attributes::class, $br->attributes());
        return $br;
    }

    /**
     * @depends clone testBR
     */
    public function testID(AbstractTag $tag): AbstractTag
    {
        $this->assertNull($tag->id());
        $tag->setID('foo');
        $this->assertEquals('foo', $tag->id());
        $this->assertEquals('<br id="foo">', $tag->__toString());
        $tag->setID(null);
        $this->assertNull($tag->id());
        $this->assertEquals('<br>', $tag->__toString());
        return $tag;
    }

    /**
     * @depends clone testID
     */
    public function testIDValidation(AbstractTag $tag): void
    {
        $this->expectExceptionMessage('Invalid tag ID');
        $tag->setID('0abc');
    }

    /**
     * @depends clone testBR
     */
    public function testAttributes(AbstractTag $tag): void
    {
        $tag->attributes()['b'] = 'c';
        $tag->attributes()['a'] = 'b';
        $this->assertEquals('<br a="b" b="c">', $tag->__toString());
        unset($tag->attributes()['a']);
        $this->assertEquals('<br b="c">', $tag->__toString());
        $tag->classes()->add('some-class');
        $tag->styles()['style'] = 'value';
        $this->assertEquals('<br class="some-class" style="style:value" b="c">', $tag->__toString());
    }

    public function testBooleanAttributes(): void
    {
        $tag = $this->tag('br');
        $tag->attributes()['a'] = true;
        $tag->attributes()['b'] = false;
        $tag->attributes()['c'] = null;
        $this->assertEquals('<br a>', $tag->__toString());
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
