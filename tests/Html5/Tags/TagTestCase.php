<?php

namespace ByJoby\HTML\Html5\Tags;

use ByJoby\HTML\ContainerInterface;
use ByJoby\HTML\Tags\ContentTagInterface;
use ByJoby\HTML\Tags\TagInterface;
use PHPUnit\Framework\TestCase;

abstract class TagTestCase extends TestCase
{
    protected function assertAttributeHelperMethods(string $attribute, string $class, string $test_value = 'some-value', string $render_value = 'some-value'): void
    {
        /** @var TagInterface */
        $tag = new $class;
        $words = explode('-', $attribute);
        $setFn = 'set' . implode('', array_map('ucfirst', $words));
        $unsetFn = 'unset' . implode('', array_map('ucfirst', $words));
        $getFn = array_shift($words) . implode('', array_map('ucfirst', $words));
        // test setter and expected rendering
        call_user_func([$tag, $setFn], $test_value);
        $this->assertTagRendersAttribute($tag, $attribute, $render_value);
        // test getter
        $this->assertEquals($render_value, call_user_func([$tag, $getFn]));
        $this->assertEquals($render_value, $tag->attributes()[$attribute]);
        // test unsetting via unset
        call_user_func([$tag, $unsetFn]);
        $this->assertNull(call_user_func([$tag, $getFn]));
        // test setting and unsetting via null value
        call_user_func([$tag, $setFn], $test_value);
        call_user_func([$tag, $setFn], null);
        $this->assertNull(call_user_func([$tag, $getFn]));
    }

    protected function assertBooleanAttributeHelperMethods(string $attribute, string $class): void
    {
        /** @var TagInterface */
        $tag = new $class;
        $words = explode('-', $attribute);
        $setFn = 'set' . implode('', array_map('ucfirst', $words));
        $getFn = array_shift($words) . implode('', array_map('ucfirst', $words));
        // test setting true
        call_user_func([$tag, $setFn], true);
        $this->assertTagRendersBooleanAttribute($tag, $attribute, true);
        $this->assertTrue(call_user_func([$tag, $getFn]));
        // test setting false
        call_user_func([$tag, $setFn], false);
        $this->assertTagRendersBooleanAttribute($tag, $attribute, false);
        $this->assertFalse(call_user_func([$tag, $getFn]));
    }

    protected function assertTagRendersAttribute(TagInterface $tag, string $attribute, string $value)
    {
        if ($tag instanceof ContainerInterface || $tag instanceof ContentTagInterface) {
            $this->assertEquals(
                sprintf('<%s %s="%s"></%s>', $tag->tag(), $attribute, $value, $tag->tag()),
                $tag->__toString(),
                sprintf('Unexpected rendering of %s value %s is in %s tag', $attribute, $value, $tag->tag())
            );
        } else {
            $this->assertEquals(
                sprintf('<%s %s="%s">', $tag->tag(), $attribute, $value),
                $tag->__toString(),
                sprintf('Unexpected rendering of %s value %s is in %s tag', $attribute, $value, $tag->tag())
            );
        }
    }

    protected function assertTagRendersBooleanAttribute(TagInterface $tag, string $attribute, bool $value)
    {
        if ($tag instanceof ContainerInterface || $tag instanceof ContentTagInterface) {
            if ($value) {
                $this->assertEquals(
                    sprintf('<%s %s></%s>', $tag->tag(), $attribute, $tag->tag()),
                    $tag->__toString(),
                    sprintf('Unexpected rendering of %s value %s is in %s tag', $attribute, $value ? 'true' : 'false', $tag->tag())
                );
            } else {
                $this->assertEquals(
                    sprintf('<%s></%s>', $tag->tag(), $tag->tag()),
                    $tag->__toString(),
                    sprintf('Unexpected rendering of %s value %s is in %s tag', $attribute, $value ? 'true' : 'false', $tag->tag())
                );
            }
        } else {
            if ($value) {
                $this->assertEquals(
                    sprintf('<%s %s>', $tag->tag(), $attribute),
                    $tag->__toString(),
                    sprintf('Unexpected rendering of %s value %s is in %s tag', $attribute, $value ? 'true' : 'false', $tag->tag())
                );
            } else {
                $this->assertEquals(
                    sprintf('<%s>', $tag->tag()),
                    $tag->__toString(),
                    sprintf('Unexpected rendering of %s value %s is in %s tag', $attribute, $value ? 'true' : 'false', $tag->tag())
                );
            }
        }
    }
}
