<?php

declare(strict_types=1);

namespace MyBonsaiApi\Mb\Bonsais\Domain;

use MyBonsaiApi\Mb\Shared\Domain\Bonsai\BonsaiId;
use MyBonsaiApi\Shared\Domain\Aggregate\AggregateRoot;

final class Bonsai extends AggregateRoot
{
    private $id;
    private $name;
    private $type;
    private $years;

    public function __construct(BonsaiId $id, BonsaiName $name, BonsaiType $type, BonsaiYears $years)
    {
        $this->id    = $id;
        $this->name  = $name;
        $this->type  = $type;
        $this->years = $years;
    }

    public static function create(BonsaiId $id, BonsaiName $name, BonsaiType $type, BonsaiYears $years): self
    {
        $bonsai = new self($id, $name, $type, $years);

        $bonsai->record(new BonsaiCreatedDomainEvent($id->value(), $name->value(), $type->value(), $years->value()));

        return $bonsai;
    }

    public static function remove(BonsaiId $id, BonsaiName $name, BonsaiType $type, BonsaiYears $years): self
    {
        $bonsai = new self($id, $name, $type, $years);

        $bonsai->record(new BonsaiRemovedDomainEvent($id->value(), $name->value(), $type->value(), $years->value()));

        return $bonsai;
    }

    public function id(): BonsaiId
    {
        return $this->id;
    }

    public function name(): BonsaiName
    {
        return $this->name;
    }

    public function type(): BonsaiType
    {
        return $this->type;
    }

    public function years(): BonsaiYears
    {
        return $this->years;
    }

    public function rename(BonsaiName $newName): void
    {
        $this->name = $newName;
    }
}
