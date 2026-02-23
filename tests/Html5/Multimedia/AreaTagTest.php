<?php

namespace Joby\HTML\Html5\Multimedia;

use Joby\HTML\Html5\Exceptions\InvalidArgumentsException;
use Joby\HTML\Html5\Multimedia\AreaTag\ShapeValue;
use Joby\HTML\Html5\Tags\TagTestCase;

class AreaTagTest extends TagTestCase
{

    public function testAttributeHelpers(): void
    {
        $this->assertAttributeHelperMethods('alt', AreaTag::class);
    }

    // --- alt ---

    public function testAltBasic(): void
    {
        $tag = new AreaTag();
        $this->assertNull($tag->alt());
        $tag->setAlt('A clickable region');
        $this->assertEquals('A clickable region', $tag->alt());
        $tag->unsetAlt();
        $this->assertNull($tag->alt());
    }

    public function testAltNullUnsets(): void
    {
        $tag = new AreaTag();
        $tag->setAlt('A clickable region');
        $tag->setAlt(null);
        $this->assertNull($tag->alt());
    }

    // --- setHref override requires alt ---

    public function testSetHrefRequiresAlt(): void
    {
        $this->expectException(InvalidArgumentsException::class);
        $tag = new AreaTag();
        $tag->setHref('https://example.com');
    }

    public function testSetHrefWithAlt(): void
    {
        $tag = new AreaTag();
        $tag->setHref('https://example.com', 'Home page');
        $this->assertEquals('https://example.com', $tag->href());
        $this->assertEquals('Home page', $tag->alt());
    }

    public function testSetHrefNullUnsets(): void
    {
        $tag = new AreaTag();
        $tag->setHref('https://example.com', 'Home page');
        $tag->setHref(null);
        $this->assertNull($tag->href());
    }

    // --- coords ---

    public function testCoordsBasic(): void
    {
        $tag = new AreaTag();
        $this->assertNull($tag->coords());
        $tag->setCoords([10, 20, 30, 40]);
        $this->assertEquals([10, 20, 30, 40], $tag->coords());
        $tag->unsetCoords();
        $this->assertNull($tag->coords());
    }

    public function testCoordsFromString(): void
    {
        $tag = new AreaTag();
        $tag->setCoords('10,20,30,40');
        $this->assertEquals([10, 20, 30, 40], $tag->coords());
    }

    public function testCoordsNullUnsets(): void
    {
        $tag = new AreaTag();
        $tag->setCoords([10, 20, 30, 40]);
        $tag->setCoords(null);
        $this->assertNull($tag->coords());
    }

    // --- shape helpers ---

    public function testSetShapeDefault(): void
    {
        $tag = new AreaTag();
        $tag->setShapeDefault();
        $this->assertEquals(ShapeValue::default , $tag->shape());
        $this->assertNull($tag->coords());
    }

    public function testSetRectangle(): void
    {
        $tag = new AreaTag();
        $tag->setRectangle(0, 0, 100, 50);
        $this->assertEquals(ShapeValue::rectangle, $tag->shape());
        $this->assertEquals([0, 0, 100, 50], $tag->coords());
    }

    public function testSetCircle(): void
    {
        $tag = new AreaTag();
        $tag->setCircle(50, 50, 25);
        $this->assertEquals(ShapeValue::circle, $tag->shape());
        $this->assertEquals([50, 50, 25], $tag->coords());
    }

    public function testSetPolygon(): void
    {
        $tag = new AreaTag();
        $tag->setPolygon(0, 0, 100, 0, 50, 50);
        $this->assertEquals(ShapeValue::polygon, $tag->shape());
        $this->assertEquals([0, 0, 100, 0, 50, 50], $tag->coords());
    }

    public function testUnsetShapeClearsCoords(): void
    {
        $tag = new AreaTag();
        $tag->setRectangle(0, 0, 100, 50);
        $tag->unsetShape();
        $this->assertNull($tag->shape());
        $this->assertNull($tag->coords());
    }

    public function testSetShapeViaDispatch(): void
    {
        $tag = new AreaTag();
        $tag->setShape(ShapeValue::rectangle, 0, 0, 100, 50);
        $this->assertEquals(ShapeValue::rectangle, $tag->shape());
        $tag->setShape(ShapeValue::circle, 50, 50, 25);
        $this->assertEquals(ShapeValue::circle, $tag->shape());
        $tag->setShape(ShapeValue::polygon, 0, 0, 100, 0, 50, 50);
        $this->assertEquals(ShapeValue::polygon, $tag->shape());
        $tag->setShape(ShapeValue::default);
        $this->assertEquals(ShapeValue::default , $tag->shape());
        $tag->setShape(null);
        $this->assertNull($tag->shape());
    }

    public function testSetShapeDefaultClearsCoords(): void
    {
        $tag = new AreaTag();
        $tag->setRectangle(0, 0, 100, 50);
        $tag->setShapeDefault();
        $this->assertNull($tag->coords());
    }

    // --- chaining ---

    public function testChaining(): void
    {
        $tag = new AreaTag();
        $this->assertInstanceOf(AreaTag::class, $tag->setAlt('Region'));
        $this->assertInstanceOf(AreaTag::class, $tag->unsetAlt());
        $this->assertInstanceOf(AreaTag::class, $tag->setCoords([0, 0, 10, 10]));
        $this->assertInstanceOf(AreaTag::class, $tag->unsetCoords());
        $this->assertInstanceOf(AreaTag::class, $tag->setRectangle(0, 0, 100, 50));
        $this->assertInstanceOf(AreaTag::class, $tag->setCircle(50, 50, 25));
        $this->assertInstanceOf(AreaTag::class, $tag->setPolygon(0, 0, 100, 0, 50, 50));
        $this->assertInstanceOf(AreaTag::class, $tag->setShapeDefault());
        $this->assertInstanceOf(AreaTag::class, $tag->unsetShape());
    }

}
