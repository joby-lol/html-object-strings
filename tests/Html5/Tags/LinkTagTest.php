<?php

namespace ByJoby\HTML\Html5\Tags;

class LinkTagTest extends TagTestCase
{
    public function testAttributeHelpers(): void
    {
        $this->assertAttributeHelperMethods('rel', LinkTag::class);
        $this->assertAttributeHelperMethods('as', LinkTag::class);
        $this->assertAttributeHelperMethods('crossorigin', LinkTag::class);
        $this->assertAttributeHelperMethods('href', LinkTag::class);
        $this->assertAttributeHelperMethods('hreflang', LinkTag::class);
        $this->assertAttributeHelperMethods('imagesizes', LinkTag::class);
        $this->assertAttributeHelperMethods('imagesrcset', LinkTag::class);
        $this->assertAttributeHelperMethods('integrity', LinkTag::class);
        $this->assertAttributeHelperMethods('media', LinkTag::class);
        $this->assertAttributeHelperMethods('referrerpolicy', LinkTag::class);
        $this->assertAttributeHelperMethods('type', LinkTag::class);
    }
}
