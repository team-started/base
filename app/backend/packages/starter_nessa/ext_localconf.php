<?php

use TYPO3\CMS\Core\Utility\ExtensionManagementUtility;
use TYPO3\CMS\Core\Utility\GeneralUtility;
use TYPO3\CMS\Core\Imaging\IconRegistry;
use StarterTeam\StarterNessa\Configuration;
use TYPO3\CMS\Core\Imaging\IconProvider\SvgIconProvider;
use TYPO3\CMS\Core\Imaging\IconProvider\BitmapIconProvider;
use StarterTeam\StarterNessa\Updates\CtaFieldMigration;
use StarterTeam\StarterNessa\Updates\CeDownloadMigration;

defined('TYPO3') || die();

(function () {
    $GLOBALS['TYPO3_CONF_VARS']['RTE']['Presets']['nessa'] = 'EXT:starter_nessa/Configuration/RTE/Nessa.yaml';
    $GLOBALS['TYPO3_CONF_VARS']['RTE']['Presets']['nessa-minimal'] = 'EXT:starter_nessa/Configuration/RTE/NessaMinimal.yaml';
    $GLOBALS['TYPO3_CONF_VARS']['RTE']['Presets']['nessa-headlines'] = 'EXT:starter_nessa/Configuration/RTE/NessaHeadlines.yaml';
    $GLOBALS['TYPO3_CONF_VARS']['SYS']['fluid']['namespaces']['starterteam'][] = 'StarterTeam\StarterNessa\ViewHelpers';

    if (TYPO3_MODE === 'BE') {
        // Add default UserTSConfig
        ExtensionManagementUtility::addUserTSConfig(
            "@import 'EXT:starter_nessa/Configuration/TSConfig/User/Default.typoscript'"
        );

        $iconRegistry = GeneralUtility::makeInstance(
            IconRegistry::class
        );

        foreach (Configuration::getContentElements() as $property) {
            $iconRegistry->registerIcon(
                $property['typeIconClass'],
                SvgIconProvider::class,
                ['source' => $property['typeIconPath']]
            );
        }

        foreach (Configuration::getContentElementTables() as $property) {
            $iconRegistry->registerIcon(
                $property['typeIconClass'],
                BitmapIconProvider::class,
                ['source' => $property['typeIconPath']]
            );
        }
    }
})();
