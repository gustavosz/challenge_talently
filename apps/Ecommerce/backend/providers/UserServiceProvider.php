<?php

namespace Apps\Ecommerce\backend\providers;

use Illuminate\Support\ServiceProvider;
use Core\Ecommerce\Users\Domain\UserRepository;
use Core\Ecommerce\Users\Infrastructure\Persistence\Eloquent\UserEloquentRepository;

class UserServiceProvider extends ServiceProvider
{
    public function register()
    {
        $this->app->bind(
            UserRepository::class,
            UserEloquentRepository::class
        );
    }
}
