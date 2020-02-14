<?php

declare(strict_types = 1);

namespace MyBonsaiApi\Mb\Bonsais\Infrastructure\Persistence;

use MyBonsaiApi\Mb\Bonsais\Domain\Bonsai;
use MyBonsaiApi\Mb\Bonsais\Domain\BonsaiRepository;
use MyBonsaiApi\Mb\Shared\Domain\Bonsai\BonsaiId;
use MyBonsaiApi\Shared\Infrastructure\Persistence\Doctrine\DoctrineRepository;

final class DoctrineBonsaiRepository extends DoctrineRepository implements BonsaiRepository
{
    public function save(Bonsai $bonsai): void
    {
        $this->persist($bonsai);
    }

    public function search(BonsaiId $id): ?Bonsai
    {
        return $this->repository(Bonsai::class)->find($id);
    }

    public function remove(Bonsai $bonsai): void
    {
        $this->remove($bonsai);
    }
}
