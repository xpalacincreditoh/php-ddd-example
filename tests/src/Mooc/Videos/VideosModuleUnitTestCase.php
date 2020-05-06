<?php

declare(strict_types = 1);

namespace CodelyTv\Tests\Mooc\Videos;

use CodelyTv\Mooc\Videos\Domain\Video;
use CodelyTv\Mooc\Videos\Domain\VideoRepository;
use CodelyTv\Mooc\Shared\Domain\Video\VideoId;
use CodelyTv\Tests\Shared\Infrastructure\PhpUnit\UnitTestCase;
use Mockery\MockInterface;

abstract class VideosModuleUnitTestCase extends UnitTestCase
{
    private $repository;

    protected function shouldSave(Video $video): void
    {
        $this->repository()
            ->shouldReceive('save')
            ->with($this->similarTo($video))
            ->once()
            ->andReturnNull();
    }

    protected function shouldSearch(VideoId $id, ?Video $video): void
    {
        $this->repository()
            ->shouldReceive('search')
            ->with($this->similarTo($id))
            ->once()
            ->andReturn($video);
    }

    protected function shouldLast(?Video $video): void
    {
        $this->repository()
            ->shouldReceive('last')
            ->once()
            ->andReturn($video);
    }

    /** @return VideoRepository|MockInterface */
    protected function repository(): MockInterface
    {
        return $this->repository = $this->repository ?: $this->mock(VideoRepository::class);
    }
}
