<?php

declare(strict_types=1);

namespace MyBonsaiApi\Apps\Mb\Backend\Controller\Bonsais;

use MyBonsaiApi\Mb\Bonsais\Application\Remove\RemoveBonsaiCommand;
use MyBonsaiApi\Shared\Domain\Bus\Command\CommandBus;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

final class BonsaisDeleteController
{
    private $bus;

    public function __construct(CommandBus $bus)
    {
        $this->bus = $bus;
    }

    public function __invoke(string $id, Request $request)
    {
        $this->bus->dispatch(
            new RemoveBonsaiCommand(
                $id
            )
        );

        return new Response('', Response::HTTP_CREATED);
    }
}
