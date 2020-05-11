<?php

declare(strict_types=1);

namespace iggyvolz\ClassProperties\Validation\tests;

use iggyvolz\ClassProperties\Validation\examples\TestClass;
use iggyvolz\ClassProperties\Validation\ValidationException;
use PHPUnit\Framework\TestCase;

class MaxIntTest extends TestCase
{
    public function testSuccess(): void
    {
        $instance = new TestClass();
        $instance->maxInt = -7;
        $this->assertSame(-7, $instance->maxInt);
    }
    public function testUpperBoundSuccess(): void
    {
        $instance = new TestClass();
        $instance->maxInt = -1;
        $this->assertSame(-1, $instance->maxInt);
    }
    public function testLowerBoundError(): void
    {
        $instance = new TestClass();
        $this->expectException(ValidationException::class);
        $this->expectExceptionMessage("0 is greater than -1 on ".TestClass::class.":maxInt");
        $instance->maxInt = 0;
    }
    public function testError(): void
    {
        $instance = new TestClass();
        $this->expectException(ValidationException::class);
        $this->expectExceptionMessage("7 is greater than -1 on ".TestClass::class.":maxInt");
        $instance->maxInt = 7;
    }
}
