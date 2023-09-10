<?php

namespace ByJoby\HTML\Html5\TextContentTags;

use ByJoby\HTML\Html5\Enums\ListTypeValue;
use ByJoby\HTML\Html5\Tags\BaseTagTest;

class LiTagTest extends BaseTagTest
{
    public function testAttributeHelpers(): void
    {
        $this->assertAttributeHelperMethods('type', LiTag::class, ListTypeValue::letterLower, 'a');
        $this->assertAttributeHelperMethods('type', LiTag::class, ListTypeValue::letterUpper, 'A');
        $this->assertAttributeHelperMethods('type', LiTag::class, ListTypeValue::romanLower, 'i');
        $this->assertAttributeHelperMethods('type', LiTag::class, ListTypeValue::romanUpper, 'I');
        $this->assertAttributeHelperMethods('type', LiTag::class, ListTypeValue::number, '1');
    }

    public function testInvalidType(): void
    {
        $ol = new LiTag;
        $ol->attributes()['type'] = 'invalid type';
        $this->assertNull($ol->type());
    }
}
