<?php

declare(strict_types = 1);

namespace CodelyTv\Tests\Mooc\Videos\Domain;

use CodelyTv\Mooc\Videos\Application\Create\CreateVideoCommand;
use CodelyTv\Mooc\Videos\Domain\Video;
use CodelyTv\Mooc\Videos\Domain\VideoDuration;
use CodelyTv\Mooc\Videos\Domain\VideoName;
use CodelyTv\Mooc\Shared\Domain\Video\VideoId;

final class VideoMother
{
    public static function create(VideoId $id, VideoName $name, VideoDuration $duration): Video
    {
        return new Video($id, $name, $duration);
    }

    public static function fromRequest(CreateVideoCommand $request): Video
    {
        return self::create(
            VideoIdMother::create($request->id()),
            VideoNameMother::create($request->name()),
            VideoDurationMother::create($request->duration())
        );
    }

    public static function random(): Video
    {
        return self::create(VideoIdMother::random(), VideoNameMother::random(), VideoDurationMother::random());
    }
}
