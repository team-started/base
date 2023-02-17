<?php

use TYPO3\CMS\Core\Utility\ExtensionManagementUtility;

defined('TYPO3') || die();

(function () {
    ExtensionManagementUtility::addStaticFile(
        'sitepackage_freya',
        'Configuration/TypoScript/',
        'SitePackage Freya Demo'
    );
})();
