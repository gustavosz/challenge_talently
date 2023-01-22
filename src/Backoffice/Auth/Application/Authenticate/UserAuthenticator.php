<?php

namespace Core\Backoffice\Auth\Application\Authenticate;

use Core\Backoffice\Auth\Application\Create\UserCreator;
use Core\Backoffice\Auth\Domain\AuthEmail;
use Core\Backoffice\Auth\Domain\AuthPassword;
use Core\Backoffice\Auth\Domain\AuthRepository;

class UserAuthenticator
{
    private AuthRepository $repository;

    public function __construct(AuthRepository $repository)
    {
        $this->repository = $repository;
    }

    public function __invoke(AuthEmail $email, AuthPassword $password): string
    {
        $user = $this->repository->searchByEmail($email);

        if (null === $user) {
            $userCreator = new UserCreator($this->repository);

            $user = $userCreator->__invoke($email, $password);
        }

        return $this->repository->authenticate($user)->value();
    }
}
