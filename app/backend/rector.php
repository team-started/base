<?php

declare(strict_types=1);

use Rector\Core\Configuration\Option;
use Rector\Core\ValueObject\PhpVersion;
use Rector\Set\ValueObject\SetList;
use Ssch\TYPO3Rector\Configuration\Typo3Option;
use Ssch\TYPO3Rector\FileProcessor\Composer\Rector\ExtensionComposerRector;
use Ssch\TYPO3Rector\FileProcessor\TypoScript\Rector\ExtbasePersistenceTypoScriptRector;
use Ssch\TYPO3Rector\Set\Typo3SetList;
use Symfony\Component\DependencyInjection\Loader\Configurator\ContainerConfigurator;

return static function (ContainerConfigurator $containerConfigurator): void {
    $parameters = $containerConfigurator->parameters();

    $containerConfigurator->import(SetList::CODING_STYLE);
    $containerConfigurator->import(SetList::DEAD_CODE);
    $containerConfigurator->import(SetList::PHP_74);

    $containerConfigurator->import(Typo3SetList::TYPO3_104);
    $containerConfigurator->import(Typo3SetList::COMPOSER_PACKAGES_104_CORE);

    // In order to have a better analysis from phpstan we teach it here some more things
    //$parameters->set(Option::PHPSTAN_FOR_RECTOR_PATH, Typo3Option::PHPSTAN_FOR_RECTOR_PATH);
    $parameters->set(Option::AUTO_IMPORT_NAMES, true);

    // this will not import root namespace classes, like \DateTime or \Exception
    $parameters->set(Option::IMPORT_SHORT_CLASSES, false);
    $parameters->set(Option::IMPORT_DOC_BLOCKS, false);
    $parameters->set(Option::PHP_VERSION_FEATURES, PhpVersion::PHP_74);

    // If you have an editorconfig and changed files should keep their format enable it here
    // $parameters->set(Option::ENABLE_EDITORCONFIG, true);

    // If you only want to process one/some TYPO3 extension(s), you can specify its path(s) here.
    // If you use the option --config change __DIR__ to getcwd()
    $parameters->set(Option::PATHS, [
        __DIR__ . '/packages/starter/',
        __DIR__ . '/packages/starter_twig/',
        __DIR__ . '/packages/starter_nessa/',
        __DIR__ . '/packages/customer_sitepackage/',
        __DIR__ . '/packages/sitepackage_nessa/',
        __DIR__ . '/packages/starter_sitepackage/',
    ]);

    $parameters->set(Option::SKIP, [
        // this rule require PHP 8.0 in project
        \Rector\DeadCode\Rector\ClassMethod\RemoveUnusedPromotedPropertyRector::class,
    ]);

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
    $services = $containerConfigurator->services();

    // Add some general TYPO3 rules
    $services->set(ExtbasePersistenceTypoScriptRector::class)
        ->call(
            'configure',
            [
                [
                    ExtbasePersistenceTypoScriptRector::FILENAME => __DIR__ . '/packages/starter/Configuration/Extbase/Persistence/Classes.php',
                ],
                [
                    ExtbasePersistenceTypoScriptRector::FILENAME => __DIR__ . '/packages/starter_twig/Configuration/Extbase/Persistence/Classes.php',
                ],
                [
                    ExtbasePersistenceTypoScriptRector::FILENAME => __DIR__ . '/packages/starter_nessa/Configuration/Extbase/Persistence/Classes.php',
                ],
                [
                    ExtbasePersistenceTypoScriptRector::FILENAME => __DIR__ . '/packages/customer_sitepackage/Configuration/Extbase/Persistence/Classes.php',
                ],
                [
                    ExtbasePersistenceTypoScriptRector::FILENAME => __DIR__ . '/packages/starter_sitepackage/Configuration/Extbase/Persistence/Classes.php',
                ],
                [
                    ExtbasePersistenceTypoScriptRector::FILENAME => __DIR__ . '/packages/starter_freya/Configuration/Extbase/Persistence/Classes.php',
                ],
            ]
        );
    $services->set(ExtensionComposerRector::class)
        ->call('configure', [[ExtensionComposerRector::TYPO3_VERSION_CONSTRAINT => '^10.4']]);
};
