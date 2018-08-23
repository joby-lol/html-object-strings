<?php
/* HTML Object Strings | https://gitlab.com/byjoby/html-object-strings | MIT License */
namespace HtmlObjectStrings;

use Flatrr\FlatArrayInterface;

interface HtmlInterface extends FlatArrayInterface
{
    public function attr(string $name, $value = null);
    public function data(string $name, $value = null);

    public function addClass(string $name);
    public function hasClass(string $name) : bool;
    public function removeClass(string $name);
    public function classes() : array;

    public function string() : string;

    public function __toString();
}
