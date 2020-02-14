<?php

declare(strict_types=1);

namespace MyBonsaiApi\Mb\Bonsais\Application\Create;

use MyBonsaiApi\Mb\Bonsais\Domain\Bonsai;
use MyBonsaiApi\Mb\Bonsais\Domain\BonsaiType;
use MyBonsaiApi\Mb\Bonsais\Domain\BonsaiName;
use MyBonsaiApi\Mb\Bonsais\Domain\BonsaiRepository;
use MyBonsaiApi\Mb\Bonsais\Domain\BonsaiYears;
use MyBonsaiApi\Mb\Shared\Domain\Bonsai\BonsaiId;
use MyBonsaiApi\Shared\Domain\Bus\Event\EventBus;

final class BonsaiCreator
{
    private $repository;
    private $bus;

    public function __construct(BonsaiRepository $repository, EventBus $bus)
    {
        $this->repository = $repository;
        $this->bus        = $bus;
    }

    public function __invoke(BonsaiId $id, BonsaiName $name, BonsaiType $type, BonsaiYears $years)
    {
        $bonsai = Bonsai::create($id, $name, $type, $years);

        $this->repository->save($bonsai);
        $this->bus->publish(...$bonsai->pullDomainEvents());
    }
}
