<?php

namespace ByJoby\HTML\Html5\Tags;

class MetaTagTest extends TagTestCase
{
    public function testAttributeHelpers(): void
    {
        $this->assertAttributeHelperMethods('name', MetaTag::class);
        $this->assertAttributeHelperMethods('content', MetaTag::class);
        $this->assertAttributeHelperMethods('http-equiv', MetaTag::class);
        $this->assertAttributeHelperMethods('charset', MetaTag::class);
    }
}
