<?php

defined('TYPO3') || die();

return (function () {
    $translationFile = 'LLL:EXT:starter_nessa/Resources/Private/Language/locallang_be.xlf:';
    $showItem = [
        '--div--;LLL:EXT:core/Resources/Private/Language/Form/locallang_tabs.xlf:general',
        'header',
        '--palette--;;cta',
        'assets',
        'bodytext',
        '--div--;LLL:EXT:core/Resources/Private/Language/Form/locallang_tabs.xlf:language',
        '--palette--;;language',
        '--div--;LLL:EXT:core/Resources/Private/Language/Form/locallang_tabs.xlf:access',
        '--palette--;;hidden',
        '--palette--;LLL:EXT:frontend/Resources/Private/Language/locallang_ttc.xlf:palette.access;access',
        '--div--;LLL:EXT:core/Resources/Private/Language/Form/locallang_tabs.xlf:extended',
    ];

    return [
        'ctrl' => [
            'label' => 'header',
            'sortby' => 'sorting',
            'tstamp' => 'tstamp',
            'crdate' => 'crdate',
            'cruser_id' => 'cruser_id',
            'title' => $translationFile . 'teaser_element_label',
            'delete' => 'deleted',
            'versioningWS' => true,
            'origUid' => 't3_origuid',
            'hideTable' => true,
            'hideAtCopy' => true,
            'prependAtCopy' => 'LLL:EXT:core/Resources/Private/Language/locallang_general.xlf:LGL.prependAtCopy',
            'transOrigPointerField' => 'l10n_parent',
            'transOrigDiffSourceField' => 'l10n_diffsource',
            'languageField' => 'sys_language_uid',
            'translationSource' => 'l10n_source',
            'enablecolumns' => [
                'disabled' => 'hidden',
                'starttime' => 'starttime',
                'endtime' => 'endtime',
            ],
            'typeicon_classes' => [
                'default' => 'starter-table-tx_starternessa_teaser_element',
            ],
        ],

        'types' => [
            '1' => [
                'showitem' => implode(',', $showItem),
            ],
        ],

        'palettes' => [
            'hidden' => [
                'showitem' => '
                hidden;LLL:EXT:frontend/Resources/Private/Language/locallang_ttc.xlf:field.default.hidden
            ',
            ],
            'language' => [
                'showitem' => '
                sys_language_uid;LLL:EXT:frontend/Resources/Private/Language/locallang_ttc.xlf:sys_language_uid_formlabel,
                l10n_parent
            ',
            ],
            'access' => [
                'showitem' => '
                starttime;LLL:EXT:frontend/Resources/Private/Language/locallang_ttc.xlf:starttime_formlabel,
                endtime;LLL:EXT:frontend/Resources/Private/Language/locallang_ttc.xlf:endtime_formlabel,
            ',
            ],
            'cta' => [
                'showitem' => '
                link,
                link_text
            ',
            ],
        ],

        'columns' => [
            'hidden' => [
                'exclude' => true,
                'label' => 'LLL:EXT:core/Resources/Private/Language/locallang_general.xlf:LGL.hidden',
                'config' => [
                    'type' => 'check',
                    'items' => [
                        '1' => [
                            '0' => 'LLL:EXT:frontend/Resources/Private/Language/locallang_ttc.xlf:hidden.I.0',
                        ],
                    ],
                ],
            ],
            'starttime' => [
                'exclude' => true,
                'label' => 'LLL:EXT:core/Resources/Private/Language/locallang_general.xlf:LGL.starttime',
                'config' => [
                    'type' => 'input',
                    'renderType' => 'inputDateTime',
                    'eval' => 'datetime',
                    'default' => 0,
                ],
                'l10n_mode' => 'exclude',
                'l10n_display' => 'defaultAsReadonly',
            ],
            'endtime' => [
                'exclude' => true,
                'label' => 'LLL:EXT:core/Resources/Private/Language/locallang_general.xlf:LGL.endtime',
                'config' => [
                    'type' => 'input',
                    'renderType' => 'inputDateTime',
                    'eval' => 'datetime',
                    'default' => 0,
                    'range' => [
                        'upper' => mktime(0, 0, 0, 1, 1, 2038),
                    ],
                ],
                'l10n_mode' => 'exclude',
                'l10n_display' => 'defaultAsReadonly',
            ],
            'sys_language_uid' => [
                'exclude' => true,
                'label' => 'LLL:EXT:core/Resources/Private/Language/locallang_general.xlf:LGL.language',
                'config' => ['type' => 'language'],
            ],
            'l10n_parent' => [
                'displayCond' => 'FIELD:sys_language_uid:>:0',
                'label' => 'LLL:EXT:core/Resources/Private/Language/locallang_general.xlf:LGL.l18n_parent',
                'config' => [
                    'type' => 'select',
                    'renderType' => 'selectSingle',
                    'items' => [
                        [
                            '',
                            0,
                        ],
                    ],
                    'foreign_table' => 'tx_starternessa_teaser_element',
                    'foreign_table_where' => 'AND tx_starternessa_teaser_element.pid=###CURRENT_PID### AND tx_starternessa_teaser_element.sys_language_uid IN (-1,0)',
                    'default' => 0,
                ],
            ],
            'l10n_source' => [
                'config' => [
                    'type' => 'passthrough',
                ],
            ],
            'header' => [
                'l10n_mode' => 'prefixLangTitle',
                'label' => 'LLL:EXT:frontend/Resources/Private/Language/locallang_ttc.xlf:header',
                'config' => [
                    'type' => 'input',
                    'size' => 50,
                    'max' => 255,
                    'eval' => 'trim,required',
                ],
            ],
            'link' => [
                'exclude' => true,
                'label' => $translationFile . 'tx_starternessa_teaser_element.link',
                'config' => [
                    'type' => 'input',
                    'renderType' => 'inputLink',
                    'size' => 50,
                    'max' => 1024,
                    'eval' => 'trim',
                    'fieldControl' => [
                        'linkPopup' => [
                            'options' => [
                                'title' => $translationFile . 'tx_starternessa_teaser_element.link',
                                'blindLinkOptions' => 'folder, spec',
                                'blindLinkFields' => 'class, params, target',
                            ],
                        ],
                    ],
                    'softref' => 'typolink',
                ],
            ],
            'link_text' => [
                'l10n_mode' => 'prefixLangTitle',
                'exclude' => true,
                'label' => $translationFile . 'tx_starternessa_teaser_element.link_text',
                'config' => [
                    'type' => 'input',
                    'size' => 40,
                    'max' => 255,
                ],
            ],
            'icon' => [
                'exclude' => true,
                'label' => $translationFile . 'tx_starternessa_teaser_element.icon',
                'config' => [
                    'type' => 'select',
                    'renderType' => 'selectSingle',
                    'items' => [
                        [
                            'LLL:EXT:core/Resources/Private/Language/locallang_general.xlf:LGL.default_value',
                            '',
                        ],
                    ],
                    'default' => '',
                ],
            ],
            'assets' => [
                'label' => 'LLL:EXT:frontend/Resources/Private/Language/Database.xlf:tt_content.asset_references',
                'config' => \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::getFileFieldTCAConfig(
                    'assets',
                    [
                        'appearance' => [
                            'createNewRelationLinkTitle' => 'LLL:EXT:frontend/Resources/Private/Language/Database.xlf:tt_content.asset_references.addFileReference',
                        ],
                        'minitems' => 1,
                        'maxitems' => 1,
                        // custom configuration for displaying fields in the overlay/reference table
                        // behaves the same as the image field.
                        'overrideChildTca' => [
                            'columns' => [
                                'uid_local' => [
                                    'config' => [
                                        'appearance' => [
                                            'elementBrowserAllowed' => 'jpg,jpeg,png',
                                        ],
                                    ],
                                ],
                                'crop' => [
                                    'config' => [
                                        'cropVariants' => [
                                            'default' => [
                                                'title' => 'Default',
                                                'selectedRatio' => '3:2',
                                                'allowedAspectRatios' => [
                                                    '3:2' => [
                                                        'title' => 'LLL:EXT:core/Resources/Private/Language/locallang_wizards.xlf:imwizard.ratio.3_2',
                                                        'value' => 3 / 2,
                                                    ],
                                                ],
                                            ],
                                        ],
                                    ],
                                ],
                            ],
                            'types' => [
                                '0' => [
                                    'showitem' => '
                                        --palette--;;nessaTeaserBackgroundOverlayPalette,
                                        --palette--;;filePalette',
                                ],
                                \TYPO3\CMS\Core\Resource\File::FILETYPE_IMAGE => [
                                    'showitem' => '
                                        --palette--;;nessaTeaserBackgroundOverlayPalette,
                                        --palette--;;filePalette',
                                ],
                            ],
                        ],
                    ],
                    $GLOBALS['TYPO3_CONF_VARS']['SYS']['mediafile_ext']
                ),
            ],
            'bodytext' => [
                'l10n_mode' => 'prefixLangTitle',
                'label' => 'LLL:EXT:core/Resources/Private/Language/locallang_general.xlf:LGL.text',
                'config' => [
                    'type' => 'text',
                    'cols' => '80',
                    'rows' => '10',
                ],
            ],

            'l10n_diffsource' => [
                'config' => [
                    'type' => 'passthrough',
                    'default' => '',
                ],
            ],
            't3ver_label' => [
                'label' => 'LLL:EXT:core/Resources/Private/Language/locallang_general.xlf:LGL.versionLabel',
                'config' => [
                    'type' => 'input',
                    'size' => 30,
                    'max' => 255,
                ],
            ],
        ],
    ];
})();
