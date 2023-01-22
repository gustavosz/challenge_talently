<?php

namespace Core\Backoffice\Auth\Application\Authenticate;

use Core\Backoffice\Auth\Domain\AuthEmail;
use Core\Backoffice\Auth\Domain\AuthId;
use Core\Backoffice\Auth\Domain\AuthPassword;
use Core\Backoffice\Auth\Domain\AuthRepository;
use Core\Backoffice\Auth\Domain\AuthUser;

class UserAuthenticator
{
    private AuthRepository $repository;

    public function __construct(AuthRepository $repository)
    {
        $this->repository = $repository;
    }

    public function __invoke(AuthEmail $email, AuthPassword $password): string
    {
        $auth = $this->repository->searchByEmail($email);

        if (null === $auth) {
            $uuid = AuthId::random();

            $auth = AuthUser::create(new AuthId($uuid), $email, $password);

            $this->repository->save($auth);
        }

        $token = $this->repository->authenticate($auth);

        $auth->setToken($token);

        return $token->value();
    }
}
