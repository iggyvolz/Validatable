<?php

declare(strict_types=1);

namespace iggyvolz\ClassProperties\Validation\tests;

use iggyvolz\ClassProperties\Validation\examples\TestClass;
use iggyvolz\ClassProperties\Validation\ValidationException;
use PHPUnit\Framework\TestCase;

class MatchesRegexTest extends TestCase
{
    public function testSuccess(): void
    {
        $instance = new TestClass();
        $instance->screaming = "aa";
        $this->assertSame("aa", $instance->screaming);
    }
    public function testFailure(): void
    {
        $instance = new TestClass();
        $this->expectException(ValidationException::class);
        $this->expectExceptionMessage("ab did not match the required pattern on ".TestClass::class.":screaming");
        $instance->screaming = "ab";
    }
    public function testNonStringFailure(): void
    {
        $instance = new TestClass();
        $this->expectException(ValidationException::class);
        $this->expectExceptionMessage("Non-string value was passed on ".TestClass::class.":screaming");
        $instance->screaming = [];
    }
}
