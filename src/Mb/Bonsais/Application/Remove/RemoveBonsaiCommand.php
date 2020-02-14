<?php

declare(strict_types=1);

namespace MyBonsaiApi\Mb\Bonsais\Application\Remove;

use MyBonsaiApi\Shared\Domain\Bus\Command\Command;

final class RemoveBonsaiCommand implements Command
{
    private $id;

    public function __construct(string $id)
    {
        $this->id    = $id;
    }

    public function id(): string
    {
        return $this->id;
    }
}
