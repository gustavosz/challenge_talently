<?php

namespace Core\Shared\Domain\Bus\Command;

interface CommandBus
{
    public function dispatch($command): void;

    public function map(array $map): void;
}
