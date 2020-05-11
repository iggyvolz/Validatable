<?php

declare(strict_types=1);

namespace iggyvolz\ClassProperties\Validation;

use iggyvolz\ClassProperties\ClassProperties;
use iggyvolz\ClassProperties\Hooks\PreSet;
use iggyvolz\virtualattributes\VirtualAttribute;

abstract class Validation extends VirtualAttribute implements PreSet
{
    /**
     * Verify that a value meets validation requirements
     * @param string $class Class that the validation is called on
     * @param string $property Property that the validation is called on
     * @param mixed $value Value that is passed into this property
     * @throws ValidationException
     * @return void
     */
    abstract public function verify(string $class, string $property, $value): void;


    public function runPreSetHook(ClassProperties $target, string $property, &$value): void
    {
        $this->verify(get_class($target), $property, $value);
    }
}
