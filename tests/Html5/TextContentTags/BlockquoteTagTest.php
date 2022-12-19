<?php

namespace ByJoby\HTML\Html5\TextContentTags;

use ByJoby\HTML\Html5\Tags\BaseTagTest;

class BlockquoteTagTest extends BaseTagTest
{
    public function testAttributeHelpers(): void
    {
        $this->assertAttributeHelperMethods('cite', BlockquoteTag::class);
    }
}
