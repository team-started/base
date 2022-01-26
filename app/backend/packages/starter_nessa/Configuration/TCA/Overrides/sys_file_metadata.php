<?php

defined('TYPO3_MODE') || die();

(function () {
    $translationFile = 'LLL:EXT:starter_nessa/Resources/Private/Language/locallang_be.xlf:';

    \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addTCAcolumns(
        'sys_file_metadata',
        [
            'nessa_portfolio_link' => [
                'exclude' => true,
                'label' => $translationFile . 'sys_file_metadata.nessa_portfolio_link',
                'config' => [
                    'type' => 'input',
                    'renderType' => 'inputLink',
                    'size' => 50,
                    'max' => 1024,
                    'eval' => 'trim',
                    'fieldControl' => [
                        'linkPopup' => [
                            'options' => [
                                'title' => $translationFile . 'sys_file_metadata.nessa_portfolio_link',
                                'blindLinkOptions' => 'file, folder, mail, spec, telephone',
                                'blindLinkFields' => 'class, params, target',
                            ],
                        ],
                    ],
                    'softref' => 'typolink',
                ],
            ],
        ]
    );

    \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addToAllTCAtypes(
        'sys_file_metadata',
        'nessa_portfolio_link',
        '',
        'after:title'
    );
})();
