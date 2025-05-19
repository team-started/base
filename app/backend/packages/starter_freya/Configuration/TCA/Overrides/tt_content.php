<?php

use TYPO3\CMS\Core\Utility\ArrayUtility;

defined('TYPO3') || die();

(function () {
    $translateFile = 'LLL:EXT:starter_freya/Resources/Private/Language/locallang_be.xlf:';

    ArrayUtility::mergeRecursiveWithOverrule(
        $GLOBALS['TCA']['tt_content']['columns'],
        [
            'tx_starter_visibility' => [
                'config' => [
                    'items' => [
                        ['label' => '', 'value' => ''],
                        ['label' => $translateFile . 'tx_starter_visibility.I.visibility-off', 'value' => '--div--'],
                        ['label' => $translateFile . 'breakpoints.small', 'value' => 'd-sm-from'],
                        ['label' => $translateFile . 'breakpoints.medium', 'value' => 'd-md-from'],
                        ['label' => $translateFile . 'breakpoints.large', 'value' => 'd-lg-from'],
                        ['label' => $translateFile . 'breakpoints.xlarge', 'value' => 'd-xl-from'],
                        ['label' => $translateFile . 'breakpoints.xxlarge', 'value' => 'd-xxl-from'],
                        ['label' => $translateFile . 'tx_starter_visibility.I.visibility-only-up', 'value' => '--div--'],
                        ['label' => $translateFile . 'breakpoints.xsmall', 'value' => 'd-xs-only'],
                        ['label' => $translateFile . 'breakpoints.small', 'value' => 'd-sm-only'],
                        ['label' => $translateFile . 'breakpoints.medium', 'value' => 'd-md-only'],
                        ['label' => $translateFile . 'breakpoints.large', 'value' => 'd-lg-only'],
                        ['label' => $translateFile . 'breakpoints.xlarge', 'value' => 'd-xl-only'],
                        ['label' => $translateFile . 'breakpoints.xxlarge', 'value' => 'd-xxl-only'],
                        ['label' => $translateFile . 'tx_starter_visibility.I.visibility-until', 'value' => '--div--'],
                        ['label' => $translateFile . 'breakpoints.small', 'value' => 'd-sm-none'],
                        ['label' => $translateFile . 'breakpoints.medium', 'value' => 'd-md-none'],
                        ['label' => $translateFile . 'breakpoints.large', 'value' => 'd-lg-none'],
                        ['label' => $translateFile . 'breakpoints.xlarge', 'value' => 'd-xl-none'],
                        ['label' => $translateFile . 'breakpoints.xxlarge', 'value' => 'd-xxl-none'],
                    ],
                ],
            ],
        ]
    );
})();
