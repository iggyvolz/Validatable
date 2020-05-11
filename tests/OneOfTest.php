<?php

declare(strict_types=1);

namespace iggyvolz\ClassProperties\Validation\tests;

use iggyvolz\ClassProperties\Validation\examples\TestClass;
use iggyvolz\ClassProperties\Validation\ValidationException;
use PHPUnit\Framework\TestCase;

class OneOfTest extends TestCase
{
    public function testSuccess(): void
    {
        $instance = new TestClass();
        $instance->anEvenNumberLessThanTen = 6;
        $this->assertSame(6, $instance->anEvenNumberLessThanTen);
    }
    public function testFailure(): void
    {
        $instance = new TestClass();
        $this->expectException(ValidationException::class);
        $this->expectExceptionMessage("7 is not in list of allowed values on ".TestClass::class.":anEvenNumberLessThanTen");
        $instance->anEvenNumberLessThanTen = 7;
    }
}
