<?php

declare(strict_types = 1);

namespace CodelyTv\Mooc\Videos\Domain;

use CodelyTv\Mooc\Shared\Domain\Video\VideoId;

interface VideoRepository
{
    public function save(Video $Video): void;

    public function search(VideoId $id): ?Video;

    public function last(): ?Video;
}
