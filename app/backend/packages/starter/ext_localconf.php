<?php

use TYPO3\CMS\Core\Utility\ExtensionManagementUtility;
use StarterTeam\Starter\Hooks\PageLayoutView\PageLayoutViewDrawItem;
use StarterTeam\Starter\Form\FormDataProvider\TcaColPosItem;
use TYPO3\CMS\Backend\Form\FormDataProvider\DatabaseRowDefaultValues;
use TYPO3\CMS\Backend\Form\FormDataProvider\TcaSelectItems;
use StarterTeam\Starter\Form\FormDataProvider\TcaCTypeItem;
use TYPO3\CMS\Backend\RecordList\DatabaseRecordList;
use StarterTeam\Starter\Hooks\Backend\PageViewQueryHook;
use TYPO3\CMS\Backend\View\PageLayoutView;
use StarterTeam\Starter\Domain\Service\Migration\ConvertFieldNamesService;

defined('TYPO3') || die();

(function () {
    ExtensionManagementUtility::addPageTSConfig(
        '<INCLUDE_TYPOSCRIPT: source="DIR:EXT:starter/Configuration/TSConfig/Main/">'
    );

    foreach (['default', 'minimal', 'link' ] as $variant) {
        $GLOBALS['TYPO3_CONF_VARS']['RTE']['Presets']['starter-' . $variant]
            = 'EXT:starter/Configuration/RTE/Starter' . ucfirst($variant) . '.yaml';
    }

    $GLOBALS['TYPO3_CONF_VARS']['SC_OPTIONS']['cms/layout/class.tx_cms_layout.php']['tt_content_drawItem']['starter'] =
        PageLayoutViewDrawItem::class;

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
