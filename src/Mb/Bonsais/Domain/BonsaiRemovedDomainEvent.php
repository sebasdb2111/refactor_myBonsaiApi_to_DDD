<?php

declare(strict_types=1);

namespace MyBonsaiApi\Mb\Bonsais\Domain;

use MyBonsaiApi\Shared\Domain\Bus\Event\DomainEvent;

final class BonsaiRemovedDomainEvent extends DomainEvent
{
    private $name;
    private $type;
    private $years;

    public function __construct(
        string $id,
        string $name,
        string $type,
        int $years,
        string $eventId = null,
        string $occurredOn = null
    ) {
        parent::__construct($id, $eventId, $occurredOn);

        $this->name  = $name;
        $this->type  = $type;
        $this->years = $years;
    }

    public static function eventName(): string
    {
        return 'bonsai.removed';
    }

    public function toPrimitives(): array
    {
        return [
            'name'  => $this->name,
            'type'  => $this->type,
            'years' => $this->years,
        ];
    }

    public static function fromPrimitives(
        string $aggregateId,
        array $body,
        string $eventId,
        string $occurredOn
    ): DomainEvent {
        return new self($aggregateId, $body['name'], $body['type'], $body['years'], $eventId, $occurredOn);
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
