<?php

declare(strict_types=1);

use Rector\Core\Configuration\Option;
use Rector\Core\ValueObject\PhpVersion;
use Ssch\TYPO3Rector\Configuration\Typo3Option;
use Ssch\TYPO3Rector\FileProcessor\Composer\Rector\ExtensionComposerRector;
use Ssch\TYPO3Rector\Set\Typo3SetList;

return static function (\Rector\Config\RectorConfig $rectorConfig): void {
    $rectorConfig->paths([
        __DIR__ . '/packages/starter/',
        __DIR__ . '/packages/starter_twig/',
        __DIR__ . '/packages/starter_nessa/',
        __DIR__ . '/packages/starter_migration/',
        __DIR__ . '/packages/customer_sitepackage/',
        __DIR__ . '/packages/sitepackage_nessa/',
    ]);

    $rectorConfig->phpVersion(PhpVersion::PHP_74);
    $rectorConfig->importNames();
    $rectorConfig->disableImportShortClasses();

    $rectorConfig->sets([
        \Rector\Set\ValueObject\LevelSetList::UP_TO_PHP_74,
        \Ssch\TYPO3Rector\Set\Typo3LevelSetList::UP_TO_TYPO3_11,
        Typo3SetList::COMPOSER_PACKAGES_110_CORE,
    ]);

    $rectorConfig->skip([
        // this rule require PHP 8.0 in project
        \Rector\DeadCode\Rector\ClassMethod\RemoveUnusedPromotedPropertyRector::class,
        // this rule require PHP 8.1 in project
        \Rector\CodingStyle\Rector\ClassConst\RemoveFinalFromConstRector::class,
    ]);

    $parameters = $rectorConfig->parameters();
    $parameters->set(Option::FOLLOW_SYMLINKS, false);

    // If you have an editorconfig and changed files should keep their format enable it here
    $parameters->set(Option::ENABLE_EDITORCONFIG, true);

    // This is used by the class \Ssch\TYPO3Rector\Rector\PostRector\FullQualifiedNamePostRector to force FQN in paths and files
    $parameters->set(Typo3Option::PATHS_FULL_QUALIFIED_NAMESPACES, [
        # If you are targeting TYPO3 Version 11 use can now use Short namespace
        # @see namespace https://docs.typo3.org/m/typo3/reference-coreapi/master/en-us/ExtensionArchitecture/ConfigurationFiles/Index.html
        'ext_localconf.php',
        'ext_tables.php',
        'ClassAliasMap.php',
        __DIR__ . '/**/Configuration/*.php',
        __DIR__ . '/**/Configuration/**/*.php',
    ]);

    // get services (needed for register a single rule)
    $services = $rectorConfig->services();
    $services->set(ExtensionComposerRector::class)
        ->call('configure', [[ExtensionComposerRector::TYPO3_VERSION_CONSTRAINT => '^11.5']]);
};
