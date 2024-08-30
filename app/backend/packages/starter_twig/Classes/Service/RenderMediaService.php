<?php

declare(strict_types=1);

namespace StarterTeam\StarterTwig\Service;

use UnexpectedValueException;
use PrototypeIntegration\PrototypeIntegration\Processor\MediaProcessor;
use TYPO3\CMS\Core\Resource\FileInterface;

class RenderMediaService
{
    protected MediaProcessor $mediaProcessor;

    public function __construct(MediaProcessor $mediaProcessor)
    {
        $this->mediaProcessor = $mediaProcessor;
    }

    public function processMedia(array $contentRow, string $table, string $relationField, array $imageConfiguration = [], array $thumbnailConfiguration = []): array
    {
        try {
            return $this->mediaProcessor->renderMedia(
                $contentRow,
                $table,
                $relationField,
                $imageConfiguration,
                $thumbnailConfiguration
            );
        } catch (UnexpectedValueException $invalidArgumentException) {
            trigger_error($invalidArgumentException->getMessage(), E_USER_WARNING);
        }

        return [];
    }

    public function processMediaElement(FileInterface $file, array $imageConfiguration = [], array $thumbnailConfiguration = []): ?array
    {
        try {
            return $this->mediaProcessor->renderMediaElement(
                $file,
                $imageConfiguration,
                $thumbnailConfiguration
            );
        } catch (UnexpectedValueException $invalidArgumentException) {
            trigger_error($invalidArgumentException->getMessage(), E_USER_WARNING);
        }

        return [];
    }
}
