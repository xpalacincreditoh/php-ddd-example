<?php

declare(strict_types = 1);

namespace CodelyTv\Mooc\Videos\Infrastructure\Persistence\Doctrine;

use CodelyTv\Mooc\Shared\Domain\Video\VideoId;
use CodelyTv\Shared\Infrastructure\Persistence\Doctrine\UuidType;

final class VideoIdType extends UuidType
{
    public static function customTypeName(): string
    {
        return 'video_id';
    }

    protected function typeClassName(): string
    {
        return VideoId::class;
    }
}
