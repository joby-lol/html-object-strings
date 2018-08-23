<?php
/* HTML Object Strings | https://gitlab.com/byjoby/html-object-strings | MIT License */
namespace HtmlObjectStrings;

class Input extends GenericTag
{
    const TAG = 'input';
    const SELFCLOSING = true;
    const TYPE = 'text';

    protected function htmlInit()
    {
        parent::htmlInit();
        $this->attr('type', static::TYPE);
    }

    protected function htmlContent()
    {
        return parent::htmlContent();
    }

    protected function htmlAttributes()
    {
        $attr = parent::htmlAttributes();
        if ($value = $this->htmlContent()) {
            $attr['value'] = $value;
        }
        return $attr;
    }
}
