<?php

defined('TYPO3') or die();

(function () {
    \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addStaticFile(
        'sitepackage_nessa',
        'Configuration/TypoScript/',
        'SitePackage Nessa Demo'
    );
})();
