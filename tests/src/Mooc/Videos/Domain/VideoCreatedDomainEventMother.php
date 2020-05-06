<?php

declare(strict_types = 1);

namespace CodelyTv\Tests\Mooc\Videos\Domain;

use CodelyTv\Mooc\Videos\Domain\Video;
use CodelyTv\Mooc\Videos\Domain\VideoCreatedDomainEvent;
use CodelyTv\Mooc\Videos\Domain\VideoDuration;
use CodelyTv\Mooc\Videos\Domain\VideoName;
use CodelyTv\Mooc\Shared\Domain\Video\VideoId;

final class VideoCreatedDomainEventMother
{
    public static function create(VideoId $id, VideoName $name, VideoDuration $duration): VideoCreatedDomainEvent
    {
        return new VideoCreatedDomainEvent($id->value(), $name->value(), $duration->value());
    }

    public static function fromVideo(Video $video): VideoCreatedDomainEvent
    {
        return self::create($video->id(), $video->name(), $video->duration());
    }

    public static function random(): VideoCreatedDomainEvent
    {
        return self::create(VideoIdMother::random(), VideoNameMother::random(), VideoDurationMother::random());
    }
}
