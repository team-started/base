<?php

use TYPO3\CMS\Core\Core\Environment;
use TYPO3\CMS\Core\Crypto\PasswordHashing\Argon2iPasswordHash;
use TYPO3\CMS\Core\Crypto\PasswordHashing\BcryptPasswordHash;
use TYPO3\CMS\Core\Log\LogLevel;
use TYPO3\CMS\Core\Log\Writer\FileWriter;
use TYPO3\CMS\Core\Utility\GeneralUtility;

(function () {
    // Load .env file in shared/conf
    if (!Environment::getContext()->isDevelopment()) {
        $dotEnvFile = Environment::getPublicPath() . '/../../../../../shared/conf/.env';
        if (file_exists($dotEnvFile)) {
            $loader = new Symfony\Component\Dotenv\Dotenv();
            $loader->usePutenv();
            $loader->load($dotEnvFile);
        } else {
            die('Please provide a .env file.');
        }
    }

    $GLOBALS['TYPO3_CONF_VARS'] = array_replace_recursive(
        $GLOBALS['TYPO3_CONF_VARS'],
        [
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
            'LOG' => [
                'writerConfiguration' => [
                    LogLevel::ALERT => [
                        FileWriter::class => [
                            'logFile' => Environment::getVarPath() . '/log/typo3-alert.log'
                        ]
                    ],
                    LogLevel::CRITICAL => [
                        FileWriter::class => [
                            'logFile' => Environment::getVarPath() . '/log/typo3-critical.log'
                        ]
                    ],
                    LogLevel::DEBUG => [
                        FileWriter::class => [
                            'logFile' => Environment::getVarPath() . '/log/typo3-debug.log'
                        ]
                    ],
                    LogLevel::EMERGENCY => [
                        FileWriter::class => [
                            'logFile' => Environment::getVarPath() . '/log/typo3-emergency.log'
                        ]
                    ],
                    LogLevel::ERROR => [
                        FileWriter::class => [
                            'logFile' => Environment::getVarPath() . '/log/typo3-error.log'
                        ]
                    ],
                    LogLevel::NOTICE => [
                        FileWriter::class => [
                            'logFile' => Environment::getVarPath() . '/log/typo3-notice.log'
                        ]
                    ],
                    LogLevel::INFO => [
                        FileWriter::class => [
                            'logFile' => Environment::getVarPath() . '/log/typo3-info.log'
                        ]
                    ],
                    LogLevel::WARNING => [
                        FileWriter::class => [
                            'logFile' => Environment::getVarPath() . '/log/typo3-warning.log'
                        ]
                    ],
                ]
            ]
        ]
    );

    $siteName = empty(getenv('TYPO3_SITENAME')) ? 'New TYPO3 Website' : getenv('TYPO3_SITENAME');
    $GLOBALS['TYPO3_CONF_VARS']['SYS']['sitename'] = $siteName . ' [' . getenv('TYPO3_CONTEXT') . ']';

    // mail
    if (! empty(getenv('TYPO3_BE_WARNING_EMAIL_ADDR'))) {
        $GLOBALS['TYPO3_CONF_VARS']['BE']['warning_email_addr'] = getenv('TYPO3_BE_WARNING_EMAIL_ADDR');
        $GLOBALS['TYPO3_CONF_VARS']['BE']['warning_mode'] = getenv('TYPO3_BE_WARNING_MODE');
    }

    if (! empty(getenv('TYPO3_MAIL_DEFAULT_MAIL_FROM_ADDRESS'))) {
        $GLOBALS['TYPO3_CONF_VARS']['MAIL']['defaultMailFromAddress'] = getenv('TYPO3_MAIL_DEFAULT_MAIL_FROM_ADDRESS');
        $GLOBALS['TYPO3_CONF_VARS']['MAIL']['defaultMailFromName'] = getenv('TYPO3_MAIL_DEFAULT_MAIL_FROM_Name');
    }

    // Graphics processor path
    if (!empty(getenv('TYPO3_GFX_PROCESSOR'))) {
        $GLOBALS['TYPO3_CONF_VARS']['GFX']['processor'] = getenv('TYPO3_GFX_PROCESSOR');
    }
    if (!empty(getenv('TYPO3_GFX_PROCESSOR_PATH'))) {
        $GLOBALS['TYPO3_CONF_VARS']['GFX']['processor_path'] = getenv('TYPO3_GFX_PROCESSOR_PATH');
    }
    if (!empty(getenv('TYPO3_GFX_PROCESSOR_PATH_LZW'))) {
        $GLOBALS['TYPO3_CONF_VARS']['GFX']['processor_path_lzw'] = getenv('TYPO3_GFX_PROCESSOR_PATH_LZW');
    }
    if (!empty(getenv('TYPO3_GFX_PROCESSOR_COLORSPACE'))) {
        $GLOBALS['TYPO3_CONF_VARS']['GFX']['processor_colorspace'] = getenv('TYPO3_GFX_PROCESSOR_COLORSPACE');
    }

    // fallback to bcrypt if argon is unavailable
    if (! (defined('PASSWORD_ARGON2I') && PASSWORD_ARGON2I)) {
        $GLOBALS['TYPO3_CONF_VARS']['BE']['passwordHashing'] = [
            'className' => BcryptPasswordHash::class,
            'options' => [],
        ];
        $GLOBALS['TYPO3_CONF_VARS']['FE']['passwordHashing'] = [
            'className' => BcryptPasswordHash::class,
            'options' => [],
        ];
    } else {
        /**@var Argon2iPasswordHash $passwordHashing*/
        $passwordHashing = GeneralUtility::makeInstance(Argon2iPasswordHash::class);
        $hashedPassword = $passwordHashing->getHashedPassword(getenv('TYPO3_INSTALL_TOOL_PASSWORD'));
        $GLOBALS['TYPO3_CONF_VARS']['BE']['installToolPassword'] = $hashedPassword;
    }

    // Development configuration
    if (Environment::getContext()->isDevelopment()) {
        $files = glob(Environment::getPublicPath() . '/../configuration/*.php');
        foreach ($files as $configurationFile) {
            require_once($configurationFile);
        }
    }
})();
