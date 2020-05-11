<?php

declare(strict_types=1);

namespace iggyvolz\ClassProperties\Validation\tests;

use iggyvolz\ClassProperties\Validation\examples\TestClass;
use iggyvolz\ClassProperties\Validation\ValidationException;
use PHPUnit\Framework\TestCase;

class MaxFloatTest extends TestCase
{
    public function testSuccess(): void
    {
        $instance = new TestClass();
        $val = 0.0;
        $instance->maxFloat = $val;
        $this->assertSame($val, $instance->maxFloat);
    }
    public function testUpperBoundSuccess(): void
    {
        $instance = new TestClass();
        $val = 0.4;
        $instance->maxFloat = $val;
        $this->assertSame($val, $instance->maxFloat);
    }
    public function testLowerBoundError(): void
    {
        $instance = new TestClass();
        $val = 0.6;
        $this->expectException(ValidationException::class);
        $this->expectExceptionMessage("0.6 is greater than 0.5 on ".TestClass::class.":maxFloat");
        $instance->maxFloat = $val;
    }
    public function testError(): void
    {
        $instance = new TestClass();
        $this->expectException(ValidationException::class);
        $this->expectExceptionMessage("1 is greater than 0.5 on ".TestClass::class.":maxFloat");
        $instance->maxFloat = 1;
    }
    public function testStringError():void
    {
        $instance = new TestClass();
        $this->expectException(ValidationException::class);
        $this->expectExceptionMessage("Non-numeric value was passed on ".TestClass::class.":maxFloat");
        $instance->maxFloat = "1";
    }
    public function testArrayError():void
    {
        $instance = new TestClass();
        $this->expectException(ValidationException::class);
        $this->expectExceptionMessage("Non-numeric value was passed on ".TestClass::class.":maxFloat");
        $instance->maxFloat = [];
    }
    public function testObjectError():void
    {
        $instance = new TestClass();
        $this->expectException(ValidationException::class);
        $this->expectExceptionMessage("Non-numeric value was passed on ".TestClass::class.":maxFloat");
        $instance->maxFloat = new \stdClass();
    }
    public function testBoolError():void
    {
        $instance = new TestClass();
        $this->expectException(ValidationException::class);
        $this->expectExceptionMessage("Non-numeric value was passed on ".TestClass::class.":maxFloat");
        $instance->maxFloat = true;
    }
}
