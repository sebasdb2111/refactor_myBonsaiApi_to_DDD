<?php

declare(strict_types=1);

namespace MyBonsaiApi\Mb\Bonsais\Application\Create;

use MyBonsaiApi\Shared\Domain\Bus\Command\Command;

final class CreateBonsaiCommand implements Command
{
    private $id;
    private $name;
    private $type;
    private $years;

    public function __construct(string $id, string $name, string $type, int $years)
    {
        $this->id    = $id;
        $this->name  = $name;
        $this->type  = $type;
        $this->years = $years;
    }

    public function id(): string
    {
        return $this->id;
    }

    public function name(): string
    {
        return $this->name;
    }

    public function type(): string
    {
        return $this->type;
    }

    public function years(): int
    {
        return $this->years;
    }
}
