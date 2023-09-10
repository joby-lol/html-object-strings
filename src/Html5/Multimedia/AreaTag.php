<?php

namespace ByJoby\HTML\Html5\Multimedia;

use ByJoby\HTML\Html5\Exceptions\InvalidArgumentsException;
use ByJoby\HTML\Html5\Multimedia\AreaTag\ShapeValue;
use ByJoby\HTML\Html5\Traits\HyperlinkTrait;
use ByJoby\HTML\Tags\AbstractTag;
use Stringable;

/**
 * The <area> HTML element defines an area inside an image map that has
 * predefined clickable areas. An image map allows geometric areas on an image
 * to be associated with hypertext links.
 *
 * This element is used only within a <map> element.
 *
 * Tag description by Mozilla Contributors licensed under CC-BY-SA 2.5
 * https://developer.mozilla.org/en-US/docs/Web/HTML/Element/area
 */
class AreaTag extends AbstractTag
{
    use HyperlinkTrait;
    const TAG = 'area';

    /**
     * @inheritDoc
     *
     * @param null|string|Stringable $href
     * @param null|string|Stringable|null $alt required to set for <area> tags
     * @return self
     */
    public function setHref(null|string|Stringable $href, null|string|Stringable $alt = null): self
    {
        if ($href) {
            $this->attributes()['href'] = $href;
            if (!$alt) throw new InvalidArgumentsException('alt text is required to set href on an <area> tag');
        } else $this->unsetHref();
        if ($alt) $this->setAlt($alt);
        return $this;
    }

    /**
     * A text string alternative to display on browsers that do not display
     * images. The text should be phrased so that it presents the user with the
     * same kind of choice as the image would offer when displayed without the
     * alternative text. This attribute is required only if the href attribute
     * is used. 
     *
     * @return null|string|Stringable
     */
    public function alt(): null|string|Stringable
    {
        return $this->attributes()->asString('alt');
    }

    /**
     * A text string alternative to display on browsers that do not display
     * images. The text should be phrased so that it presents the user with the
     * same kind of choice as the image would offer when displayed without the
     * alternative text. This attribute is required only if the href attribute
     * is used. 
     *
     * @param null|string|Stringable $alt
     * @return self
     */
    public function setAlt(null|string|Stringable $alt): self
    {
        if (!$alt) $this->unsetAlt();
        else $this->attributes()['alt'] = $alt;
        return $this;
    }

    /**
     * A text string alternative to display on browsers that do not display
     * images. The text should be phrased so that it presents the user with the
     * same kind of choice as the image would offer when displayed without the
     * alternative text. This attribute is required only if the href attribute
     * is used. 
     *
     * @return self
     */
    public function unsetAlt(): self
    {
        unset($this->attributes()['alt']);
        return $this;
    }

    /**
     * The coords attribute details the coordinates of the shape attribute in
     * size, shape, and placement of an <area>. This attribute must not be used
     * if shape is set to default.
     *
     * @return null|array<int,int>
     */
    public function coords(): null|array
    {
        // TODO write tests for this
        $coords = $this->attributes()->asString('coords');
        if (!$coords) return null;
        $coords = explode(',', $coords);
        $coords = array_map(trim(...), $coords);
        $coords = array_filter($coords, fn($e) => $e !== '');
        $coords = array_map(intval(...), $coords);
        return $coords;
    }

    /**
     * The coords attribute details the coordinates of the shape attribute in
     * size, shape, and placement of an <area>. This attribute must not be used
     * if shape is set to default. 
     *
     * @param null|string|Stringable|array<int|string,int> $coords
     * @return self
     */
    public function setCoords(null|string|Stringable|array $coords): self
    {
        if (is_array($coords)) $coords = implode(',', $coords);
        if (!$coords) $this->unsetCoords();
        else $this->attributes()['coords'] = $coords;
        return $this;
    }

    public function unsetCoords(): self
    {
        unset($this->attributes()['coords']);
        return $this;
    }

    /**
     * The shape of the associated hot spot. The specifications for HTML defines
     * the values rect, which defines a rectangular region; circle, which
     * defines a circular region; poly, which defines a polygon; and default,
     * which indicates the entire region beyond any defined shapes.
     *
     * @return null|ShapeValue
     */
    public function shape(): null|ShapeValue
    {
        return $this->attributes()->asEnum('shape', ShapeValue::class);
    }

    /**
     * The shape of the associated hot spot. The specifications for HTML defines
     * the values rect, which defines a rectangular region; circle, which
     * defines a circular region; poly, which defines a polygon; and default,
     * which indicates the entire region beyond any defined shapes.
     *
     * @param ShapeValue|null $shape
     * @param int $coords
     * @return self
     */
    public function setShape(ShapeValue|null $shape, ...$coords): self
    {
        // TODO write tests for the various shape setters
        if (!$shape) return $this->unsetShape();
        switch ($shape) {
            case ShapeValue::default:
                return $this->setShapeDefault();
            case ShapeValue::rectangle:
                return $this->setRectangle(...$coords);
            case ShapeValue::circle:
                return $this->setCircle(...$coords);
            case ShapeValue::polygon:
                return $this->setPolygon(...$coords);
        }
        return $this;
    }

    /**
     * The shape of the associated hot spot. The specifications for HTML defines
     * the values rect, which defines a rectangular region; circle, which
     * defines a circular region; poly, which defines a polygon; and default,
     * which indicates the entire region beyond any defined shapes.
     *
     * @return self
     */
    public function unsetShape(): self
    {
        unset($this->attributes()['shape']);
        $this->unsetCoords();
        return $this;
    }

    /**
     * indicates the entire region beyond any defined shapes.
     *
     * @return self
     */
    public function setShapeDefault(): self
    {
        $this->attributes()['shape'] = ShapeValue::default ->value;
        $this->unsetCoords();
        return $this;
    }

    /**
     * the value is x1,y1,x2,y2. The value specifies the coordinates of the
     * top-left and bottom-right corner of the rectangle. For example, in <area
     * shape="rect" coords="0,0,253,27" href="#" target="_blank" alt="Mozilla">
     * the coordinates are 0,0 and 253,27, indicating the top-left and
     * bottom-right corners of the rectangle, respectively. 
     *
     * @param integer $x1
     * @param integer $y1
     * @param integer $x2
     * @param integer $y2
     * @return self
     */
    public function setRectangle(int $x1, int $y1, int $x2, int $y2): self
    {
        $this->attributes()['shape'] = ShapeValue::rectangle->value;
        $this->setCoords([$x1, $y1, $x2, $y2]);
        return $this;
    }

    /**
     * the value is x,y,radius. Value specifies the coordinates of the circle
     * center and the radius.
     *
     * @param integer $x
     * @param integer $y
     * @param integer $radius
     * @return self
     */
    public function setCircle(int $x, int $y, int $radius): self
    {
        $this->attributes()['shape'] = ShapeValue::circle->value;
        $this->setCoords([$x, $y, $radius]);
        return $this;
    }

    /**
     * the value is x1,y1,x2,y2,..,xn,yn. Value specifies the coordinates of the
     * edges of the polygon. If the first and last coordinate pairs are not the
     * same, the browser will add the last coordinate pair to close the polygon 
     *
     * @param int ...$coords
     * @return self
     */
    public function setPolygon(...$coords): self
    {
        $this->attributes()['shape'] = ShapeValue::polygon->value;
        $this->setCoords($coords);
        return $this;
    }
}