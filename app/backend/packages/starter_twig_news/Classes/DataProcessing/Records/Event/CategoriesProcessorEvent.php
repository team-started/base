<?php

declare(strict_types=1);

namespace StarterTeam\StarterTwigNews\DataProcessing\Records\Event;

use GeorgRinger\News\Domain\Model\News;
use StarterTeam\StarterTwigNews\DataProcessing\Records\CategoriesProcessorService;

final class CategoriesProcessorEvent
{
    private readonly News $newsRecord;

    public function __construct(private readonly CategoriesProcessorService $processorService, News $newsRecord, private array $renderedItemData, private readonly array $configuration, private readonly array $processorConfiguration)
    {
        $this->newsRecord = $newsRecord;
    }

    public function getProcessorService(): CategoriesProcessorService
    {
        return $this->processorService;
    }

    public function getNewsRecord(): News
    {
        return $this->newsRecord;
    }

    public function getRenderedItemData(): array
    {
        return $this->renderedItemData;
    }

    public function setRenderedItemData(array $itemData): void
    {
        $this->renderedItemData = $itemData;
    }

    public function getConfiguration(): array
    {
        return $this->configuration;
    }

    public function getProcessorConfiguration(): array
    {
        return $this->processorConfiguration;
    }
}
