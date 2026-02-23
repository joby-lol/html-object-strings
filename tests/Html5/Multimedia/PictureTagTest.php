<?php

namespace Joby\HTML\Html5\Multimedia;

use Joby\HTML\Html5\Tags\TagTestCase;

class PictureTagTest extends TagTestCase
{

    public function testInstantiates(): void
    {
        $this->assertInstanceOf(PictureTag::class, new PictureTag());
    }

}
