<?php

declare(strict_types=1);

namespace iggyvolz\ClassProperties\Validation\tests;

use iggyvolz\ClassProperties\Validation\examples\TestClass;
use iggyvolz\ClassProperties\Validation\ValidationException;
use PHPUnit\Framework\TestCase;

class MinLengthTest extends TestCase
{
    public function testSuccess(): void
    {
        $instance = new TestClass();
        $instance->minLength = "abc";
        $this->assertSame("abc", $instance->minLength);
    }
    public function testError(): void
    {
        $instance = new TestClass();
        $this->expectException(ValidationException::class);
        $this->expectExceptionMessage("Length of 'ab' is shorter than 3 characters on ".TestClass::class.":minLength");
        $instance->minLength = "ab";
    }
    public function testNonStringError():void
    {
        $instance = new TestClass();
        $this->expectException(ValidationException::class);
        $this->expectExceptionMessage("Non-string value was passed on ".TestClass::class.":minLength");
        $instance->minLength = [];
    }
}
