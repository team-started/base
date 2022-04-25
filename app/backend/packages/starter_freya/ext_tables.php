<?php

defined('TYPO3') || die();

(function () {
    foreach (['tt_content'] as $table) {
        \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addLLrefForTCAdescr(
            $table,
            'EXT:starter_freya/Resources/Private/Language/locallang_csh_' . str_replace('_', '', $table) . '.xlf'
        );
    }
})();
