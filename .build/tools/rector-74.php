<?php

declare(strict_types=1);

use Rector\Config\RectorConfig;
use Rector\Core\ValueObject\PhpVersion;
use Rector\Set\ValueObject\LevelSetList;
use Rector\Set\ValueObject\SetList;
use Ssch\TYPO3Rector\Set\Typo3LevelSetList;

return static function (RectorConfig $rectorConfig): void {
    $rectorConfig->paths([
        getcwd() . '/packages/customer_sitepackage/',
        getcwd() . '/packages/sitepackage_freya/',
        getcwd() . '/packages/sitepackage_nessa/',
        getcwd() . '/packages/starter/',
        getcwd() . '/packages/starter_freya/',
        getcwd() . '/packages/starter_nessa/',
        getcwd() . '/packages/starter_twig/',
        getcwd() . '/packages/starter_twig_news/',
    ]);

    $rectorConfig->phpVersion(PhpVersion::PHP_81);
    $rectorConfig->importNames();

    $rectorConfig->sets([
        SetList::CODE_QUALITY,
        SetList::DEAD_CODE,
        LevelSetList::UP_TO_PHP_74,
        Typo3LevelSetList::UP_TO_TYPO3_11,
    ]);

    $rectorConfig->skip([
        // @see https://github.com/sabbelasichon/typo3-rector/issues/2536
        '/**/Configuration/ExtensionBuilder/*',
        // We skip those directories on purpose as there might be node_modules or similar
        // that include typescript which would result in false positive processing
        '/**/Resources/**/node_modules/*',
        '/**/Resources/**/NodeModules/*',
        '/**/Resources/**/BowerComponents/*',
        '/**/Resources/**/bower_components/*',
        '/**/Resources/**/build/*',
        '/**/.build/*',
        '/**/frontend/*',
        '/**/Documentation/*',
        '/vendor/*',
        '/Build/*',
        '/public/*',
        '/.github/*',
        '/.Build/*',
        \Rector\PostRector\Rector\NameImportingPostRector::class => [
            'ext_localconf.php',
            'ext_tables.php',
            'ClassAliasMap.php',
            getcwd() . '/**/Configuration/*.php',
            getcwd() . '/**/Configuration/**/*.php',
        ],
    ]);
};
