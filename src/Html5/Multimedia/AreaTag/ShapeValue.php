<?php

namespace ByJoby\HTML\Html5\Multimedia\AreaTag;

enum ShapeValue: string
{
    /**
     * indicates the entire region beyond any defined shapes
     */
    case default = "default";
    case rectangle = "rect";
    case circle = "circle";
    case polygon = "poly";
}