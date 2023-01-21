<?php

namespace Core\Backoffice\Auth\Domain;

use Core\Shared\Domain\ValueObjects\StringValueObject;

final class AuthPassword extends StringValueObject
{
    public function isEquals(AuthPassword $other): bool
    {
        return $this->value() === $other->value();
    }
}
