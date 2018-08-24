<?php
/* HTML Object Strings | https://gitlab.com/byjoby/html-object-strings | MIT License */
declare(strict_types=1);
namespace HtmlObjectStrings;

use PHPUnit\Framework\TestCase;

class GenericTagTest extends TestCase
{
    use \SteveGrunwell\PHPUnit_Markup_Assertions\MarkupAssertionsTrait;

    public function testBasicClassManagement()
    {
        /*
        This section tests the basic class adding, removing, and output features
         */
        $h = new GenericTag();
        //default is no classes
        $this->assertEquals([], $h->classes());
        $this->assertFalse($h->hasClass('foo'));
        //adding a class
        $h->addClass('foo');
        //should now exist
        $this->assertEquals(['foo'], $h->classes());
        $this->assertTrue($h->hasClass('foo'));
        //adding a second time shouldn't change anything
        $h->addClass('foo');
        $this->assertEquals(['foo'], $h->classes());
        $this->assertTrue($h->hasClass('foo'));
        //adding another class
        $h->addClass('bar');
        //should now exist, and classes should be in alphabetical order
        $this->assertEquals(['bar','foo'], $h->classes());
        $this->assertTrue($h->hasClass('bar'));
        //removing a class
        $h->addClass('abc');
        $h->removeClass('bar');
        //bar should now not exist, and classes should be in alphabetical order
        $this->assertEquals(['abc','foo'], $h->classes());
        $this->assertFalse($h->hasClass('bar'));
    }

    public function testDataAndAttributeManagement()
    {
        /*
        This section tests the basic getting/setting of attributes
         */
        $h = new GenericTag();
        //set and get an attribute
        $h->attr('foo', 'bar');
        $this->assertEquals('bar', $h->attr('foo'));
        //set and get data
        $h->data('foo', 'baz');
        $this->assertEquals('baz', $h->data('foo'));
        $this->assertEquals('baz', $h->attr('data-foo'));
        $this->assertEquals('bar', $h->attr('foo'));
    }

    public function testMarkupOutput()
    {
        /*
        Test that output has the correct attributes and classes for what was
        configured into the object
         */
        $h = new GenericTag();
        $h->tag = 'div';
        $h->selfClosing = false;
        $h->content = 'markup content';
        $h->attr('id', 'h');
        $h->data('foo', 'bar');
        $h->addClass('class-foo');
        $h->addClass('class-bar');
        //should be a div tag
        $this->assertContainsSelector('div', "$h");
        $this->assertContainsSelector('div#h', "$h");
        $this->assertContainsSelector('div[data-foo="bar"]', "$h");
        $this->assertContainsSelector('div.class-foo.class-bar', "$h");
    }
}
