<?php

(function () {
    $GLOBALS['TYPO3_CONF_VARS'] = array_replace_recursive(
        $GLOBALS['TYPO3_CONF_VARS'],
        [
            'BE' => [
                'lockSSL' => (bool) getenv('TYPO3_BE_LOCK_SSL'),
                'cookieDomain' => getenv('TYPO3_BE_COOKIEDOMAIN'),
                'warning_email_addr' => getenv('TYPO3_BE_WARNING_EMAIL_ADDR'),
                'warning_mode' => getenv('TYPO3_BE_WARNING_MODE'),
            ],
            'DB' => [
                'Connections' => [
                    'Default' => [
                        'dbname' => getenv('TYPO3_DB_DEFAULT_DBNAME'),
                        'host' => getenv('TYPO3_DB_DEFAULT_HOST'),
                        'password' => getenv('TYPO3_DB_DEFAULT_PASSWORD'),
                        'port' => getenv('TYPO3_DB_DEFAULT_PORT'),
                        'user' => getenv('TYPO3_DB_DEFAULT_USER')
                    ]
                ]
            ],
            'GFX' => [
                'processor' => getenv('TYPO3_GFX_PROCESSOR'),
                'processor_path' => getenv('TYPO3_GFX_PROCESSOR_PATH'),
                'processor_path_lzw' => getenv('TYPO3_GFX_PROCESSOR_PATH_LZW'),
                'processor_colorspace' => getenv('TYPO3_GFX_PROCESSOR_COLORSPACE'),
            ],
            'LOG' => [
                'writerConfiguration' => [
                    \TYPO3\CMS\Core\Log\LogLevel::ALERT => [
                        \TYPO3\CMS\Core\Log\Writer\FileWriter::class => [
                            'logFile' => \TYPO3\CMS\Core\Core\Environment::getVarPath() . '/log/typo3-alert.log'
                        ]
                    ],
                    \TYPO3\CMS\Core\Log\LogLevel::CRITICAL => [
                        \TYPO3\CMS\Core\Log\Writer\FileWriter::class => [
                            'logFile' => \TYPO3\CMS\Core\Core\Environment::getVarPath() . '/log/typo3-critical.log'
                        ]
                    ],
                    \TYPO3\CMS\Core\Log\LogLevel::DEBUG => [
                        \TYPO3\CMS\Core\Log\Writer\FileWriter::class => [
                            'logFile' => \TYPO3\CMS\Core\Core\Environment::getVarPath() . '/log/typo3-debug.log'
                        ]
                    ],
                    \TYPO3\CMS\Core\Log\LogLevel::EMERGENCY => [
                        \TYPO3\CMS\Core\Log\Writer\FileWriter::class => [
                            'logFile' => \TYPO3\CMS\Core\Core\Environment::getVarPath() . '/log/typo3-emergency.log'
                        ]
                    ],
                    \TYPO3\CMS\Core\Log\LogLevel::ERROR => [
                        \TYPO3\CMS\Core\Log\Writer\FileWriter::class => [
                            'logFile' => \TYPO3\CMS\Core\Core\Environment::getVarPath() . '/log/typo3-error.log'
                        ]
                    ],
                    \TYPO3\CMS\Core\Log\LogLevel::INFO => [
                        \TYPO3\CMS\Core\Log\Writer\FileWriter::class => [
                            'logFile' => \TYPO3\CMS\Core\Core\Environment::getVarPath() . '/log/typo3-info.log'
                        ]
                    ],
                    \TYPO3\CMS\Core\Log\LogLevel::NOTICE => [
                        \TYPO3\CMS\Core\Log\Writer\FileWriter::class => [
                            'logFile' => \TYPO3\CMS\Core\Core\Environment::getVarPath() . '/log/typo3-notice.log'
                        ]
                    ],
                    \TYPO3\CMS\Core\Log\LogLevel::WARNING => [
                        \TYPO3\CMS\Core\Log\Writer\FileWriter::class => [
                            'logFile' => \TYPO3\CMS\Core\Core\Environment::getVarPath() . '/log/typo3-warning.log'
                        ]
                    ],
                ]
            ],
            'MAIL' => [
                'transport' => getenv('TYPO3_MAIL_TRANSPORT'),
                'transport_smtp_server' => getenv('TYPO3_MAIL_TRANSPORT_SMTP_SERVER'),
                'transport_smtp_username' => getenv('TYPO3_MAIL_TRANSPORT_SMTP_USERNAME'),
                'transport_smtp_password' => getenv('TYPO3_MAIL_TRANSPORT_SMTP_PASSWORD'),
                'transport_sendmail_command' => getenv('TYPO3_MAIL_TRANSPORT_SENDMAIL_COMMAND'),
                'defaultMailFromAddress' => getenv('TYPO3_MAIL_DEFAULT_MAIL_FROM_ADDRESS'),
                'defaultMailFromName' => getenv('TYPO3_MAIL_DEFAULT_MAIL_FROM_NAME'),
            ],
            'SYS' => [
                'phpTimeZone' => getenv('TYPO3_SYS_PHP_TIME_ZONE'),
                'systemLocale' => getenv('TYPO3_SYS_SYSTEM_LOCALE'),
                'trustedHostsPattern' => getenv('TYPO3_SYS_TRUSTED_HOST_PATTERN')
            ],
        ]
    );

    $siteName = empty(getenv('TYPO3_SITENAME')) ? 'New TYPO3 Website' : getenv('TYPO3_SITENAME');
    $GLOBALS['TYPO3_CONF_VARS']['SYS']['sitename'] = $siteName . ' [' . getenv('TYPO3_CONTEXT') . ']';

    // fallback to bcrypt if argon is unavailable
    if (! (defined('PASSWORD_ARGON2I') && PASSWORD_ARGON2I)) {
        $GLOBALS['TYPO3_CONF_VARS']['BE']['passwordHashing'] = [
            'className' => \TYPO3\CMS\Core\Crypto\PasswordHashing\BcryptPasswordHash::class,
            'options' => [],
        ];
        $GLOBALS['TYPO3_CONF_VARS']['FE']['passwordHashing'] = [
            'className' => \TYPO3\CMS\Core\Crypto\PasswordHashing\BcryptPasswordHash::class,
            'options' => [],
        ];
    } else {
        /**@var \TYPO3\CMS\Core\Crypto\PasswordHashing\Argon2iPasswordHash $passwordHashing*/
        $passwordHashing = \TYPO3\CMS\Core\Utility\GeneralUtility::makeInstance(\TYPO3\CMS\Core\Crypto\PasswordHashing\Argon2iPasswordHash::class);
        $hashedPassword = $passwordHashing->getHashedPassword(getenv('TYPO3_INSTALL_TOOL_PASSWORD'));
        $GLOBALS['TYPO3_CONF_VARS']['BE']['installToolPassword'] = $hashedPassword;
    }
})();

(function () {
    // Development configuration
    if (\TYPO3\CMS\Core\Core\Environment::getContext()->isDevelopment()) {
        $devConfiguration = \TYPO3\CMS\Core\Core\Environment::getPublicPath() . '/../configuration/config.php';
        if (file_exists($devConfiguration)) {
            require_once($devConfiguration);
        }
    }

    // Cache configuration
    if (\TYPO3\CMS\Core\Core\Environment::getContext()->__toString() !== 'Development/WithCache') {
        $cacheConfiguration = \TYPO3\CMS\Core\Core\Environment::getPublicPath() . '/../configuration/caches.php';
        if (file_exists($cacheConfiguration)) {
            require_once($cacheConfiguration);
        }
    }
})();
