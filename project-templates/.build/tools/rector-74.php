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
    ]);

    $rectorConfig->phpVersion(PhpVersion::PHP_74);
    $rectorConfig->importNames();

    $rectorConfig->sets([
        SetList::CODE_QUALITY,
        SetList::DEAD_CODE,
        LevelSetList::UP_TO_PHP_74,
        Typo3LevelSetList::UP_TO_TYPO3_11,
    ]);

    $rectorConfig->skip([
        // @see https://github.com/sabbelasichon/typo3-rector/issues/2536
        getcwd() . '/packages/**/Configuration/ExtensionBuilder/*',
        // We skip those directories on purpose as there might be node_modules or similar
        // that include typescript which would result in false positive processing
        getcwd() . '/packages/**/Resources/**/node_modules/*',
        getcwd() . '/packages/**/Resources/**/NodeModules/*',
        getcwd() . '/packages/**/Resources/**/BowerComponents/*',
        getcwd() . '/packages/**/Resources/**/bower_components/*',
        getcwd() . '/packages/**/Resources/**/build/*',
        getcwd() . '/packages/**/.build/*',
        getcwd() . '/packages/**/frontend/*',
        getcwd() . '/packages/**/Documentation/*',
        getcwd() . '/.Build/*',
        getcwd() . '/config/*',
        getcwd() . '/patches/*',
        getcwd() . '/public/*',
        getcwd() . '/var/*',
        getcwd() . '/vendor/*',
        \Rector\PostRector\Rector\NameImportingPostRector::class => [
            'ext_localconf.php',
            'ext_tables.php',
            'ClassAliasMap.php',
            getcwd() . '/packages/**/Configuration/*.php',
            getcwd() . '/packages/**/Configuration/**/*.php',
        ],
        // skip this rule to have a performance boost
        \Rector\Php56\Rector\FunctionLike\AddDefaultValueForUndefinedVariableRector::class => [
            getcwd() . '/packages/**/Configuration/TCA/*',
        ],
    ]);
};
