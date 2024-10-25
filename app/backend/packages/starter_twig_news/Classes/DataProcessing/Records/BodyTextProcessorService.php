<?php

declare(strict_types=1);

namespace StarterTeam\StarterTwigNews\DataProcessing\Records;

use Override;
use GeorgRinger\News\Domain\Model\News;
use PrototypeIntegration\PrototypeIntegration\Processor\RichtextProcessor;

class BodyTextProcessorService implements NewsProcessorInterface
{
    private readonly RichtextProcessor $richTextProcessor;

    public function __construct(RichtextProcessor $richTextProcessor)
    {
        $this->richTextProcessor = $richTextProcessor;
    }

    #[Override]
    public function canHandle(string $processStatement): bool
    {
        return $processStatement === 'bodyText';
    }

    /**
     * @return mixed
     */
    #[Override]
    public function render(News $newsRecord, array $configuration = [], array $processorConfiguration = []): mixed
    {
        return $this->richTextProcessor->processRteText($newsRecord->getBodytext());
    }
}
