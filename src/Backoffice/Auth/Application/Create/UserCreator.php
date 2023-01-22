<?php

namespace Core\Backoffice\Auth\Application\Create;


use Core\Backoffice\Auth\Domain\AuthEmail;
use Core\Backoffice\Auth\Domain\AuthId;
use Core\Backoffice\Auth\Domain\AuthPassword;
use Core\Backoffice\Auth\Domain\AuthRepository;
use Core\Backoffice\Auth\Domain\AuthUser;

class UserCreator
{
    private AuthRepository $repository;

    public function __construct(AuthRepository $repository)
    {
        $this->repository = $repository;
    }

    public function __invoke(AuthEmail $email, AuthPassword $password): AuthUser
    {
        $uuid = AuthId::random();

        $auth = AuthUser::create(new AuthId($uuid), $email, $password);

        $this->repository->save($auth);

        $this->repository->sendWelcomeEmail($auth);

        return $auth;
    }
}
