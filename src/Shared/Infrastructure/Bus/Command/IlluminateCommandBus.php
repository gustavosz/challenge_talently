<?php

namespace Core\Shared\Infrastructure\Bus\Command;

use Core\Shared\Domain\Bus\Command\CommandBus;
use Illuminate\Bus\Dispatcher;

class IlluminateCommandBus implements CommandBus
{
    private Dispatcher $bus;

    public function __construct(Dispatcher $bus)
    {
        $this->bus = $bus;
    }

    public function dispatch($command): void
    {
        $this->bus->dispatch($command);
    }

    public function map(array $map): void
    {
        $this->bus->map($map);
    }
}
