<?php

namespace ByJoby\HTML\Html5\TextContentTags;

use ByJoby\HTML\Html5\Enums\ListTypeValue;
use ByJoby\HTML\Html5\Tags\BaseTagTest;

class OlTagTest extends BaseTagTest
{
    public function testAttributeHelpers(): void
    {
        $this->assertBooleanAttributeHelperMethods('reversed', OlTag::class);
        $this->assertAttributeHelperMethods('start', OlTag::class, 1, '1');
        $this->assertAttributeHelperMethods('start', OlTag::class, 0, '0');
        $this->assertAttributeHelperMethods('type', OlTag::class, ListTypeValue::letterLower, 'a');
        $this->assertAttributeHelperMethods('type', OlTag::class, ListTypeValue::letterUpper, 'A');
        $this->assertAttributeHelperMethods('type', OlTag::class, ListTypeValue::romanLower, 'i');
        $this->assertAttributeHelperMethods('type', OlTag::class, ListTypeValue::romanUpper, 'I');
        $this->assertAttributeHelperMethods('type', OlTag::class, ListTypeValue::number, '1');
    }

    public function testInvalidType(): void
    {
        $ol = new OlTag;
        $ol->attributes()['type'] = 'invalid type';
        $this->assertNull($ol->type());
    }
}
