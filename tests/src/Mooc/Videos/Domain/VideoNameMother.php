<?php

declare(strict_types = 1);

namespace CodelyTv\Tests\Mooc\Videos\Domain;

use CodelyTv\Mooc\Videos\Domain\VideoName;
use CodelyTv\Tests\Shared\Domain\WordMother;

final class VideoNameMother
{
    public static function create(string $value): VideoName
    {
        return new VideoName($value);
    }

    public static function random(): VideoName
    {
        return self::create(WordMother::random());
    }
}
