<?php

namespace Apps\Ecommerce\backend\providers;

use Core\Backoffice\Auth\Domain\AuthRepository;
use Core\Backoffice\Auth\Infrastructure\Persistence\Eloquent\AuthUserEloquentRepository;
use Illuminate\Support\ServiceProvider;

class AuthUserServiceProvider extends ServiceProvider
{
    public function register()
    {
        $this->app->bind(
            AuthRepository::class,
            AuthUserEloquentRepository::class
        );
    }
}
