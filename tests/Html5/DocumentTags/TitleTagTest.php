<?php

namespace ByJoby\HTML\Html5\DocumentTags;

use PHPUnit\Framework\TestCase;

class TitleTagTest extends TestCase
{
    public function testGetAndSet(): void
    {
        $title = new TitleTag;
        $this->assertEquals('Untitled', $title->content());
        $title->setContent('<strong>Titled</strong>');
        $this->assertEquals('Titled', $title->content());
        $this->assertEquals('<title>Titled</title>', $title->__toString());
    }
}
