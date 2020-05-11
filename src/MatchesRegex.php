<?php

declare(strict_types=1);

namespace iggyvolz\ClassProperties\Validation;

//<<PhpAttribute>>
class MatchesRegex extends Validation
{
    /**
     * @var string Regex that this is required to match
     */
    private $regex;
    public function __construct(string $regex)
    {
        $this->regex = $regex;
        parent::__construct($regex);
    }
    public function verify(string $class, string $property, $value): void
    {
        if (!is_string($value)) {
            throw new ValidationException("Non-string value was passed on $class:$property");
        }
        if (!preg_match($this->regex, $value)) {
            throw new ValidationException(
                "$value did not match the required pattern on $class:$property"
            );
        }
    }
}
