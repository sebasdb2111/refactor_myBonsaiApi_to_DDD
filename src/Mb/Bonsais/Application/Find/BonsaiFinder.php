<?php

declare(strict_types = 1);

namespace MyBonsaiApi\Mb\Bonsais\Application\Find;

use MyBonsaiApi\Mb\Bonsais\Domain\Bonsai;
use MyBonsaiApi\Mb\Bonsais\Domain\BonsaiNotExist;
use MyBonsaiApi\Mb\Bonsais\Domain\BonsaiRepository;
use MyBonsaiApi\Mb\Shared\Domain\Bonsai\BonsaiId;

final class BonsaiFinder
{
    private $repository;

    public function __construct(BonsaiRepository $repository)
    {
        $this->repository = $repository;
    }

    public function __invoke(BonsaiId $id): Bonsai
    {
        $bonsai = $this->repository->search($id);

        if (null === $bonsai) {
            throw new BonsaiNotExist($id);
        }

        return $bonsai;
    }
}
