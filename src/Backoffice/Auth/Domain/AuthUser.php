<?php

namespace Core\Backoffice\Auth\Domain;

class AuthUser
{
    private AuthEmail $email;
    private AuthPassword $password;

    public function __construct(AuthEmail $email, AuthPassword $password)
    {
        $this->email = $email;
        $this->password = $password;
    }

    public function passwordMatches(AuthPassword $password): bool
    {
        return $this->password->isEquals($password);
    }

    public function email(): AuthEmail
    {
        return $this->email;
    }
}
