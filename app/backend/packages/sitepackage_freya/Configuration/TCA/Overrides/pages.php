<?php

use TYPO3\CMS\Core\Utility\ExtensionManagementUtility;

defined('TYPO3') || die();

ExtensionManagementUtility::registerPageTSConfigFile(
    'sitepackage_freya',
    'Configuration/TSConfig/PageTs.typoscript',
    'Sitepackage Freya Demo'
);
