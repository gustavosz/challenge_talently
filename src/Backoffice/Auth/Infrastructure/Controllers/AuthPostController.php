<?php

namespace Core\Backoffice\Auth\Infrastructure\Controllers;

use App\Http\Controllers\Controller;
use Core\Backoffice\Auth\Application\Authenticate\AuthenticateUserCommand;
use Core\Shared\Domain\Bus\Command\CommandBus;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class AuthPostController extends Controller
{
    private CommandBus $bus;
    public function __construct(CommandBus $bus)
    {
        $this->bus = $bus;
    }

    public function __invoke(Request $request): JsonResponse
    {
        $command = new AuthenticateUserCommand(
            $request->request->get('email'),
            $request->request->get('password')
        );

        $this->bus->dispatch($command);

        return new JsonResponse(['token' => $command->token()], Response::HTTP_OK);
    }
}
