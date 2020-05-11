<?php

declare(strict_types=1);

namespace iggyvolz\ClassProperties\Validation;

//<<PhpAttribute>>
class Min extends Between
{
    public function __construct(float $min)
    {
        parent::__construct($min, PHP_INT_MAX);
    }
}
