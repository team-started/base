<?php

use TYPO3\CMS\Core\Utility\ExtensionManagementUtility;

defined('TYPO3') || die();

ExtensionManagementUtility::addStaticFile(
    'starter_freya',
    'Configuration/TypoScript',
    'Starter Freya Theme'
);
