<?php

declare(strict_types=1);

namespace iggyvolz\ClassProperties\Validation;

//<<PhpAttribute>>
class OneOf extends Validation
{
    /**
     * @var mixed[] Potential values
     */
    private array $args;

    /**
     * @param mixed ...$args
     */
    public function __construct(/* mixed */ ...$args)
    {
        $this->args = $args;
        parent::__construct(...$args);
    }
    public function verify(string $class, string $property, $value): void
    {
        if (!in_array($value, $this->args, true)) {
            throw new ValidationException("$value is not in list of allowed values on $class:$property");
        }
    }
}
