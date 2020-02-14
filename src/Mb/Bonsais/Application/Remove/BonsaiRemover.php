<?php

declare(strict_types=1);

namespace MyBonsaiApi\Mb\Bonsais\Application\Remove;

use MyBonsaiApi\Mb\Bonsais\Application\Find\BonsaiFinder;
use MyBonsaiApi\Mb\Bonsais\Domain\Bonsai;
use MyBonsaiApi\Mb\Bonsais\Domain\BonsaiRepository;
use MyBonsaiApi\Mb\Shared\Domain\Bonsai\BonsaiId;
use MyBonsaiApi\Shared\Domain\Bus\Event\EventBus;

final class BonsaiRemover
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

    public function __invoke(BonsaiId $id)
    {
        $bonsai = $this->finder->__invoke($id);

        $bonsai::remove($bonsai->id(), $bonsai->name(), $bonsai->type(), $bonsai->years());

        $this->repository->remove($bonsai);
        $this->bus->publish(...$bonsai->pullDomainEvents());
    }
}
