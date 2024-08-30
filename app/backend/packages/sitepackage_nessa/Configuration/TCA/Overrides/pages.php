<?php

use TYPO3\CMS\Core\Utility\ExtensionManagementUtility;

defined('TYPO3') || die();

ExtensionManagementUtility::registerPageTSConfigFile(
    'sitepackage_nessa',
    'Configuration/TSConfig/PageTs.typoscript',
    'Sitepackage Nessa'
);
