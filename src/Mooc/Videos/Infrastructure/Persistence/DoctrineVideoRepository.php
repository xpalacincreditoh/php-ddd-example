<?php

declare(strict_types = 1);

namespace CodelyTv\Mooc\Videos\Infrastructure\Persistence;

use CodelyTv\Mooc\Videos\Domain\Video;
use CodelyTv\Mooc\Videos\Domain\VideoRepository;
use CodelyTv\Mooc\Shared\Domain\Video\VideoId;
use CodelyTv\Shared\Infrastructure\Persistence\Doctrine\DoctrineRepository;

final class DoctrineVideoRepository extends DoctrineRepository implements VideoRepository
{
    public function save(Video $video): void
    {
        $this->persist($video);
    }

    public function search(VideoId $id): ?Video
    {
        return $this->repository(Video::class)->find($id);
    }

    public function last(): ?Video
    {
        return $this->repository(Video::class)
            ->findOneBy(
                array('id' => 'DESC')
            );

            /*->setMaxResults(1)
            ->orderBy('id', 'DESC')
            ->getQuery()
            ->getSingleResult();*/
    }
}
