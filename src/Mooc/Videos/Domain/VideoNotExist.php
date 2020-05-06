<?php

declare(strict_types = 1);

namespace CodelyTv\Mooc\Videos\Domain;

use CodelyTv\Mooc\Shared\Domain\Video\VideoId;
use CodelyTv\Shared\Domain\DomainError;

final class VideoNotExist extends DomainError
{
    private VideoId $id;

    public function __construct(VideoId $id)
    {
        $this->id = $id;

        parent::__construct();
    }

    public function errorCode(): string
    {
        return 'video_not_exist';
    }

    protected function errorMessage(): string
    {
        return sprintf('The video <%s> does not exist', $this->id->value());
    }
}
