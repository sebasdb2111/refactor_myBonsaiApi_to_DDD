<?php

declare(strict_types = 1);

namespace MyBonsaiApi\Mb\Bonsais\Domain;

use MyBonsaiApi\Mb\Shared\Domain\Bonsai\BonsaiId;
use MyBonsaiApi\Shared\Domain\DomainError;

final class BonsaiNotExist extends DomainError
{
    private $id;

    public function __construct(BonsaiId $id)
    {
        $this->id = $id;

        parent::__construct();
    }

    public function errorCode(): string
    {
        return 'bonsai_not_exist';
    }

    protected function errorMessage(): string
    {
        return sprintf('The bonsai <%s> does not exist', $this->id->value());
    }
}
