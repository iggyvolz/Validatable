<?php

declare(strict_types=1);

namespace iggyvolz\ClassProperties\Validation\tests;

use iggyvolz\ClassProperties\Validation\examples\TestClass;
use iggyvolz\ClassProperties\Validation\ValidationException;
use PHPUnit\Framework\TestCase;

class NotEmptyTest extends TestCase
{
    public function testSuccess(): void
    {
        $instance = new TestClass();
        $instance->notEmpty = "abc";
        $this->assertSame("abc", $instance->notEmpty);
    }
    public function testError(): void
    {
        $instance = new TestClass();
        $this->expectException(ValidationException::class);
        $this->expectExceptionMessage("Empty string passed on ".TestClass::class.":notEmpty");
        $instance->notEmpty = "";
    }
}
