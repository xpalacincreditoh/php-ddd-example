<?php

declare(strict_types = 1);

namespace CodelyTv\Mooc\Videos\Application\Create;

use CodelyTv\Mooc\Videos\Domain\Video;
use CodelyTv\Mooc\Videos\Domain\VideoDuration;
use CodelyTv\Mooc\Videos\Domain\VideoName;
use CodelyTv\Mooc\Videos\Domain\VideoRepository;
use CodelyTv\Mooc\Shared\Domain\Video\VideoId;
use CodelyTv\Shared\Domain\Bus\Event\EventBus;

final class VideoCreator
{
    private VideoRepository $repository;
    private EventBus         $bus;

    public function __construct(VideoRepository $repository, EventBus $bus)
    {
        $this->repository = $repository;
        $this->bus        = $bus;
    }

    public function __invoke(VideoId $id, VideoName $name, VideoDuration $duration): void
    {
        $video = Video::create($id, $name, $duration);

        $this->repository->save($video);
        $this->bus->publish(...$video->pullDomainEvents());
    }
}
