<?php

namespace Core\Backoffice\Auth\Domain;

class AuthUser
{
    private AuthId $id;
    private AuthEmail $email;
    private AuthPassword $password;
    private AuthToken $token;

    public function __construct(AuthId $id, AuthEmail $email, AuthPassword $password)
    {
        $this->id = $id;
        $this->email = $email;
        $this->password = $password;

    }

    public static function create(AuthId $id, AuthEmail $email, AuthPassword $password): self
    {
        return new self($id, $email, $password);
    }

    public function id(): AuthId
    {
        return $this->id;
    }

    public function email(): AuthEmail
    {
        return $this->email;
    }

    public function password(): AuthPassword
    {
        return $this->password;
    }

    public function token(): AuthToken
    {
        return $this->token;
    }

    public function setToken(AuthToken $token): void
    {
        $this->token = $token;
    }
}
