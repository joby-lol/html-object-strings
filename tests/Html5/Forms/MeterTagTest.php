<?php

namespace Joby\HTML\Html5\Forms;

use Joby\HTML\Html5\Tags\TagTestCase;

class MeterTagTest extends TagTestCase
{

    // --- constructor ---

    public function testConstructorSetsValue(): void
    {
        $tag = new MeterTag(0.5);
        $this->assertEquals(0.5, $tag->value());
    }

    public function testConstructorDefaultMinMax(): void
    {
        $tag = new MeterTag(0.5);
        $this->assertEquals(0.0, $tag->min());
        $this->assertEquals(1.0, $tag->max());
    }

    public function testConstructorCustomMinMax(): void
    {
        $tag = new MeterTag(50, 0, 100);
        $this->assertEquals(0.0, $tag->min());
        $this->assertEquals(100.0, $tag->max());
        $this->assertEquals(50.0, $tag->value());
    }

    // --- value ---

    public function testValue(): void
    {
        $tag = new MeterTag(0.5);
        $tag->setValue(0.75);
        $this->assertEquals(0.75, $tag->value());
        $tag->unsetValue();
        $this->assertNull($tag->value());
    }

    public function testValueZeroIsValid(): void
    {
        $tag = new MeterTag(0.5);
        $tag->setValue(0.0);
        $this->assertEquals(0.0, $tag->value());
    }

    public function testValueNullUnsets(): void
    {
        $tag = new MeterTag(0.5);
        $tag->setValue(null);
        $this->assertNull($tag->value());
    }

    // --- min ---

    public function testMin(): void
    {
        $tag = new MeterTag(50, 0, 100);
        $tag->setMin(10.0);
        $this->assertEquals(10.0, $tag->min());
        $tag->unsetMin();
        $this->assertNull($tag->min());
    }

    public function testMinZeroIsValid(): void
    {
        $tag = new MeterTag(0.5);
        $tag->setMin(0.0);
        $this->assertEquals(0.0, $tag->min());
    }

    public function testMinNullUnsets(): void
    {
        $tag = new MeterTag(0.5);
        $tag->setMin(null);
        $this->assertNull($tag->min());
    }

    // --- max ---

    public function testMax(): void
    {
        $tag = new MeterTag(50, 0, 100);
        $tag->setMax(200.0);
        $this->assertEquals(200.0, $tag->max());
        $tag->unsetMax();
        $this->assertNull($tag->max());
    }

    public function testMaxZeroIsValid(): void
    {
        $tag = new MeterTag(0.5);
        $tag->setMax(0.0);
        $this->assertEquals(0.0, $tag->max());
    }

    // --- low ---

    public function testLow(): void
    {
        $tag = new MeterTag(50, 0, 100);
        $this->assertNull($tag->low());
        $tag->setLow(25.0);
        $this->assertEquals(25.0, $tag->low());
        $tag->unsetLow();
        $this->assertNull($tag->low());
    }

    public function testLowNullUnsets(): void
    {
        $tag = new MeterTag(50, 0, 100);
        $tag->setLow(25.0);
        $tag->setLow(null);
        $this->assertNull($tag->low());
    }

    // --- high ---

    public function testHigh(): void
    {
        $tag = new MeterTag(50, 0, 100);
        $this->assertNull($tag->high());
        $tag->setHigh(75.0);
        $this->assertEquals(75.0, $tag->high());
        $tag->unsetHigh();
        $this->assertNull($tag->high());
    }

    public function testHighNullUnsets(): void
    {
        $tag = new MeterTag(50, 0, 100);
        $tag->setHigh(75.0);
        $tag->setHigh(null);
        $this->assertNull($tag->high());
    }

    // --- optimum ---

    public function testOptimum(): void
    {
        $tag = new MeterTag(50, 0, 100);
        $this->assertNull($tag->optimum());
        $tag->setOptimum(60.0);
        $this->assertEquals(60.0, $tag->optimum());
        $tag->unsetOptimum();
        $this->assertNull($tag->optimum());
    }

    public function testOptimumNullUnsets(): void
    {
        $tag = new MeterTag(50, 0, 100);
        $tag->setOptimum(60.0);
        $tag->setOptimum(null);
        $this->assertNull($tag->optimum());
    }

    // --- chaining ---

    public function testChaining(): void
    {
        $tag = new MeterTag(50, 0, 100);
        $this->assertInstanceOf(MeterTag::class, $tag->setValue(60.0));
        $this->assertInstanceOf(MeterTag::class, $tag->unsetValue());
        $this->assertInstanceOf(MeterTag::class, $tag->setMin(0.0));
        $this->assertInstanceOf(MeterTag::class, $tag->unsetMin());
        $this->assertInstanceOf(MeterTag::class, $tag->setMax(100.0));
        $this->assertInstanceOf(MeterTag::class, $tag->unsetMax());
        $this->assertInstanceOf(MeterTag::class, $tag->setLow(25.0));
        $this->assertInstanceOf(MeterTag::class, $tag->unsetLow());
        $this->assertInstanceOf(MeterTag::class, $tag->setHigh(75.0));
        $this->assertInstanceOf(MeterTag::class, $tag->unsetHigh());
        $this->assertInstanceOf(MeterTag::class, $tag->setOptimum(60.0));
        $this->assertInstanceOf(MeterTag::class, $tag->unsetOptimum());
    }

}
