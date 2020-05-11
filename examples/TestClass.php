<?php

declare(strict_types=1);

namespace iggyvolz\ClassProperties\Validation\examples;

use iggyvolz\ClassProperties\Attributes\Property;
use iggyvolz\ClassProperties\ClassProperties;
use iggyvolz\ClassProperties\Validation\MatchesRegex;
use iggyvolz\ClassProperties\Validation\Max;
use iggyvolz\ClassProperties\Validation\MaxLength;
use iggyvolz\ClassProperties\Validation\Min;
use iggyvolz\ClassProperties\Validation\MinLength;
use iggyvolz\ClassProperties\Validation\NotEmpty;
use iggyvolz\ClassProperties\Validation\OneOf;

/**
 * @property int $minInt
 * @property int $maxInt
 * @property float $minFloat
 * @property float $maxFloat
 * @property string $notEmpty
 * @property string $maxLength
 * @property string $minLength
 * @property int $anEvenNumberLessThanTen
 * @property string $screaming
 */
class TestClass extends ClassProperties
{
    // <<Property>>
    // <<Min(0)>>
    protected int $minInt = 0;
    // <<Property>>
    // <<Max(-1)>>
    protected int $maxInt = -1;
    // <<Property>>
    // <<Min(0.5)>>
    protected float $minFloat = 1;
    // <<Property>>
    // <<Max(0.5)>>
    protected float $maxFloat = 0;
    // <<Property>>
    // <<NotEmpty>>
    protected string $notEmpty = "_";
    // <<Property>>
    // <<MaxLength(8)>>
    protected string $maxLength = "";
    // <<Property>>
    // <<MinLength(3)>>
    protected string $minLength = "abc";
    // <<Property>>
    // <<OneOf(0,2,4,6,8)>>
    protected int $anEvenNumberLessThanTen = 0;
    // <<Property>>
    // <<MatchesRegex("/^a+$/")>>
    protected string $screaming = "aaa";
}

(new Property)->addToProperty(TestClass::class, "minInt");
(new Min(0))->addToProperty(TestClass::class, "minInt");
(new Property)->addToProperty(TestClass::class, "maxInt");
(new Max(-1))->addToProperty(TestClass::class, "maxInt");
(new Property)->addToProperty(TestClass::class, "minFloat");
(new Min(0.5))->addToProperty(TestClass::class, "minFloat");
(new Property)->addToProperty(TestClass::class, "maxFloat");
(new Max(0.5))->addToProperty(TestClass::class, "maxFloat");
(new Property)->addToProperty(TestClass::class, "notEmpty");
(new NotEmpty)->addToProperty(TestClass::class, "notEmpty");
(new Property)->addToProperty(TestClass::class, "maxLength");
(new MaxLength(8))->addToProperty(TestClass::class, "maxLength");
(new Property)->addToProperty(TestClass::class, "minLength");
(new MinLength(3))->addToProperty(TestClass::class, "minLength");
(new Property)->addToProperty(TestClass::class, "anEvenNumberLessThanTen");
(new OneOf(0,2,4,6,8))->addToProperty(TestClass::class, "anEvenNumberLessThanTen");
(new Property)->addToProperty(TestClass::class, "screaming");
(new MatchesRegex("/^a+$/"))->addToProperty(TestClass::class, "screaming");