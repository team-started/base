<?php

use StarterTeam\Starter\Form\FormDataProvider\TcaColPosItem;
use StarterTeam\Starter\Form\FormDataProvider\TcaCTypeItem;
use StarterTeam\Starter\Hooks\Backend\PageViewQueryHook;
use StarterTeam\Starter\Hooks\PageLayoutView\PageLayoutViewDrawItem;
use TYPO3\CMS\Backend\Form\FormDataProvider\DatabaseRowDefaultValues;
use TYPO3\CMS\Backend\Form\FormDataProvider\TcaSelectItems;
use TYPO3\CMS\Backend\RecordList\DatabaseRecordList;
use TYPO3\CMS\Backend\View\PageLayoutView;
use TYPO3\CMS\Core\Utility\ExtensionManagementUtility;

defined('TYPO3') || die();

(function () {
    ExtensionManagementUtility::addPageTSConfig(
        '<INCLUDE_TYPOSCRIPT: source="DIR:EXT:starter/Configuration/TSConfig/Main/">'
    );

    foreach (['default', 'minimal', 'link' ] as $variant) {
        $GLOBALS['TYPO3_CONF_VARS']['RTE']['Presets']['starter-' . $variant]
            = 'EXT:starter/Configuration/RTE/Starter' . ucfirst($variant) . '.yaml';
    }

    $GLOBALS['TYPO3_CONF_VARS']['SYS']['formEngine']['formDataGroup']['tcaDatabaseRecord'][TcaColPosItem::class] = [
        'depends' => [
            DatabaseRowDefaultValues::class,
        ],
        'before' => [
            TcaSelectItems::class,
        ],
    ];
    $GLOBALS['TYPO3_CONF_VARS']['SYS']['formEngine']['formDataGroup']['tcaDatabaseRecord'][TcaCTypeItem::class] = [
        'depends' => [
            TcaSelectItems::class,
        ],
    ];

    // Hide content elements in list module
    $GLOBALS['TYPO3_CONF_VARS']['SC_OPTIONS'][DatabaseRecordList::class]['modifyQuery'][]
        = PageViewQueryHook::class;

    // Hide content elements in page module
    $GLOBALS['TYPO3_CONF_VARS']['SC_OPTIONS'][PageLayoutView::class]['modifyQuery'][]
        = PageViewQueryHook::class;
})();
