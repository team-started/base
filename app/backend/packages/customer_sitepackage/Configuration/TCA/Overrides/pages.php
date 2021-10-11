<?php
defined('TYPO3_MODE') || die();

\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::registerPageTSConfigFile(
    'customer_sitepackage',
    'Configuration/TSConfig/PageTs.typoscript',
    'PageTs CustomerSitepackage'
);
