<?php

/**
 * HTML Object Strings
 * https://github.com/joby-lol/html-object-strings
 * (c) 2024-2026 Joby Elliott code@joby.lol
 * MIT License https://opensource.org/licenses/MIT
 */

namespace Joby\HTML\Html5\Tags;

use Joby\HTML\Html5\Tags\SvgTag\PreserveAspectRatioStringable;
use Joby\HTML\Html5\Tags\SvgTag\PreserveAspectRatioValue;
use Joby\HTML\Html5\Traits\HeightAndWidthTrait;
use Joby\HTML\Tags\AbstractContentTag;

/**
 * The <svg> SVG element is a container that defines a new coordinate system and viewport. It is used as the outermost element of SVG documents, but it can also be used to embed an SVG fragment inside an SVG or HTML document.
 * 
 * This element is for creating new SVG documents. If you have an existing SVG document to embed in another document via URL, use <img>, <object>, or <image>.
 *
 * Tag description by Mozilla Contributors licensed under CC-BY-SA 2.5
 * https://developer.mozilla.org/en-US/docs/Web/SVG/Reference/Element/svg
 */
class SvgTag extends AbstractContentTag
{

    use HeightAndWidthTrait;

    const TAG = 'svg';

    protected $content = '';

    public function __construct(string $content)
    {
        parent::__construct();
        $this->setContent($content);
        $this->attributes()['xmlns'] = 'http://www.w3.org/2000/svg';
    }

    /**
     * How the svg fragment must be deformed if it is displayed with a different aspect ratio. Value type: (none | xMinYMin | xMidYMin | xMaxYMin | xMinYMid | xMidYMid | xMaxYMid | xMinYMax | xMidYMax | xMaxYMax) (meet | slice)?; Default value: xMidYMid meet; Animatable: yes
     */
    public function setPreserveAspectRatio(PreserveAspectRatioValue|null $value, bool $slice = false): static
    {
        if ($value)
            $this->attributes()['preserveaspectratio'] = new PreserveAspectRatioStringable($value, $slice);
        else
            $this->unsetPreserveAspectRatio();
        return $this;
    }

    /**
     * How the svg fragment must be deformed if it is displayed with a different aspect ratio. Value type: (none | xMinYMin | xMidYMin | xMaxYMin | xMinYMid | xMidYMid | xMaxYMid | xMinYMax | xMidYMax | xMaxYMax) (meet | slice)?; Default value: xMidYMid meet; Animatable: yes
     */
    public function unsetPreserveAspectRatio(): static
    {
        unset($this->attributes()['preserveaspectratio']);
        return $this;
    }

    /**
     * The SVG viewport coordinates for the current SVG fragment. Value type: <list-of-numbers>; Default value: none; Animatable: yes
     */
    public function setViewBox(int $minX, int $minY, int $width, int $height): static
    {
        $this->attributes()['viewbox'] = implode(' ', [$minX, $minY, $width, $height]);
        return $this;
    }

    /**
     * The SVG viewport coordinates for the current SVG fragment. Value type: <list-of-numbers>; Default value: none; Animatable: yes
     */
    public function unsetViewBox(): static
    {
        unset($this->attributes()['viewbox']);
        return $this;
    }

}
