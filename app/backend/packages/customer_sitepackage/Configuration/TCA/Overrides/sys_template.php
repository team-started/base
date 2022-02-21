<?php

defined('TYPO3') or die();

(function () {
    \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addStaticFile(
        'customer_sitepackage',
        'Configuration/TypoScript/',
        'StarterTeam - SitePackage'
    );
})();
