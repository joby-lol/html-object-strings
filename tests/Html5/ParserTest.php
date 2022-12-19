<?php

namespace ByJoby\HTML\Html5;

use ByJoby\HTML\Html5\TextContentTags\DivTag;
use ByJoby\HTML\Nodes\TextInterface;
use PHPUnit\Framework\TestCase;

class Html5ParserTest extends TestCase
{
    public function testFragmentRootTextNotWrapped()
    {
        $parser = new Html5Parser();
        $fragment = $parser->parseFragment('foobar');
        $this->assertInstanceOf(TextInterface::class, $fragment->children()[0]);
        $fragment = $parser->parseFragment('foobar<div>fizzbuzz</div>');
        $this->assertInstanceOf(TextInterface::class, $fragment->children()[0]);
        $this->assertInstanceOf(DivTag::class, $fragment->children()[1]);
    }

    public function testAttributes()
    {
        $parser = new Html5Parser();
        $fragment = $parser->parseFragment('<div id="foo" a="b" c="d" f></div>');
        $this->assertEquals('foo', $fragment->children()[0]->id());
        $this->assertEquals('b', $fragment->children()[0]->attributes()['a']);
        $this->assertEquals('d', $fragment->children()[0]->attributes()['c']);
    }

    public function testStylesAndClasses()
    {
        $parser = new Html5Parser();
        $fragment = $parser->parseFragment('<div class="foo  bar " style=" color:red; background-color: blue;"></div>');
        $this->assertEquals(['bar', 'foo'], $fragment->children()[0]->classes()->getArray());
        $this->assertEquals(['background-color' => 'blue', 'color' => 'red'], $fragment->children()[0]->styles()->getArray());
    }

    public function testNesting()
    {
        $parser = new Html5Parser();
        $fragment = $parser->parseFragment('<div><p>foo<!-- comment -->bar</p><p>foo</p></div>');
        $this->assertInstanceOf(DivTag::class, $fragment->children()[0]);
        $this->assertCount(2, $fragment->children()[0]->children());
        $this->assertCount(3, $fragment->children()[0]->children()[0]->children());
    }

    public function testUnknownTags()
    {
        $parser = new Html5Parser();
        $fragment = $parser->parseFragment('<div></div><derp><darp>');
        $this->assertCount(1, $fragment->children());
    }

    public function testParseDocument()
    {
        $parser = new Html5Parser();
        $document = $parser->parseDocument('<html><head><title>Title</title></head><body><div>foo</div></body></html>');
        $this->assertEquals('Title', $document->html()->head()->title()->content());
        $this->assertEquals('<div>' . PHP_EOL . 'foo' . PHP_EOL . '</div>', $document->body()->children()[0]->__toString());
    }
}
