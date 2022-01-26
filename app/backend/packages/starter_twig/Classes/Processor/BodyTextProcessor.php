<?php

declare(strict_types=1);

namespace StarterTeam\StarterTwig\Processor;

use PrototypeIntegration\PrototypeIntegration\Processor\RichtextProcessor;

/**
 * Class BodyTextProcessor
 */
class BodyTextProcessor
{
    /**
     * @var string
     */
    const DEFAULT_DATA_FIELD_NAME = 'bodytext';

    /**
     * @var RichtextProcessor
     */
    protected $rteProcessor;

    public function __construct(RichtextProcessor $richtextProcessor)
    {
        $this->rteProcessor = $richtextProcessor;
    }

    public function processBodyText(array $data, string $dataField = self::DEFAULT_DATA_FIELD_NAME): string
    {
        if (empty($dataField)) {
            $dataField = self::DEFAULT_DATA_FIELD_NAME;
        }

        return $this->rteProcessor->processRteText($data[$dataField]);
    }

    public function processPlainBodyText(array $data, string $dataField = self::DEFAULT_DATA_FIELD_NAME): string
    {
        if (empty($dataField)) {
            $dataField = self::DEFAULT_DATA_FIELD_NAME;
        }

        return strip_tags($data[$dataField]);
    }
}
