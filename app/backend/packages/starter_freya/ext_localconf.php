<?php

defined('TYPO3') || die();

$GLOBALS['TYPO3_CONF_VARS']['EXTENSIONS']['starter_twig']['rootTemplatePath'] =
    'EXT:starter_freya/Resources/Private/Frontend/';

$GLOBALS['TYPO3_CONF_VARS']['EXTENSIONS']['starter_twig']['namespaces'] = [
    'object' => 'EXT:starter_freya/Resources/Private/Frontend/1-objects/',
    'component' => 'EXT:starter_freya/Resources/Private/Frontend/2-components/',
    'module' => 'EXT:starter_freya/Resources/Private/Frontend/3-modules/',
];

$GLOBALS['TYPO3_CONF_VARS']['EXTENSIONS']['starter_twig']['finderNotPath'] = [
    '0-draft',
    '0-playground',
    '4-pages',
    '_preview'
];

$GLOBALS['TYPO3_CONF_VARS']['SYS']['locallangXMLOverride']['EXT:starter/Resources/Private/Language/locallang_be.xlf'][] =
    'EXT:starter_freya/Resources/Private/Language/Override/starter_locallang_be.xlf';
