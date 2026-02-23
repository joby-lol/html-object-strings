<?php

/**
 * HTML Object Strings
 * https://github.com/joby-lol/html-object-strings
 * (c) 2024-2026 Joby Elliott code@joby.lol
 * MIT License https://opensource.org/licenses/MIT
 */

namespace Joby\HTML\Html5\Tags\SvgTag;

/**
 * The preserveAspectRatio attribute indicates how an element with a viewBox providing a given aspect ratio must fit into a viewport with a different aspect ratio.
 * 
 * The aspect ratio of an SVG image is defined by the viewBox attribute. Therefore, if viewBox isn't set, the preserveAspectRatio attribute has no effect on SVG's scaling (except in the case of the <image> element, where preserveAspectRatio behaves differently as described below).
 * 
 * The preserveAspectRatio attribute value consists of up to two keywords: a required alignment value and an optional meet or slice keyword.
 * 
 * The alignment value indicates whether to force uniform scaling and, if so, the alignment method to use in case the aspect ratio of the viewBox doesn't match the aspect ratio of the viewport. xMidYMid is the default value. The alignment value must be one of the following keyword values:
 * 
 * Tag description by Mozilla Contributors licensed under CC-BY-SA 2.5
 * https://developer.mozilla.org/en-US/docs/Web/SVG/Reference/Attribute/preserveAspectRatio
 */
enum PreserveAspectRatioValue: string
{

    /**
     * Does not force uniform scaling. Scale the graphic content of the given element non-uniformly if necessary such that the element's bounding box exactly matches the viewport rectangle. Note that if <align> is none, then the optional <meetOrSlice> value is ignored.
     */
    case none = "none";

    /**
     * Forces uniform scaling. Align the <min-x> of the element's viewBox with the smallest X value of the viewport. Align the <min-y> of the element's viewBox with the smallest Y value of the viewport.
     */
    case xMinYMin = "xMinYMin";

    /**
     * Forces uniform scaling. Align the midpoint X value of the element's viewBox with the midpoint X value of the viewport. Align the <min-y> of the element's viewBox with the smallest Y value of the viewport.
     */
    case xMidYMin = "xMidYMin";

    /**
     * Forces uniform scaling. Align the <min-x>+<width> of the element's viewBox with the maximum X value of the viewport. Align the <min-y> of the element's viewBox with the smallest Y value of the viewport.
     */
    case xMaxYMin = "xMaxYMin";

    /**
     * Forces uniform scaling. Align the <min-x> of the element's viewBox with the smallest X value of the viewport. Align the midpoint Y value of the element's viewBox with the midpoint Y value of the viewport.
     */
    case xMinYMid = "xMinYMid";

    /**
     * Forces uniform scaling. Align the midpoint X value of the element's viewBox with the midpoint X value of the viewport. Align the midpoint Y value of the element's viewBox with the midpoint Y value of the viewport. This is the default value.
     */
    case xMidYMid = "xMidYMid";

    /**
     * Forces uniform scaling. Align the <min-x>+<width> of the element's viewBox with the maximum X value of the viewport. Align the midpoint Y value of the element's viewBox with the midpoint Y value of the viewport.
     */
    case xMaxYMid = "xMaxYMid";

    /**
     * Forces uniform scaling. Align the <min-x> of the element's viewBox with the smallest X value of the viewport. Align the <min-y>+<height> of the element's viewBox with the maximum Y value of the viewport.
     */
    case xMinYMax = "xMinYMax";

    /**
     * Forces uniform scaling. Align the midpoint X value of the element's viewBox with the midpoint X value of the viewport. Align the <min-y>+<height> of the element's viewBox with the maximum Y value of the viewport.
     */
    case xMidYMax = "xMidYMax";

    /**
     * Forces uniform scaling. Align the <min-x>+<width> of the element's viewBox with the maximum X value of the viewport. Align the <min-y>+<height> of the element's viewBox with the maximum Y value of the viewport.
     */
    case xMaxYMax = "xMaxYMax";

}
