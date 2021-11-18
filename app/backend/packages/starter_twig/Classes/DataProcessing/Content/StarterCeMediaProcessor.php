<?php

declare(strict_types=1);
namespace StarterTeam\StarterTwig\DataProcessing\Content;

use PrototypeIntegration\PrototypeIntegration\Processor\MediaProcessor;
use PrototypeIntegration\PrototypeIntegration\Processor\PtiDataProcessor;
use PrototypeIntegration\PrototypeIntegration\Processor\TypoLinkStringProcessor;
use StarterTeam\StarterTwig\Processor\HeadlineProcessor;
use TYPO3\CMS\Core\Log\LogManagerInterface;
use TYPO3\CMS\Frontend\ContentObject\ContentObjectRenderer;

/**
 * Class StarterCeMediaProcessor
 */
class StarterCeMediaProcessor implements PtiDataProcessor
{
    /**
     * @var array
     */
    protected $configuration;

    /**
     * @var ContentObjectRenderer
     */
    protected $contentObject;

    /**
     * @var HeadlineProcessor
     */
    protected $headlineProcessor;

    /**
     * @var MediaProcessor
     */
    protected $mediaProcessor;

    /**
     * @var TypoLinkStringProcessor
     */
    protected $typoLinkProcessor;

    /**
     * @var \Psr\Log\LoggerInterface
     */
    protected $logger;

    public function __construct(
        ContentObjectRenderer $contentObjectRenderer,
        HeadlineProcessor $headlineProcessor,
        MediaProcessor $mediaProcessor,
        TypoLinkStringProcessor $typoLinkStringProcessor,
        LogManagerInterface $logManager
    ) {
        $this->contentObject = $contentObjectRenderer;
        $this->headlineProcessor = $headlineProcessor;
        $this->mediaProcessor = $mediaProcessor;
        $this->typoLinkProcessor = $typoLinkStringProcessor;
        $this->logger = $logManager->getLogger(__CLASS__);
    }

    public function process(array $data, array $configuration): ?array
    {
        $this->configuration = $configuration;

        $twigData = [
            'uid' => $data['uid'],
            'header' => $this->getHeader($data),
            'space_before_class' => $data['space_before_class'],
            'space_after_class' => $data['space_after_class'],
            'columns' => [
                'small' => $this->getColumnValue($data['imagecols']),
                'medium' => $this->getColumnValue($data['tx_starter_imagecols_medium']),
                'large' => $this->getColumnValue($data['tx_starter_imagecols_large']),
            ],
            'items' => $this->renderGalleryItems($data),
        ];

        return $twigData;
    }

    /**
     * @param array $data
     * @return array
     */
    protected function getHeader(array $data): array
    {
        $header = [
            'headline' => $this->headlineProcessor->processHeadline($data),
            'subline' => $this->headlineProcessor->processSubLine($data),
        ];

        return $header;
    }

    /**
     * @param array $data
     * @return array
     */
    protected function renderGalleryItems(array $data): array
    {
        $resultMedia = [];
        $mediaElements = $this->mediaProcessor->renderMedia(
            $data,
            'tt_content',
            'assets',
            $this->configuration['imageConfig']
        );

        foreach ($mediaElements as $index => $mediaElement) {
            if (isset($mediaElement['image']['metaData']['link']) &&
                !empty($mediaElement['image']['metaData']['link'])
            ) {
                $mediaElement['image']['metaData']['link'] =
                    $this->typoLinkProcessor->processTypoLinkString($mediaElement['image']['metaData']['link']);
            }

            if ($mediaElement['type'] == 'image') {
                $resultMedia[$index]['image'] = $mediaElement['image'];
                $resultMedia[$index]['image']['uid'] = $mediaElement['uid'];
            } else {
                $resultMedia[$index]['video'] = $mediaElement['video'];
                $resultMedia[$index]['video']['uid'] = $mediaElement['uid'];
            }
        }

        return $resultMedia;
    }

    /**
     * @param $value
     * @return float|int|string
     */
    protected function getColumnValue($value)
    {
        if (empty($value)) {
            return 'inherit';
        }

        return (int)(12 / (int)$value);
    }
}
