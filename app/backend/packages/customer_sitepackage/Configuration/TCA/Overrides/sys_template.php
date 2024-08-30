<?php

use TYPO3\CMS\Core\Utility\ExtensionManagementUtility;

defined('TYPO3') || die();

(function () {
    ExtensionManagementUtility::addStaticFile(
        'customer_sitepackage',
        'Configuration/TypoScript/',
        'StarterTeam - SitePackage'
    );
})();
