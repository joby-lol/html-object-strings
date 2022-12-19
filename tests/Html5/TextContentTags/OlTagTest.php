<?php

namespace ByJoby\HTML\Html5\TextContentTags;

use ByJoby\HTML\Html5\Tags\BaseTagTest;

class OlTagTest extends BaseTagTest
{
    public function testAttributeHelpers(): void
    {
        $this->assertBooleanAttributeHelperMethods('reversed', OlTag::class);
        $this->assertAttributeHelperMethods('start', OlTag::class, 1, 1);
        $this->assertAttributeHelperMethods('type', OlTag::class, 'a', 'a');
        $this->assertAttributeHelperMethods('type', OlTag::class, 'A', 'A');
        $this->assertAttributeHelperMethods('type', OlTag::class, 'i', 'i');
        $this->assertAttributeHelperMethods('type', OlTag::class, 'I', 'I');
        $this->assertAttributeHelperMethods('type', OlTag::class, '1', '1');
    }

    public function testInvalidType(): void
    {
        $ol = new OlTag;
        $ol->setType('X');
        $this->assertNull($ol->type());
    }
}
