<?php

namespace ByJoby\HTML\Html5\Tags;

class ScriptTagTest extends TagTestCase
{
    public function testAttributeHelpers(): void
    {
        $this->assertAttributeHelperMethods('crossorigin', ScriptTag::class);
        $this->assertAttributeHelperMethods('integrity', ScriptTag::class);
        $this->assertAttributeHelperMethods('integrity', ScriptTag::class);
        $this->assertAttributeHelperMethods('nonce', ScriptTag::class);
        $this->assertAttributeHelperMethods('referrerpolicy', ScriptTag::class);
        $this->assertAttributeHelperMethods('src', ScriptTag::class);
        $this->assertAttributeHelperMethods('type', ScriptTag::class);
        $this->assertBooleanAttributeHelperMethods('async', ScriptTag::class);
        $this->assertBooleanAttributeHelperMethods('defer', ScriptTag::class);
        $this->assertBooleanAttributeHelperMethods('nomodule', ScriptTag::class);
    }
}
