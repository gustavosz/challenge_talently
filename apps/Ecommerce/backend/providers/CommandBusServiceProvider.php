<?php

namespace Apps\Ecommerce\backend\providers;

use Core\Backoffice\Auth\Application\Authenticate\AuthenticateUserCommand;
use Core\Backoffice\Auth\Application\Authenticate\AuthenticateUserCommandHandler;
use Core\Ecommerce\Users\Application\FindCatalog\FindCatalogCommand;
use Core\Ecommerce\Users\Application\FindCatalog\FindCatalogCommandHandler;
use Core\Shared\Domain\Bus\Command\CommandBus;
use Core\Shared\Infrastructure\Bus\Command\IlluminateCommandBus;
use Illuminate\Support\ServiceProvider;

class CommandBusServiceProvider extends ServiceProvider
{
    public function register()
    {
        $this->app->singleton(CommandBus::class, IlluminateCommandBus::class);

        $bus = $this->app->make(CommandBus::class);
        $bus->map([
            AuthenticateUserCommand::class => AuthenticateUserCommandHandler::class,
            FindCatalogCommand::class => FindCatalogCommandHandler::class,
        ]);
    }
}
