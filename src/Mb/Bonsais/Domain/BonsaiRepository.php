<?php

declare(strict_types = 1);

namespace MyBonsaiApi\Mb\Bonsais\Domain;

use MyBonsaiApi\Mb\Shared\Domain\Bonsai\BonsaiId;

interface BonsaiRepository
{
    public function save(Bonsai $bonsai): void;

    public function search(BonsaiId $id): ?Bonsai;

    public function remove(Bonsai $bonsai): void;
}
