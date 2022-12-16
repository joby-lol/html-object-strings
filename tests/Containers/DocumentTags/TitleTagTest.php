<?php

namespace ByJoby\HTML\Containers\DocumentTags;

use PHPUnit\Framework\TestCase;

class TitleTagTest extends TestCase
{
    public function testGetAndSet()
    {
        $title = new TitleTag;
        $this->assertEquals('Untitled', $title->content());
        $title->setContent('<strong>Titled</strong>');
        $this->assertEquals('Titled', $title->content());
        $this->assertEquals('<title>' . PHP_EOL . 'Titled' . PHP_EOL . '</title>', $title->__toString());
    }
}
