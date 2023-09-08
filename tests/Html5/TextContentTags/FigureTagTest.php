<?php

namespace ByJoby\HTML\Html5\TextContentTags;

use ByJoby\HTML\Html5\Tags\BaseTagTest;
use ByJoby\HTML\Html5\TextContentTags\FigureTag;
use ByJoby\HTML\Nodes\TextInterface;

class FigureTagTest extends BaseTagTest
{
    public function testCaptionOrder(): void
    {
        $figure = new FigureTag();
        $figure->addChild(new FigcaptionTag);
        $figure->addChild('Some content');
        $this->assertInstanceOf(TextInterface::class, $figure->children()[0]);
        $this->assertInstanceOf(FigcaptionTag::class, $figure->children()[1]);
        $figure->flipCaptionOrder();
        $this->assertInstanceOf(TextInterface::class, $figure->children()[1]);
        $this->assertInstanceOf(FigcaptionTag::class, $figure->children()[0]);
    }
}
