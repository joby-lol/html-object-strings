<?php

namespace ByJoby\HTML\Html5\Tags;

use ByJoby\HTML\Html5\Tags\ScriptTag\ReferrerPolicyValue;
use ByJoby\HTML\Html5\Tags\ScriptTag\TypeValue;
use ByJoby\HTML\Html5\Traits\CrossoriginTrait\CrossOriginValue;

class ScriptTagTest extends TagTestCase
{
    public function testAttributeHelpers(): void
    {
        $this->assertAttributeHelperMethods('crossorigin', ScriptTag::class, CrossOriginValue::useCredentials, CrossOriginValue::useCredentials->value);
        $this->assertAttributeHelperMethods('integrity', ScriptTag::class);
        $this->assertAttributeHelperMethods('integrity', ScriptTag::class);
        $this->assertAttributeHelperMethods('nonce', ScriptTag::class);
        $this->assertAttributeHelperMethods('referrerpolicy', ScriptTag::class, ReferrerPolicyValue::noReferrer, ReferrerPolicyValue::noReferrer->value);
        $this->assertAttributeHelperMethods('src', ScriptTag::class);
        $this->assertAttributeHelperMethods('type', ScriptTag::class, TypeValue::module, TypeValue::module->value);
        $this->assertBooleanAttributeHelperMethods('async', ScriptTag::class);
        $this->assertBooleanAttributeHelperMethods('defer', ScriptTag::class);
        $this->assertBooleanAttributeHelperMethods('nomodule', ScriptTag::class);
    }
}