<?php

declare(strict_types=1);

namespace StarterTeam\StarterTwig\DataProcessing\Content;

use Psr\Log\LoggerInterface;
use PrototypeIntegration\PrototypeIntegration\Processor\PtiDataProcessor;
use StarterTeam\StarterTwig\Processor\BodyTextProcessor;
use StarterTeam\StarterTwig\Processor\CtaProcessor;
use StarterTeam\StarterTwig\Processor\HeadlineProcessor;
use TYPO3\CMS\Core\Log\LogManagerInterface;
use TYPO3\CMS\Frontend\ContentObject\ContentObjectRenderer;

/**
 * Class TextProcessor
 */
class TextProcessor implements PtiDataProcessor
{
    /**
     * @var array
     */
    protected $configuration = [];

    /**
     * @var ContentObjectRenderer
     */
    protected $contentObject;

    /**
     * @var HeadlineProcessor
     */
    protected $headlineProcessor;

    /**
     * @var BodyTextProcessor
     */
    protected $bodyTextProcessor;

    /**
     * @var CtaProcessor
     */
    protected $ctaProcessor;

    /**
     * @var LoggerInterface
     */
    protected $logger;

    public function __construct(
        ContentObjectRenderer $contentObjectRenderer,
        HeadlineProcessor $headlineProcessor,
        BodyTextProcessor $bodyTextProcessor,
        CtaProcessor $ctaProcessor,
        LogManagerInterface $logManager
    ) {
        $this->contentObject = $contentObjectRenderer;
        $this->headlineProcessor = $headlineProcessor;
        $this->bodyTextProcessor = $bodyTextProcessor;
        $this->ctaProcessor = $ctaProcessor;
        $this->logger = $logManager->getLogger(self::class);
    }

    public function process(array $data, array $configuration): ?array
    {
        $this->configuration = $configuration;

        return [
            'uid' => $data['uid'],
            'CType' => str_replace('_', '-', $data['CType']),
            'header' => $this->headlineProcessor->processHeadline($data),
            'subheader' => $this->headlineProcessor->processSubLine($data),
            'overline' => $this->headlineProcessor->processOverLine($data),
            'space_before_class' => $data['space_before_class'],
            'space_after_class' => $data['space_after_class'],
            'bodytext' =>  $this->bodyTextProcessor->processBodyText($data),
            'tx_starter_cta' => $this->ctaProcessor->processCta($data),
            'tx_starter_visibility' => $data['tx_starter_visibility'],
            'tx_starter_backgroundcolor' => $data['tx_starter_backgroundcolor'],
            'tx_starter_background_fluid' => (bool) $data['tx_starter_background_fluid'],
            'tx_starter_container' => $data['tx_starter_width'],
        ];
    }

    /**
     * @deprecated since 4.0.0 and would be remove in 5.0.0
     */
    protected function getHeader(array $data): array
    {
        return [
            'headline' => $this->headlineProcessor->processHeadline($data),
            'subline' => $this->headlineProcessor->processSubLine($data),
        ];
    }
}
