<?php

declare(strict_types = 1);

namespace MyBonsaiApi\Mb\Bonsais\Infrastructure\Persistence\Doctrine;

use MyBonsaiApi\Mb\Shared\Domain\Bonsai\BonsaiId;
use MyBonsaiApi\Shared\Infrastructure\Persistence\Doctrine\UuidType;

final class BonsaiIdType extends UuidType
{
    public static function customTypeName(): string
    {
        return 'bonsai_id';
    }

    protected function typeClassName(): string
    {
        return BonsaiId::class;
    }
}
