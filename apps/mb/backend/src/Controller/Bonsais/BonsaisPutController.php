<?php

declare(strict_types=1);

namespace MyBonsaiApi\Apps\Mb\Backend\Controller\Bonsais;

use MyBonsaiApi\Mb\Bonsais\Application\Create\CreateBonsaiCommand;
use MyBonsaiApi\Shared\Domain\Bus\Command\CommandBus;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

final class BonsaisPutController
{
    private $bus;

    public function __construct(CommandBus $bus)
    {
        $this->bus = $bus;
    }

    public function __invoke(string $id, Request $request)
    {
        $this->bus->dispatch(
            new CreateBonsaiCommand(
                $id,
                $request->request->get('name'),
                $request->request->get('type'),
                (int)$request->request->get('years')
            )
        );

        return new Response('', Response::HTTP_CREATED);
    }
}
