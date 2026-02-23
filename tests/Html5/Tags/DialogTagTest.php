<?php

namespace Joby\HTML\Html5\Tags;

use Joby\HTML\Html5\Tags\TagTestCase;

class DialogTagTest extends TagTestCase
{

    public function testOpenFalseByDefault(): void
    {
        $tag = new DialogTag();
        $this->assertFalse($tag->open());
    }

    public function testOpen(): void
    {
        $tag = new DialogTag();
        $tag->setOpen(true);
        $this->assertTrue($tag->open());
        $tag->setOpen(false);
        $this->assertFalse($tag->open());
    }

    public function testChaining(): void
    {
        $tag = new DialogTag();
        $this->assertInstanceOf(DialogTag::class, $tag->setOpen(true));
    }

}
