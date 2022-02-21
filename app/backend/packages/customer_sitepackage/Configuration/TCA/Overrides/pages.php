<?php

defined('TYPO3') || die();

\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::registerPageTSConfigFile(
    'customer_sitepackage',
    'Configuration/TSConfig/PageTs.typoscript',
    'PageTs CustomerSitepackage'
);
