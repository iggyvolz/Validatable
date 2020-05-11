<?php

declare(strict_types=1);

namespace iggyvolz\ClassProperties\Validation;

//<<PhpAttribute>>
class NotEmpty extends MinLength
{
    public function __construct()
    {
        parent::__construct(1);
    }
}
