<?php

namespace ByJoby\HTML\Html5\Tags;

class StyleTagTest extends TagTestCase
{
    public function testAttributeHelpers(): void
    {
        $this->assertAttributeHelperMethods('media', StyleTag::class);
        $this->assertAttributeHelperMethods('nonce', StyleTag::class);
    }
}
