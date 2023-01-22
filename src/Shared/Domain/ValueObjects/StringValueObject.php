<?php

namespace Core\Shared\Domain\ValueObjects;

abstract class StringValueObject
{
    private string $value;

    public function __construct(string $value)
    {
        $this->value = $value;
    }

    public function value(): string
    {
        return $this->value;
    }

    public function __toString(): string
    {
        return $this->value;
    }

    public function setValue($value): void
    {
        $this->value = $value;
    }
}
