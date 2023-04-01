<?php
declare(strict_types=1);
namespace StarterTeam\StarterTwig\DataProcessing\Page;

use PrototypeIntegration\PrototypeIntegration\Processor\PtiDataProcessor;
use TYPO3\CMS\Core\Context\Context;
use TYPO3\CMS\Core\TypoScript\TypoScriptService;
use TYPO3\CMS\Frontend\ContentObject\ContentObjectRenderer;

/**
 * Class BreadcrumbDataProcessor
 */
class BreadcrumbDataProcessor implements PtiDataProcessor
{
    use MenuProcessorTrait;

    protected ContentObjectRenderer $cObj;
    protected TypoScriptService $typoScriptService;

    public function __construct(
        ContentObjectRenderer $contentObjectRenderer,
        TypoScriptService $typoScriptService
    ) {
        $this->cObj = $contentObjectRenderer;
        $this->typoScriptService = $typoScriptService;
    }

    public function process(array $data, array $configuration): ?array
    {
        $pageData = $this->getTsfe()->page;
        if (! $pageData['tx_starter_breadcrumb']) {
            return [];
        }

        $menuSettings = $this->typoScriptService->convertPlainArrayToTypoScriptArray($configuration);

        $result = [
            'items' => $this->getMenuFromCms($menuSettings, $this->cObj)
        ];

        return $result;
    }

    /**
     * @return mixed|\TYPO3\CMS\Frontend\Controller\TypoScriptFrontendController
     * @SuppressWarnings(PHPMD.Superglobals)
     */
    protected function getTsfe()
    {
        return $GLOBALS['TSFE'];
    }
}
