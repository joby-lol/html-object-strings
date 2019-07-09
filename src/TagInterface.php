<?php
/* HTML Object Strings | https://gitlab.com/byjoby/html-object-strings | MIT License */
namespace HtmlObjectStrings;

interface TagInterface
{
    public function attr(string $name, $value = null);
    public function data(string $name, $value = null);

    public function addClass(string $name);
    public function hasClass(string $name) : bool;
    public function removeClass(string $name);
    public function classes() : array;
    public function hidden($hidden=null);

    public function string() : string;

    public function __toString();
}
