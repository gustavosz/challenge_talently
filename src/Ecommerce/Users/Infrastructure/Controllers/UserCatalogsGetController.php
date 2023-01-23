<?php

namespace Core\Ecommerce\Users\Infrastructure\Controllers;

use Core\Ecommerce\Users\Application\FindCatalog\FindCatalogCommand;
use Core\Shared\Domain\Bus\Command\CommandBus;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class UserCatalogsGetController
{
    private CommandBus $bus;

    public function __construct(CommandBus $bus)
    {
        $this->bus = $bus;
    }

    public function __invoke(Request $request): JsonResponse
    {
        $filter = $request->get('filter');

        $command = new FindCatalogCommand($filter);

        $this->bus->dispatch($command);

        return new JsonResponse(['data' => $command->catalogs()], Response::HTTP_OK);
    }
}
