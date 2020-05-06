<?php

declare(strict_types = 1);

namespace CodelyTv\Mooc\Videos\Domain;

use CodelyTv\Mooc\Shared\Domain\Video\VideoId;
use CodelyTv\Shared\Domain\Aggregate\AggregateRoot;

final class Video extends AggregateRoot
{
    private VideoId       $id;
    private VideoName     $name;
    private VideoDuration $duration;

    public function __construct(VideoId $id, VideoName $name, VideoDuration $duration)
    {
        $this->id       = $id;
        $this->name     = $name;
        $this->duration = $duration;
    }

    public static function create(VideoId $id, VideoName $name, VideoDuration $duration): self
    {
        $Video = new self($id, $name, $duration);

        $Video->record(new VideoCreatedDomainEvent($id->value(), $name->value(), $duration->value()));

        return $Video;
    }

    public function id(): VideoId
    {
        return $this->id;
    }

    public function name(): VideoName
    {
        return $this->name;
    }

    public function duration(): VideoDuration
    {
        return $this->duration;
    }

    public function rename(VideoName $newName): void
    {
        $this->name = $newName;
    }
}
