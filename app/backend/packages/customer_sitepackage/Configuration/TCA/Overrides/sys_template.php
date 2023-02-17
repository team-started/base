<?php

defined('TYPO3') || die();

(function () {
    \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addStaticFile(
        'customer_sitepackage',
        'Configuration/TypoScript/',
        'StarterTeam - SitePackage'
    );
})();
