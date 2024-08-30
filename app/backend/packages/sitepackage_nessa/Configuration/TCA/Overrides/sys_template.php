<?php

use TYPO3\CMS\Core\Utility\ExtensionManagementUtility;

defined('TYPO3') || die();

(function () {
    ExtensionManagementUtility::addStaticFile(
        'sitepackage_nessa',
        'Configuration/TypoScript/',
        'SitePackage Nessa Demo'
    );
})();
