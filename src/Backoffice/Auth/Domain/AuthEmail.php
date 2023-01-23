<?php

namespace Core\Backoffice\Auth\Domain;

use Core\Shared\Domain\ValueObjects\StringValueObject;
use InvalidArgumentException;

final class AuthEmail extends StringValueObject
{
    public function __construct(string $value)
    {
        parent::__construct($value);

        $this->ensureIsValidEmail($value);
    }

    private function ensureIsValidEmail(string $value): void
    {
        if (!filter_var($value, FILTER_VALIDATE_EMAIL)) {
            throw new InvalidArgumentException(
                sprintf(
                    '"%s" is not a valid email address',
                    $value
                )
            );
        }
    }
}
