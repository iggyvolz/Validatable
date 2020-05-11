<?php

declare(strict_types=1);

namespace iggyvolz\ClassProperties\Validation;

//<<PhpAttribute>>
class LengthBetween extends Validation
{
    private int $min;
    private int $max;
    public function __construct(int $min, int $max)
    {
        $this->min = $min;
        $this->max = $max;
        parent::__construct($min, $max);
    }
    public function verify(string $class, string $property, $value): void
    {
        if (!is_string($value)) {
            throw new ValidationException("Non-string value was passed on $class:$property");
        }
        $len = strlen($value);
        if ($this->min > $len) {
            if($len === 0) {
                throw new ValidationException(
                    "Empty string passed on $class:$property"
                );
            } else {
                throw new ValidationException(
                    "Length of '$value' is shorter than {$this->min} characters on $class:$property"
                );
            }
        }
        if ($this->max < $len) {
            throw new ValidationException(
                "Length of '$value' is longer than {$this->max} characters on $class:$property"
            );
        }
    }
}
