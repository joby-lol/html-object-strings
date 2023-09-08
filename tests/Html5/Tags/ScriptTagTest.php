<?php

namespace ByJoby\HTML\Html5\Tags;

use ByJoby\HTML\Html5\Enums\CrossOrigin;
use ByJoby\HTML\Html5\Enums\ReferrerPolicy_script;
use ByJoby\HTML\Html5\Enums\Type_script;

class ScriptTagTest extends TagTestCase
{
    public function testAttributeHelpers(): void
    {
        $this->assertAttributeHelperMethods('crossorigin', ScriptTag::class, CrossOrigin::useCredentials, CrossOrigin::useCredentials->value);
        $this->assertAttributeHelperMethods('integrity', ScriptTag::class);
        $this->assertAttributeHelperMethods('integrity', ScriptTag::class);
        $this->assertAttributeHelperMethods('nonce', ScriptTag::class);
        $this->assertAttributeHelperMethods('referrerpolicy', ScriptTag::class, ReferrerPolicy_script::noReferrer, ReferrerPolicy_script::noReferrer->value);
        $this->assertAttributeHelperMethods('src', ScriptTag::class);
        $this->assertAttributeHelperMethods('type', ScriptTag::class, Type_script::module, Type_script::module->value);
        $this->assertBooleanAttributeHelperMethods('async', ScriptTag::class);
        $this->assertBooleanAttributeHelperMethods('defer', ScriptTag::class);
        $this->assertBooleanAttributeHelperMethods('nomodule', ScriptTag::class);
    }
}