<?php

declare(strict_types = 1);

namespace CodelyTv\Tests\Mooc\Videos\Domain;

use CodelyTv\Mooc\Shared\Domain\Video\VideoId;
use CodelyTv\Tests\Shared\Domain\UuidMother;

final class VideoIdMother
{
    public static function create(string $value): VideoId
    {
        return new VideoId($value);
    }

    public static function creator(): callable
    {
        return static fn() => self::random();
    }

    public static function random(): VideoId
    {
        return self::create(UuidMother::random());
    }
}
