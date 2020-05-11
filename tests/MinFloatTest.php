<?php

declare(strict_types=1);

namespace iggyvolz\ClassProperties\Validation\tests;

use iggyvolz\ClassProperties\Validation\examples\TestClass;
use iggyvolz\ClassProperties\Validation\ValidationException;
use PHPUnit\Framework\TestCase;

class MinFloatTest extends TestCase
{
    public function testSuccess(): void
    {
        $instance = new TestClass();
        $val = 1.0;
        $instance->minFloat = $val;
        $this->assertSame($val, $instance->minFloat);
    }
    public function testLowerBoundSuccess(): void
    {
        $instance = new TestClass();
        $val = 0.6;
        $instance->minFloat = $val;
        $this->assertSame($val, $instance->minFloat);
    }
    public function testUpperBoundError(): void
    {
        $instance = new TestClass();
        $val = 0.4;
        $this->expectException(ValidationException::class);
        $this->expectExceptionMessage("0.4 is less than 0.5 on ".TestClass::class.":minFloat");
        $instance->minFloat = $val;
    }
    public function testError(): void
    {
        $instance = new TestClass();
        $this->expectException(ValidationException::class);
        $this->expectExceptionMessage("0 is less than 0.5 on ".TestClass::class.":minFloat");
        $instance->minFloat = 0;
    }
}
