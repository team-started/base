<?php

declare(strict_types=1);

namespace StarterTeam\StarterTwig\DataProcessing\Page;

use TYPO3\CMS\Core\Context\Context;
use TYPO3\CMS\Core\TypoScript\TypoScriptService;
use TYPO3\CMS\Frontend\ContentObject\ContentObjectRenderer;

/**
 * Class AbstractPageProcessor
 */
abstract class AbstractPageProcessor
{
    protected array $conf = [];

    protected ContentObjectRenderer $cObj;

    protected TypoScriptService $typoScriptService;

    protected Context $context;

    public function __construct(
        ContentObjectRenderer $cObj,
        TypoScriptService $typoScriptService,
        Context $context
    ) {
        $this->cObj = $cObj;
        $this->typoScriptService = $typoScriptService;
        $this->context = $context;
    }

    public function setContentObjectRenderer(ContentObjectRenderer $cObj): void
    {
        $this->cObj = $cObj;
    }
}
