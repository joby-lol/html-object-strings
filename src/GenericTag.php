<?php
/* HTML Object Strings | https://gitlab.com/byjoby/html-object-strings | MIT License */
namespace HtmlObjectStrings;

class GenericTag implements TagInterface
{
    use TagTrait;

    const TAG = 'span';
    const SELFCLOSING = false;

    public function __construct()
    {
        $this->htmlInit();
    }

    protected function htmlInit()
    {
        $this->tag = static::TAG;
        $this->selfClosing = static::SELFCLOSING;
    }
}
