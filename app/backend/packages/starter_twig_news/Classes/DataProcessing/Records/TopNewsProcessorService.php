<?php

declare(strict_types=1);

namespace StarterTeam\StarterTwigNews\DataProcessing\Records;

use Override;
use GeorgRinger\News\Domain\Model\News;

class TopNewsProcessorService implements NewsProcessorInterface
{
    #[Override]
    public function canHandle(string $processStatement): bool
    {
        return $processStatement === 'isTopNews';
    }

    /**
     * @return mixed
     */
    #[Override]
    public function render(News $newsRecord, array $configuration = [], array $processorConfiguration = []): mixed
    {
        return $newsRecord->getIstopnews();
    }
}
