<?php

declare(strict_types=1);

use Rector\Config\RectorConfig;
use Rector\Set\ValueObject\LevelSetList;
use Rector\ValueObject\PhpVersion;
use Ssch\TYPO3Rector\Set\Typo3LevelSetList;
use Ssch\TYPO3Rector\Set\Typo3SetList;

return RectorConfig::configure()
    ->withPaths([
        getcwd() . '/packages/customer_sitepackage/',
        getcwd() . '/packages/sitepackage_freya/',
        getcwd() . '/packages/sitepackage_nessa/',
        getcwd() . '/packages/starter/',
        getcwd() . '/packages/starter_freya/',
        getcwd() . '/packages/starter_nessa/',
        getcwd() . '/packages/starter_twig/',
        getcwd() . '/packages/starter_twig_news/',
    ])
    ->withImportNames()
    ->withPhpVersion(PhpVersion::PHP_83)
    ->withSets([
        Typo3SetList::CODE_QUALITY,
        Typo3SetList::GENERAL,
        Typo3LevelSetList::UP_TO_TYPO3_12,
        LevelSetList::UP_TO_PHP_83
    ])
    ->withRules([
        \Rector\TypeDeclaration\Rector\ClassMethod\AddVoidReturnTypeWhereNoReturnRector::class,
        \Ssch\TYPO3Rector\CodeQuality\General\ConvertImplicitVariablesToExplicitGlobalsRector::class,
    ])
    ->withSkip([
        getcwd() . '/packages/starter_nessa/ext_tables.php',
    ]);
