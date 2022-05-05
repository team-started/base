<?php

defined('TYPO3') || die();

(function () {
    $translateFile = 'LLL:EXT:starter_freya/Resources/Private/Language/locallang_be.xlf:';

    \TYPO3\CMS\Core\Utility\ArrayUtility::mergeRecursiveWithOverrule(
        $GLOBALS['TCA']['tt_content']['columns'],
        [
            'tx_starter_visibility' => [
                'config' => [
                    'items' => [
                        ['', ''],
                        [$translateFile . 'tx_starter_visibility.I.visibility-off', '--div--'],
                        [$translateFile . 'breakpoints.small', 'd-sm-from'],
                        [$translateFile . 'breakpoints.medium','d-md-from'],
                        [$translateFile . 'breakpoints.large', 'd-lg-from'],
                        [$translateFile . 'breakpoints.xlarge','d-xl-from'],
                        [$translateFile . 'breakpoints.xxlarge', 'd-xxl-from'],
                        [$translateFile . 'tx_starter_visibility.I.visibility-only-up', '--div--'],
                        [$translateFile . 'breakpoints.xsmall', 'd-xs-only'],
                        [$translateFile . 'breakpoints.small', 'd-sm-only'],
                        [$translateFile . 'breakpoints.medium', 'd-md-only'],
                        [$translateFile . 'breakpoints.large', 'd-lg-only'],
                        [$translateFile . 'breakpoints.xlarge', 'd-xl-only'],
                        [$translateFile . 'breakpoints.xxlarge', 'd-xxl-only'],
                        [$translateFile . 'tx_starter_visibility.I.visibility-until', '--div--'],
                        [$translateFile . 'breakpoints.small', 'd-sm-none'],
                        [$translateFile . 'breakpoints.medium', 'd-md-none'],
                        [$translateFile . 'breakpoints.large', 'd-lg-none'],
                        [$translateFile . 'breakpoints.xlarge', 'd-xl-none'],
                        [$translateFile . 'breakpoints.xxlarge', 'd-xxl-none'],
                    ],
                ],
            ],
        ]
    );
})();
