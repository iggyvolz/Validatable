<?php

declare(strict_types=1);

namespace iggyvolz\ClassProperties\Validation;

//<<PhpAttribute>>
class MaxLength extends LengthBetween
{
    public function __construct(int $max)
    {
        parent::__construct(PHP_INT_MIN, $max);
    }
}
