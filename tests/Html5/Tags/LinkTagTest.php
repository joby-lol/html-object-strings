<?php

namespace ByJoby\HTML\Html5\Tags;

use ByJoby\HTML\Html5\Enums\CrossOrigin;
use ByJoby\HTML\Html5\Enums\Rel_link;

class LinkTagTest extends TagTestCase
{
    public function testAttributeHelpers(): void
    {
        // TODO update tests that now use enums, add tests for their exeption cases
        // $this->assertAttributeHelperMethods('rel', LinkTag::class, Rel_link::class, 'class');
        // $this->assertAttributeHelperMethods('as', LinkTag::class);
        // $this->assertAttributeHelperMethods('referrerpolicy', LinkTag::class);
        $this->assertAttributeHelperMethods('crossorigin', LinkTag::class, CrossOrigin::anonymous, 'anonymous');
        $this->assertAttributeHelperMethods('crossorigin', LinkTag::class, CrossOrigin::useCredentials, 'use-credentials');
        $this->assertAttributeHelperMethods('href', LinkTag::class);
        $this->assertAttributeHelperMethods('hreflang', LinkTag::class);
        $this->assertAttributeHelperMethods('imagesizes', LinkTag::class);
        $this->assertAttributeHelperMethods('imagesrcset', LinkTag::class);
        $this->assertAttributeHelperMethods('integrity', LinkTag::class);
        $this->assertAttributeHelperMethods('media', LinkTag::class);
        $this->assertAttributeHelperMethods('type', LinkTag::class);
    }
}