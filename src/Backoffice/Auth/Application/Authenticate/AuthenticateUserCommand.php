<?php

namespace Core\Backoffice\Auth\Application\Authenticate;

class AuthenticateUserCommand
{
    private string $email;
    private string $password;
    private string $token;

    public function __construct(string $email, string $password)
    {
        $this->email = $email;
        $this->password = $password;
    }

    public function email(): string
    {
        return $this->email;
    }

    public function password(): string
    {
        return $this->password;
    }

    public function token(): string
    {
        return $this->token;
    }

    public function setToken(string $value): void
    {
        $this->token = $value;
    }
}
