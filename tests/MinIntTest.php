<?php

declare(strict_types=1);

namespace iggyvolz\ClassProperties\Validation\tests;

use iggyvolz\ClassProperties\Validation\examples\TestClass;
use iggyvolz\ClassProperties\Validation\ValidationException;
use PHPUnit\Framework\TestCase;

class MinIntTest extends TestCase
{
    public function testSuccess(): void
    {
        $instance = new TestClass();
        $instance->minInt = 7;
        $this->assertSame(7, $instance->minInt);
    }
    public function testLowerBoundSuccess(): void
    {
        $instance = new TestClass();
        $instance->minInt = 0;
        $this->assertSame(0, $instance->minInt);
    }
    public function testUpperBoundError(): void
    {
        $instance = new TestClass();
        $this->expectException(ValidationException::class);
        $this->expectExceptionMessage("-1 is less than 0 on ".TestClass::class.":minInt");
        $instance->minInt = -1;
    }
    public function testError(): void
    {
        $instance = new TestClass();
        $this->expectException(ValidationException::class);
        $this->expectExceptionMessage("-7 is less than 0 on ".TestClass::class.":minInt");
        $instance->minInt = -7;
    }
}
