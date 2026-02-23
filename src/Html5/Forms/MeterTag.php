<?php

/**
 * HTML Object Strings
 * https://github.com/joby-lol/html-object-strings
 * (c) 2024-2026 Joby Elliott code@joby.lol
 * MIT License https://opensource.org/licenses/MIT
 */

namespace Joby\HTML\Html5\Forms;

use Joby\HTML\Tags\AbstractContainerTag;

/**
 * The <meter> HTML element represents either a scalar value within a known range or a fractional value.
 *
 * Tag description by Mozilla Contributors licensed under CC-BY-SA 2.5
 * https://developer.mozilla.org/en-US/docs/Web/HTML/Reference/Elements/meter
 */
class MeterTag extends AbstractContainerTag
{

    const TAG = 'meter';

    public function __construct(float $value, float $min = 0, float $max = 1)
    {
        parent::__construct();
        $this->setValue($value);
        $this->setMin($min);
        $this->setMax($max);
    }

    /**
     * The current numeric value. This must be between the minimum and maximum values (min attribute and max attribute) if they are specified.
     *
     * @return null|float
     */
    public function value(): null|float
    {
        return $this->attributes()->asFloat('value');
    }

    /**
     * The current numeric value. This must be between the minimum and maximum values (min attribute and max attribute) if they are specified.
     *
     * @param null|float $value
     * @return static
     */
    public function setValue(null|float $value): static
    {
        if ($value !== null)
            $this->attributes()['value'] = $value;
        else
            $this->unsetValue();
        return $this;
    }

    /**
     * The current numeric value. This must be between the minimum and maximum values (min attribute and max attribute) if they are specified.
     *
     * @return static
     */
    public function unsetValue(): static
    {
        unset($this->attributes()['value']);
        return $this;
    }

    /**
     * The lower numeric bound of the measured range. This must be less than the maximum value (max attribute), if specified. If unspecified, the minimum value is 0.
     *
     * @return null|float
     */
    public function min(): null|float
    {
        return $this->attributes()->asFloat('min');
    }

    /**
     * The lower numeric bound of the measured range. This must be less than the maximum value (max attribute), if specified. If unspecified, the minimum value is 0.
     *
     * @param null|float $min
     * @return static
     */
    public function setMin(null|float $min): static
    {
        if ($min !== null)
            $this->attributes()['min'] = $min;
        else
            $this->unsetMin();
        return $this;
    }

    /**
     * The lower numeric bound of the measured range. This must be less than the maximum value (max attribute), if specified. If unspecified, the minimum value is 0.
     *
     * @return static
     */
    public function unsetMin(): static
    {
        unset($this->attributes()['min']);
        return $this;
    }

    /**
     * The upper numeric bound of the measured range. This must be greater than the minimum value (min attribute), if specified. If unspecified, the maximum value is 1.
     *
     * @return null|float
     */
    public function max(): null|float
    {
        return $this->attributes()->asFloat('max');
    }

    /**
     * The upper numeric bound of the measured range. This must be greater than the minimum value (min attribute), if specified. If unspecified, the maximum value is 1.
     *
     * @param null|float $max
     * @return static
     */
    public function setMax(null|float $max): static
    {
        if ($max !== null)
            $this->attributes()['max'] = $max;
        else
            $this->unsetMax();
        return $this;
    }

    /**
     * The upper numeric bound of the measured range. This must be greater than the minimum value (min attribute), if specified. If unspecified, the maximum value is 1.
     *
     * @return static
     */
    public function unsetMax(): static
    {
        unset($this->attributes()['max']);
        return $this;
    }

    /**
     * The upper numeric bound of the low end of the measured range. This must be greater than the minimum value (min attribute), and it must be less than the high value and maximum value (high attribute and max attribute), if any are specified. If unspecified, or if less than the minimum value, the low value is equal to the minimum value.
     *
     * @return null|float
     */
    public function low(): null|float
    {
        return $this->attributes()->asFloat('low');
    }

    /**
     * The upper numeric bound of the low end of the measured range. This must be greater than the minimum value (min attribute), and it must be less than the high value and maximum value (high attribute and max attribute), if any are specified. If unspecified, or if less than the minimum value, the low value is equal to the minimum value.
     *
     * @param null|float $low
     * @return static
     */
    public function setLow(null|float $low): static
    {
        if ($low !== null)
            $this->attributes()['low'] = $low;
        else
            $this->unsetLow();
        return $this;
    }

    /**
     * The upper numeric bound of the low end of the measured range. This must be greater than the minimum value (min attribute), and it must be less than the high value and maximum value (high attribute and max attribute), if any are specified. If unspecified, or if less than the minimum value, the low value is equal to the minimum value.
     *
     * @return static
     */
    public function unsetLow(): static
    {
        unset($this->attributes()['low']);
        return $this;
    }

    /**
     * The lower numeric bound of the high end of the measured range. This must be less than the maximum value (max attribute), and it must be greater than the low value and minimum value (low attribute and min attribute), if any are specified. If unspecified, or if greater than the maximum value, the high value is equal to the maximum value.
     *
     * @return null|float
     */
    public function high(): null|float
    {
        return $this->attributes()->asFloat('high');
    }

    /**
     * The lower numeric bound of the high end of the measured range. This must be less than the maximum value (max attribute), and it must be greater than the low value and minimum value (low attribute and min attribute), if any are specified. If unspecified, or if greater than the maximum value, the high value is equal to the maximum value.
     *
     * @param null|float $high
     * @return static
     */
    public function setHigh(null|float $high): static
    {
        if ($high !== null)
            $this->attributes()['high'] = $high;
        else
            $this->unsetHigh();
        return $this;
    }

    /**
     * The lower numeric bound of the high end of the measured range. This must be less than the maximum value (max attribute), and it must be greater than the low value and minimum value (low attribute and min attribute), if any are specified. If unspecified, or if greater than the maximum value, the high value is equal to the maximum value.
     *
     * @return static
     */
    public function unsetHigh(): static
    {
        unset($this->attributes()['high']);
        return $this;
    }

    /**
     * This optional attribute is used to indicate the optimal numeric value. It must be within the range (as defined by the min attribute and max attribute). When used with the low and high attributes, it gives an indication where along the range is considered preferable.
     *
     * @return null|float
     */
    public function optimum(): null|float
    {
        return $this->attributes()->asFloat('optimum');
    }

    /**
     * This optional attribute is used to indicate the optimal numeric value. It must be within the range (as defined by the min attribute and max attribute). When used with the low and high attributes, it gives an indication where along the range is considered preferable.
     *
     * @param null|float $optimum
     * @return static
     */
    public function setOptimum(null|float $optimum): static
    {
        if ($optimum !== null)
            $this->attributes()['optimum'] = $optimum;
        else
            $this->unsetOptimum();
        return $this;
    }

    /**
     * This optional attribute is used to indicate the optimal numeric value. It must be within the range (as defined by the min attribute and max attribute). When used with the low and high attributes, it gives an indication where along the range is considered preferable.
     *
     * @return static
     */
    public function unsetOptimum(): static
    {
        unset($this->attributes()['optimum']);
        return $this;
    }

}
