<?php

namespace Core\Backoffice\Auth\Infrastructure\Persistence\Eloquent;

use Core\Backoffice\Auth\Domain\AuthEmail;
use Core\Backoffice\Auth\Domain\AuthId;
use Core\Backoffice\Auth\Domain\AuthPassword;
use Core\Backoffice\Auth\Domain\AuthRepository;
use Core\Backoffice\Auth\Domain\AuthToken;
use Core\Backoffice\Auth\Domain\AuthUser;
use Tymon\JWTAuth\Facades\JWTAuth;

class AuthUserEloquentRepository implements AuthRepository
{

    public function search(AuthId $id): ?AuthUser
    {
        $model = AuthUserEloquentModel::find($id->value());

        if (null === $model) {
            return null;
        }

        return new AuthUser(
            new AuthId($model->id),
            new AuthEmail($model->email),
            new AuthPassword($model->password),
        );
    }

    public function save(AuthUser $auth): void
    {
        $auth->password()->hashPassword();

        $model           = new AuthUserEloquentModel();
        $model->id       = $auth->id()->value();
        $model->email    = $auth->email()->value();
        $model->password = $auth->password()->value();

        $model->save();
    }

    public function authenticate(AuthUser $auth): AuthToken
    {
        $model = AuthUserEloquentModel::find($auth->id()->value());

        $token = JWTAuth::fromUser($model);

        return new AuthToken($token);
    }

    public function searchByEmail(AuthEmail $email): ?AuthUser
    {
        $model = AuthUserEloquentModel::where('email', $email->value())->first();

        if (null === $model) {
            return null;
        }

        return new AuthUser(
            new AuthId($model->id),
            new AuthEmail($model->email),
            new AuthPassword($model->password),
        );
    }
}
