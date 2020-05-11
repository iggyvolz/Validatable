<?php

declare(strict_types=1);

namespace iggyvolz\ClassProperties\Validation;

//<<PhpAttribute>>
class MinLength extends LengthBetween
{
    public function __construct(int $min)
    {
        parent::__construct($min, PHP_INT_MAX);
    }
}
