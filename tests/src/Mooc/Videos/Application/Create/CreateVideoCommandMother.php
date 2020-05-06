<?php

declare(strict_types = 1);

namespace CodelyTv\Tests\Mooc\Videos\Application\Create;

use CodelyTv\Mooc\Videos\Application\Create\CreateVideoCommand;
use CodelyTv\Mooc\Videos\Domain\VideoDuration;
use CodelyTv\Mooc\Videos\Domain\VideoName;
use CodelyTv\Mooc\Shared\Domain\Video\VideoId;
use CodelyTv\Tests\Mooc\Videos\Domain\VideoDurationMother;
use CodelyTv\Tests\Mooc\Videos\Domain\VideoIdMother;
use CodelyTv\Tests\Mooc\Videos\Domain\VideoNameMother;

final class CreateVideoCommandMother
{
    public static function create(VideoId $id, VideoName $name, VideoDuration $duration): CreateVideoCommand
    {
        return new CreateVideoCommand($id->value(), $name->value(), $duration->value());
    }

    public static function random(): CreateVideoCommand
    {
        return self::create(VideoIdMother::random(), VideoNameMother::random(), VideoDurationMother::random());
    }
}
