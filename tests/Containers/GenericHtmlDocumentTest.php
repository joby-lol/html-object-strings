<?php

namespace ByJoby\HTML\Containers;

use ByJoby\HTML\Containers\DocumentTags\BodyTagInterface;
use ByJoby\HTML\Containers\DocumentTags\DoctypeInterface;
use ByJoby\HTML\Containers\DocumentTags\HeadTagInterface;
use ByJoby\HTML\Containers\DocumentTags\HtmlTagInterface;
use PHPUnit\Framework\TestCase;

class GenericHtmlDocumentTest extends TestCase
{
    public function testConstruction(): void
    {
        $document = new GenericHtmlDocument;
        // all the right classes
        $this->assertInstanceOf(DoctypeInterface::class, $document->doctype());
        $this->assertInstanceOf(HtmlTagInterface::class, $document->html());
        $this->assertInstanceOf(BodyTagInterface::class, $document->body());
        $this->assertInstanceOf(HeadTagInterface::class, $document->head());
        // body and head are being passed properly
        $this->assertTrue($document->body() === $document->html()->body());
        $this->assertTrue($document->head() === $document->html()->head());
        // everything has the correct document
        $this->assertEquals($document, $document->doctype()->document());
        $this->assertEquals($document, $document->html()->document());
        $this->assertEquals($document, $document->body()->document());
        $this->assertEquals($document, $document->head()->document());
        // children are doctype and html
        $this->assertEquals([$document->doctype(), $document->html()], $document->children());
        // string version of an empty document
        $this->assertEquals(
            implode(
                PHP_EOL,
                [
                    '<!DOCTYPE html>',
                    '<html>',
                    '<head>',
                    '<title>Untitled</title>',
                    '</head>',
                    '<body></body>',
                    '</html>'
                ]
            ),
            $document->__toString()
        );
    }

    public function testNoDoctypeDetach(): void
    {
        $document = new GenericHtmlDocument;
        $this->expectExceptionMessage('Cannot detach() a Node from a parent that is not a ContainerMutableInterface, use detachCopy() instead');
        $document->doctype()->detach();
    }

    public function testNoHtmlDetach(): void
    {
        $document = new GenericHtmlDocument;
        $this->expectExceptionMessage('Cannot detach() a Node from a parent that is not a ContainerMutableInterface, use detachCopy() instead');
        $document->html()->detach();
    }
}
