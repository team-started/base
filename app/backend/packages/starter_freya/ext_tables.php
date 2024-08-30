<?php

use TYPO3\CMS\Core\Utility\ExtensionManagementUtility;

defined('TYPO3') || die();

(function () {
    foreach (['tt_content'] as $table) {
        ExtensionManagementUtility::addLLrefForTCAdescr(
            $table,
            'EXT:starter_freya/Resources/Private/Language/locallang_csh_' . str_replace('_', '', $table) . '.xlf'
        );
    }
})();
