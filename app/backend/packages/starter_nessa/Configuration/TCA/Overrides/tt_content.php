<?php

use StarterTeam\StarterNessa\Configuration;
use TYPO3\CMS\Core\Utility\ArrayUtility;

defined('TYPO3') || die();

(function () {
    // add content element type icons
    foreach (Configuration::getContentElements() as $ceId => $properties) {
        ArrayUtility::mergeRecursiveWithOverrule(
            $GLOBALS['TCA']['tt_content'],
            [
                'ctrl' => [
                    'typeicon_classes' => [
                        $ceId => $properties['typeIconClass'],
                    ],
                ],
            ]
        );
    }
})();
