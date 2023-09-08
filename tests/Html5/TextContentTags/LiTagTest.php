<?php

namespace ByJoby\HTML\Html5\TextContentTags;

use ByJoby\HTML\Html5\Enums\Type_list;
use ByJoby\HTML\Html5\Tags\BaseTagTest;

class LiTagTest extends BaseTagTest
{
    public function testAttributeHelpers(): void
    {
        $this->assertAttributeHelperMethods('type', LiTag::class, Type_list::letterLower, 'a');
        $this->assertAttributeHelperMethods('type', LiTag::class, Type_list::letterUpper, 'A');
        $this->assertAttributeHelperMethods('type', LiTag::class, Type_list::romanLower, 'i');
        $this->assertAttributeHelperMethods('type', LiTag::class, Type_list::romanUpper, 'I');
        $this->assertAttributeHelperMethods('type', LiTag::class, Type_list::number, '1');
    }

    public function testInvalidType(): void
    {
        $ol = new LiTag;
        $ol->attributes()['type'] = 'invalid type';
        $this->assertNull($ol->type());
    }
}
