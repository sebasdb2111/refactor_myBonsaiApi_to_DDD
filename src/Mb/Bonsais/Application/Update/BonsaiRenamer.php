<?php

declare(strict_types = 1);

namespace MyBonsaiApi\Mb\Bonsais\Application\Update;

use MyBonsaiApi\Mb\Bonsais\Application\Find\BonsaiFinder;
use MyBonsaiApi\Mb\Bonsais\Domain\BonsaiName;
use MyBonsaiApi\Mb\Bonsais\Domain\BonsaiRepository;
use MyBonsaiApi\Mb\Shared\Domain\Bonsai\BonsaiId;
use MyBonsaiApi\Shared\Domain\Bus\Event\EventBus;

final class BonsaiRenamer
{
    private $repository;
    private $finder;
    private $bus;

    public function __construct(BonsaiRepository $repository, EventBus $bus)
    {
        $this->repository = $repository;
        $this->finder     = new BonsaiFinder($repository);
        $this->bus        = $bus;
    }

    public function __invoke(BonsaiId $id, BonsaiName $newName): void
    {
        $bonsai = $this->finder->__invoke($id);

        $bonsai->rename($newName);

        $this->repository->save($bonsai);
        $this->bus->publish(...$bonsai->pullDomainEvents());
    }
}
