<?php

declare(strict_types = 1);

namespace CodelyTv\Shared\Domain\Bus\Event;

use CodelyTv\Shared\Domain\Utils;
use CodelyTv\Shared\Domain\ValueObject\Uuid;
use DateTimeImmutable;

abstract class DomainEvent
{
    private string $aggregateId;
    private string $eventId;
    private string $occurredOn;

    public function __construct(string $aggregateId, string $eventId = null, string $occurredOn = null)
    {
        $this->aggregateId = $aggregateId;
        $this->eventId     = $eventId ?: Uuid::random()->value();
        $this->occurredOn  = $occurredOn ?: Utils::dateToString(new DateTimeImmutable());
    }

    abstract public function toPrimitives(): array;

    abstract public static function fromPrimitives(
        string $aggregateId,
        array $body,
        string $eventId,
        string $occurredOn
    ): self;

    abstract public static function eventName(): string;

    public function aggregateId(): string
    {
        return $this->aggregateId;
    }

    public function eventId(): string
    {
        return $this->eventId;
    }

    public function occurredOn(): string
    {
        return $this->occurredOn;
    }
}
