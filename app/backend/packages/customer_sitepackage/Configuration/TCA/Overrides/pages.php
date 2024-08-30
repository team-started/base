<?php

use TYPO3\CMS\Core\Utility\ExtensionManagementUtility;

defined('TYPO3') || die();

ExtensionManagementUtility::registerPageTSConfigFile(
    'customer_sitepackage',
    'Configuration/TSConfig/PageTs.typoscript',
    'PageTs CustomerSitepackage'
);
