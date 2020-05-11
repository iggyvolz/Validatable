<?php

declare(strict_types=1);

namespace iggyvolz\ClassProperties\Validation;

//<<PhpAttribute>>
/**
 * Ensures that a value is between two values, inclusive
 * @package iggyvolz\ClassProperties\Validation
 */
class Between extends Validation
{
    /**
     * @var float|int
     */
    private /* int|float */ $min;
    /**
     * @var float|int
     */
    private /* int|float */ $max;

    /**
     * Between constructor.
     * @param int|float $min
     * @param int|float $max
     */
    public function __construct(/* int|float */ $min, /* int|float */ $max)
    {
        $this->min = $min;
        $this->max = $max;
        parent::__construct($min, $max);
    }
    public function verify(string $class, string $property, $value): void
    {
        if (!is_int($value) && !is_float($value)) {
            throw new ValidationException("Non-numeric value was passed on $class:$property");
        }
        if ($this->min > $value) {
            throw new ValidationException("$value is less than {$this->min} on $class:$property");
        }
        if ($this->max < $value) {
            throw new ValidationException("$value is greater than {$this->max} on $class:$property");
        }
    }
}
