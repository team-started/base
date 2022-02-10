<?php

$GLOBALS['TYPO3_CONF_VARS'] = array_replace_recursive(
    $GLOBALS['TYPO3_CONF_VARS'],
    [
        'BE' => [
            'debug' => true,
            'languageDebug' => false,
            'sessionTimeout' => 60 * 60 * 24 * 365
        ],
        'EXTENSIONS' => [
            'backend' => [
                'backendLogo' => '',
                'loginHighlightColor' => '',
            ],
            'extensionmanager' => [
                'offlineMode' => '1',
            ],
        ],
        'FE' => [
            'debug' => true
        ],
        'SYS' => [
            'clearCacheSystem' => true,
            'displayErrors' => true,
            'devIPmask' => '*',
            'sqlDebug' => true,
            'enableDeprecationLog' => 'file',
            'systemLogLevel' => 0,
            'systemLog' => 'error_log',
            'syslogErrorReporting' => true,
            'belogErrorReporting' => true
        ]
    ]
);
