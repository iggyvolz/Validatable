<?php

declare(strict_types=1);

namespace iggyvolz\ClassProperties\Validation\tests;

use iggyvolz\ClassProperties\Validation\examples\TestClass;
use iggyvolz\ClassProperties\Validation\ValidationException;
use PHPUnit\Framework\TestCase;

class MaxLengthTest extends TestCase
{
    public function testSuccess(): void
    {
        $instance = new TestClass();
        $instance->maxLength = "abcdefgh";
        $this->assertSame("abcdefgh", $instance->maxLength);
    }
    public function testError(): void
    {
        $instance = new TestClass();
        $this->expectException(ValidationException::class);
        $this->expectExceptionMessage("Length of 'abcdefghi' is longer than 8 characters on ".TestClass::class.":maxLength");
        $instance->maxLength = "abcdefghi";
    }
}
