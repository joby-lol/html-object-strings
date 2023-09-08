<?php

namespace ByJoby\HTML\Html5\TextContentTags;

use ByJoby\HTML\Html5\Enums\Type_list;
use ByJoby\HTML\Html5\Tags\BaseTagTest;

class OlTagTest extends BaseTagTest
{
    public function testAttributeHelpers(): void
    {
        $this->assertBooleanAttributeHelperMethods('reversed', OlTag::class);
        $this->assertAttributeHelperMethods('start', OlTag::class, 1, '1');
        $this->assertAttributeHelperMethods('start', OlTag::class, 0, null);
        $this->assertAttributeHelperMethods('type', OlTag::class, Type_list::letterLower, 'a');
        $this->assertAttributeHelperMethods('type', OlTag::class, Type_list::letterUpper, 'A');
        $this->assertAttributeHelperMethods('type', OlTag::class, Type_list::romanLower, 'i');
        $this->assertAttributeHelperMethods('type', OlTag::class, Type_list::romanUpper, 'I');
        $this->assertAttributeHelperMethods('type', OlTag::class, Type_list::number, '1');
    }

    public function testInvalidType(): void
    {
        $ol = new OlTag;
        $ol->attributes()['type'] = 'invalid type';
        $this->assertNull($ol->type());
    }
}
