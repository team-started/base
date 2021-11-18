<?php

defined('TYPO3_MODE') || die();

foreach (['default', 'minimal', 'link' ] as $variant) {
    $GLOBALS['TYPO3_CONF_VARS']['RTE']['Presets']['starter-sitepackage-' . $variant]
        = 'EXT:starter_sitepackage/Configuration/RTE/StarterSitepackage' . ucfirst($variant) . '.yaml';
}
