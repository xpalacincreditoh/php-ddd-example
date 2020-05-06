<?php

declare(strict_types = 1);

namespace CodelyTv\Mooc\Videos\Infrastructure\Persistence;

use CodelyTv\Mooc\Videos\Domain\Video;
use CodelyTv\Mooc\Videos\Domain\VideoRepository;
use CodelyTv\Mooc\Shared\Domain\Video\VideoId;

final class FileVideoRepository implements VideoRepository
{
    private const FILE_PATH = __DIR__ . '/videos';

    public function save(Video $video): void
    {
        file_put_contents($this->fileName($video->id()->value()), serialize($video));
    }

    public function search(VideoId $id): ?Video
    {
        return file_exists($this->fileName($id->value()))
            ? unserialize(file_get_contents($this->fileName($id->value())))
            : null;
    }

    private function fileName(string $id): string
    {
        return sprintf('%s.%s.repo', self::FILE_PATH, $id);
    }

    public function last(): ?Video
    {
        // TODO to implement
        return null;
    }
}
