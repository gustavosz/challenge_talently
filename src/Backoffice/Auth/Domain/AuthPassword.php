<?php

namespace Core\Backoffice\Auth\Domain;

use Core\Shared\Domain\ValueObjects\StringValueObject;

final class AuthPassword extends StringValueObject
{
    public function hashPassword(): void
    {
        $this->setValue(bcrypt($this->value()));
    }
}
