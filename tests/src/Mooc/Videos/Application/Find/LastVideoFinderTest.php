<?php

declare(strict_types = 1);

namespace CodelyTv\Tests\Mooc\Videos\Application\Find;

use CodelyTv\Mooc\Videos\Application\Find\LastVideoFinder;
use CodelyTv\Tests\Mooc\Videos\VideosModuleUnitTestCase;
use CodelyTv\Tests\Mooc\Videos\Domain\VideoMother;

final class LastVideoFinderTest extends VideosModuleUnitTestCase
{
    private $lastVideoFinder;

    protected function setUp(): void
    {
        parent::setUp();

        $this->lastVideoFinder = new LastVideoFinder($this->repository());
    }

    /** @test */
    public function it_should_find_last_video(): void
    {
        $video = VideoMother::random();

        $this->shouldLast($video);
        $this->shouldSave($video);
        $this->shouldNotPublishDomainEvent();

        $this->lastVideoFinder->__invoke();
    }
}
