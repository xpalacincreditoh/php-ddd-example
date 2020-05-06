<?php

declare(strict_types = 1);

namespace CodelyTv\Mooc\Videos\Application\Create;

use CodelyTv\Mooc\Videos\Domain\VideoDuration;
use CodelyTv\Mooc\Videos\Domain\VideoName;
use CodelyTv\Mooc\Shared\Domain\Video\VideoId;
use CodelyTv\Shared\Domain\Bus\Command\CommandHandler;

final class CreateVideoCommandHandler implements CommandHandler
{
    private VideoCreator $creator;

    public function __construct(VideoCreator $creator)
    {
        $this->creator = $creator;
    }

    public function __invoke(CreateVideoCommand $command): void
    {
        $id       = new VideoId($command->id());
        $name     = new VideoName($command->name());
        $duration = new VideoDuration($command->duration());

        $this->creator->__invoke($id, $name, $duration);
    }
}
