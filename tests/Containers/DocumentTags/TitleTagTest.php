<?php

namespace ByJoby\HTML\Containers\DocumentTags;

use PHPUnit\Framework\TestCase;

class TitleTagTest extends TestCase
{
    public function testGetAndSet()
    {
        $title = new TitleTag;
        $this->assertEquals('Untitled', $title->title());
        $title->setTitle('<strong>Titled</strong>');
        $this->assertEquals('Titled', $title->title());
        $this->assertEquals('<title>Titled</title>', $title->__toString());
    }
}
