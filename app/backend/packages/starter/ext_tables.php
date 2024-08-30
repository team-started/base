<?php

use TYPO3\CMS\Core\Utility\ExtensionManagementUtility;
use Psr\Http\Message\ServerRequestInterface;
use TYPO3\CMS\Core\Http\ApplicationType;

defined('TYPO3') || die();

(function () {
    foreach (['carousel_element', 'accordion_element', 'tab_element'] as $table) {
    }

    foreach (['tt_content'] as $table) {
        ExtensionManagementUtility::addLLrefForTCAdescr(
            $table,
            'EXT:starter/Resources/Private/Language/locallang_csh_' . str_replace('_', '', $table) . '.xlf'
        );
    }

    if (($GLOBALS['TYPO3_REQUEST'] ?? null) instanceof ServerRequestInterface
        && ApplicationType::fromRequest($GLOBALS['TYPO3_REQUEST'])->isBackend()
    ) {
        $GLOBALS['TBE_STYLES']['skins']['starter'] = [
            'name' => 'starter',
            'stylesheetDirectories' => [
                'css' => 'EXT:starter/Resources/Public/Backend/Css/',
            ],
        ];
    }
})();
