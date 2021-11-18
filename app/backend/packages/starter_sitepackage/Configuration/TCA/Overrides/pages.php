<?php

defined('TYPO3_MODE') || die();

\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::registerPageTSConfigFile(
    'starter_sitepackage',
    'Configuration/TSConfig/PageTs.typoscript',
    'PageTs StarterSitepackage'
);
