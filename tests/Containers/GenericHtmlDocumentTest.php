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
        $this->assertEquals($document->body(), $document->html()->body());
        $this->assertEquals($document->head(), $document->html()->head());
        // everything has the correct document
        $this->assertEquals($document, $document->doctype()->parentDocument());
        $this->assertEquals($document, $document->html()->parentDocument());
        $this->assertEquals($document, $document->body()->parentDocument());
        $this->assertEquals($document, $document->head()->parentDocument());
        // string version of an empty document
        $this->assertEquals(
            implode(
                PHP_EOL,
                [
                    '<!DOCTYPE html>',
                    '<html>',
                    '<head>',
                    '<title>', 'Untitled', '</title>',
                    '</head>',
                    '<body></body>',
                    '</html>'
                ]
            ),
            $document->__toString()
        );
    }
}
