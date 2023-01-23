<?php

namespace Core\Backoffice\Auth\Domain;

use Core\Shared\Domain\ValueObjects\StringValueObject;
use InvalidArgumentException;

class AuthToken extends StringValueObject
{
    public function __construct(string $value)
    {
        parent::__construct($value);

        $this->ensureIsValidToken($value);
    }

    private function ensureIsValidToken(string $value): void
    {
        if (empty($value)) {
            throw new InvalidArgumentException('The token is empty');
        }
    }
}
