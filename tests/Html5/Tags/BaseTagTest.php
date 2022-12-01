<?php

namespace ByJoby\HTML\Html5\Tags;

class BaseTagTest extends TagTestCase
{
    public function testAttributeHelpers(): void
    {
        $this->assertAttributeHelperMethods('href', BaseTag::class);
        $this->assertAttributeHelperMethods('target', BaseTag::class);
    }
}
