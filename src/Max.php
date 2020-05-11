<?php

declare(strict_types=1);

namespace iggyvolz\ClassProperties\Validation;

//<<PhpAttribute>>
class Max extends Between
{
    public function __construct(float $max)
    {
        parent::__construct(PHP_INT_MIN, $max);
    }
}
