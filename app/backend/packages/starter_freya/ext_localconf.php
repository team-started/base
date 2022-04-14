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
    '0-playground',
    '1-objects/objects',
    '2-components/component',
    '3-modules/_m00-modules',
    '4-pages',
    '_preview'
];
