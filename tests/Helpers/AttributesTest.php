<?php

namespace ByJoby\HTML\Helpers;

use PHPUnit\Framework\TestCase;

class AttributesTest extends TestCase
{
    public function testConstruction(): Attributes
    {
        $attributes = new Attributes();
        $this->assertEquals([], $attributes->getArray());
        $attributes = new Attributes(['foo' => 'bar', 'baz' => true]);
        $this->assertEquals(['baz' => true, 'foo' => 'bar'], $attributes->getArray());
        return $attributes;
    }

    public function testInvalidConstructionEmptyName(): void
    {
        $this->expectExceptionMessage('Attribute name must be specified when setting');
        $attributes = new Attributes(['' => 'foo']);
    }

    public function testInvalidConstructionInvalidName(): void
    {
        $this->expectExceptionMessage('Invalid character in attribute name');
        $attributes = new Attributes(['a=b' => 'foo']);
    }

    /**
     * @depends clone testConstruction
     */
    public function testSetAndUnset(Attributes $attributes): void
    {
        $attributes['a'] = 'b';
        $this->assertEquals('b', $attributes['a']);
        $this->assertEquals(['a' => 'b', 'baz' => true, 'foo' => 'bar'], $attributes->getArray());
        unset($attributes['baz']);
        $this->assertEquals(['a' => 'b', 'foo' => 'bar'], $attributes->getArray());
    }

    /**
     * @depends clone testConstruction
     */
    public function testOffsetExists(Attributes $attributes): void
    {
        // test with a regular string
        $this->assertFalse(isset($attributes['a']));
        $attributes['a'] = 'b';
        $this->assertTrue(isset($attributes['a']));
        // test with an empty string
        $attributes['b'] = '';
        $this->assertTrue(isset($attributes['b']));
        // test with a null value
        $attributes['c'] = null;
        $this->assertFalse(isset($attributes['c']));
    }

    /**
     * @depends clone testConstruction
     */
    public function testInvalidSetEmptyName(Attributes $attributes): void
    {
        $this->expectExceptionMessage('Attribute name must be specified when setting');
        $attributes[] = 'b';
    }

    /**
     * @depends clone testConstruction
     */
    public function testInvalidSetInvalidName(Attributes $attributes): void
    {
        $this->expectExceptionMessage('Invalid character in attribute name');
        $attributes['>'] = 'b';
    }

    public function testAsString(): void
    {
        $a = new Attributes();
        $this->assertNull($a->asString('non-existent'));
        $a['empty-string'] = '';
        $this->assertEquals('', $a->asString('empty-string'));
        $a['string'] = 's';
        $this->assertEquals('s', $a->asString('string'));
        $a['int'] = 1;
        $this->assertEquals('1', $a->asString('int'));
        $a['int_string'] = '1';
        $this->assertEquals('1', $a->asString('int_string'));
        $a['float'] = 1.5;
        $this->assertEquals('1.5', $a->asString('float'));
        $a['float_string'] = '1.5';
        $this->assertEquals('1.5', $a->asString('float_string'));
        $a['zero'] = 0;
        $this->assertEquals('0', $a->asString('zero'));
        $a['zero_string'] = '0';
        $this->assertEquals('0', $a->asString('zero_string'));
    }

    public function testAsNumber(): void
    {
        $a = new Attributes();
        $this->assertNull($a->asNumber('non-existent'));
        $a['empty-string'] = '';
        $this->assertNull($a->asNumber('empty-string'));
        $a['string'] = 's';
        $this->assertNull($a->asNumber('string'));
        $a['int'] = 1;
        $this->assertEquals(1, $a->asNumber('int'));
        $a['int_string'] = '1';
        $this->assertEquals(1, $a->asNumber('int_string'));
        $a['float'] = 1.5;
        $this->assertEquals(1.5, $a->asNumber('float'));
        $a['float_string'] = '1.5';
        $this->assertEquals(1.5, $a->asNumber('float_string'));
        $a['zero'] = 0;
        $this->assertEquals(0, $a->asNumber('zero'));
        $a['zero_string'] = '0';
        $this->assertEquals(0, $a->asNumber('zero_string'));
    }

    public function testAsFloat(): void
    {
        $a = new Attributes();
        $this->assertNull($a->asFloat('non-existent'));
        $a['empty-string'] = '';
        $this->assertNull($a->asFloat('empty-string'));
        $a['string'] = 's';
        $this->assertNull($a->asFloat('string'));
        $a['int'] = 1;
        $this->assertEquals(1, $a->asFloat('int'));
        $a['int_string'] = '1';
        $this->assertEquals(1, $a->asFloat('int_string'));
        $a['float'] = 1.5;
        $this->assertEquals(1.5, $a->asFloat('float'));
        $a['float_string'] = '1.5';
        $this->assertEquals(1.5, $a->asFloat('float_string'));
        $a['zero'] = 0;
        $this->assertEquals(0, $a->asFloat('zero'));
        $a['zero_string'] = '0';
        $this->assertEquals(0, $a->asFloat('zero_string'));
    }

    public function testAsInt(): void
    {
        $a = new Attributes();
        $this->assertNull($a->asInt('non-existent'));
        $a['empty-string'] = '';
        $this->assertNull($a->asInt('empty-string'));
        $a['string'] = 's';
        $this->assertNull($a->asInt('string'));
        $a['int'] = 1;
        $this->assertEquals(1, $a->asInt('int'));
        $a['int_string'] = '1';
        $this->assertEquals(1, $a->asInt('int_string'));
        $a['float'] = 1.5;
        $this->assertEquals(1, $a->asInt('float'));
        $a['float_string'] = '1.5';
        $this->assertEquals(1., $a->asInt('float_string'));
        $a['zero'] = 0;
        $this->assertEquals(0, $a->asInt('zero'));
        $a['zero_string'] = '0';
        $this->assertEquals(0, $a->asInt('zero_string'));
    }

    public function testAsEnum(): void
    {
        $a = new Attributes();
        $a['string-a'] = TestStringEnum::a->value;
        $this->assertEquals(TestStringEnum::a, $a->asEnum('string-a', TestStringEnum::class));
        $a['string-b'] = TestStringEnum::b->value;
        $this->assertEquals(TestStringEnum::b, $a->asEnum('string-b', TestStringEnum::class));
        $a['int-one'] = TestIntEnum::one->value;
        $this->assertEquals(TestIntEnum::one, $a->asEnum('int-one', TestIntEnum::class));
        $a['int-two'] = TestIntEnum::two->value;
        $this->assertEquals(TestIntEnum::two, $a->asEnum('int-two', TestIntEnum::class));
    }

    public function testAsEnumInvalidCases(): void
    {
        $a = new Attributes();
        $a['string-c'] = 'c';
        $this->assertNull($a->asEnum('string-a', TestStringEnum::class));
        $this->assertNull($a->asEnum('string-a', TestIntEnum::class));
        $a['int-three'] = 'three';
        $this->assertNull($a->asEnum('int-two', TestIntEnum::class));
        $this->assertNull($a->asEnum('int-two', TestStringEnum::class));
    }

    public function testEnumArraySingleValue(): void
    {
        $a = new Attributes();
        $a->setEnumArray('v', TestStringEnum::a, TestStringEnum::class, ' ');
        $this->assertEquals('a', $a['v']);
        $this->assertEquals(
            [TestStringEnum::a],
            $a->asEnumArray('v', TestStringEnum::class, ' ')
        );
        // should return an empty array for a different enum class
        $this->assertEquals(
            [],
            $a->asEnumArray('v', TestIntEnum::class, ' ')
        );
    }

    public function testEnumArrayValue(): void
    {
        $a = new Attributes();
        $a->setEnumArray('v', [TestStringEnum::a, TestStringEnum::b], TestStringEnum::class, ' ');
        $this->assertEquals('a b', $a['v']);
        $this->assertEquals(
            [TestStringEnum::a, TestStringEnum::b],
            $a->asEnumArray('v', TestStringEnum::class, ' ')
        );
        // should return an empty array for a different enum class
        $this->assertEquals(
            [],
            $a->asEnumArray('v', TestIntEnum::class, ' ')
        );
        // should return an empty array for a different separator
        $this->assertEquals(
            [],
            $a->asEnumArray('v', TestStringEnum::class, ', ')
        );
    }
}

enum TestStringEnum: string
{
    case a = 'a';
    case b = 'b';
}

enum TestIntEnum: int
{
    case one = 1;
    case two = 2;
}