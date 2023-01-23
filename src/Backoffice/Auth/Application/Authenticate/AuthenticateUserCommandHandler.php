<?php

namespace Core\Backoffice\Auth\Application\Authenticate;

use Core\Backoffice\Auth\Domain\AuthEmail;
use Core\Backoffice\Auth\Domain\AuthPassword;

class AuthenticateUserCommandHandler
{
    private UserAuthenticator $authenticator;

    public function __construct(UserAuthenticator $authenticator)
    {
        $this->authenticator = $authenticator;
    }

    public function __invoke(AuthenticateUserCommand $command): void
    {
        $email = new AuthEmail($command->email());
        $password = new AuthPassword($command->password());

        $token = $this->authenticator->__invoke($email, $password);

        $command->setToken($token);
    }
}
