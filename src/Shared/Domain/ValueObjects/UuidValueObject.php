<?php

namespace Core\Shared\Domain\ValueObjects;

use InvalidArgumentException;
use Ramsey\Uuid\Uuid;

class UuidValueObject
{
    private string $value;

    public function __construct(string $value)
    {
        $this->value = $value;

        $this->ensureIsValidUuid($value);
    }

    public static function random(): self
    {
        return new self(Uuid::uuid4()->toString());
    }

    public function value(): string
    {
        return $this->value;
    }

    public function __toString(): string
    {
        return $this->value;
    }

    private function ensureIsValidUuid(string $value): void
    {
        if (!Uuid::isValid($value)) {
            throw new InvalidArgumentException(
                sprintf(
                    '"%s" is not a valid UUID.',
                    $value
                )
            );
        }
    }
}
