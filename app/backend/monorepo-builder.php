<?php

declare(strict_types=1);

use Symplify\MonorepoBuilder\ComposerJsonManipulator\ValueObject\ComposerJsonSection;
use Symplify\MonorepoBuilder\Config\MBConfig;
use Symplify\MonorepoBuilder\Release\ReleaseWorker\PushNextDevReleaseWorker;
use Symplify\MonorepoBuilder\Release\ReleaseWorker\PushTagReleaseWorker;
use Symplify\MonorepoBuilder\Release\ReleaseWorker\SetCurrentMutualDependenciesReleaseWorker;
use Symplify\MonorepoBuilder\Release\ReleaseWorker\SetNextMutualDependenciesReleaseWorker;
use Symplify\MonorepoBuilder\Release\ReleaseWorker\TagVersionReleaseWorker;
use Symplify\MonorepoBuilder\Release\ReleaseWorker\UpdateBranchAliasReleaseWorker;
use Symplify\MonorepoBuilder\Release\ReleaseWorker\UpdateReplaceReleaseWorker;

return static function (MBConfig $mbConfig): void {
    $mbConfig->defaultBranch('main');
    $mbConfig->packageDirectories([
        __DIR__ . '/packages',
    ]);
    $mbConfig->packageAliasFormat('<major>.<minor>-dev');
    $mbConfig->dataToAppend(
        [
            ComposerJsonSection::NAME => 'starterteam/base',
            ComposerJsonSection::DESCRIPTION => 'TYPO3 CMS Distribution with TYPO3-Console and Surf support',
            ComposerJsonSection::AUTHORS => [
                [
                    'name' => 'Christian Wolfram',
                    'email' => 'c.wolfram@chriwo.de',
                ],
                [
                    'name' => 'Marc Fell',
                    'email' => 'marc@fell.hamburg',
                ],
                [
                    'name' => 'Marcel Schmid',
                    'email' => 'm.schmid@visual-fx.ch',
                ],
            ],
            ComposerJsonSection::CONFIG => [
                'optimize-autoloader' => true,
                'sort-packages' => true,
                'allow-plugins' => [
                    'typo3/class-alias-loader' => true,
                    'typo3/cms-composer-installers' => true,
                    'helhum/dotenv-connector' => true,
                    'cweagans/composer-patches' => true,
                    'phpstan/extension-installer' => true,
                ]
            ],
            ComposerJsonSection::REQUIRE => [
                'php' => '^7.4 || ^8.1',
                'cweagans/composer-patches' => '^1.7',
                'georgringer/news' => '^9.4',
                'helhum/dotenv-connector' => '^3.0',
                'helhum/typo3-console' => '^7.1',
                'ichhabrecht/content-defender' => '^3.2',
                'pti/pti' => 'dev-feature/support_t3v11',
                'starterteam/site-package-freya' => '@dev',
                'starterteam/site-package-nessa' => '@dev',
                'starterteam/starter' => '@dev',
                'starterteam/starter-freya' => '@dev',
                'starterteam/starter-nessa' => '@dev',
                'starterteam/starter-twig' => '@dev',
                'starterteam/starter-twig-news' => '@dev',
                'twig/twig' => '^3',
                'typo3/cms-backend' => '^11.5',
                'typo3/cms-belog' => '^11.5',
                'typo3/cms-beuser' => '^11.5',
                'typo3/cms-core' => '^11.5',
                'typo3/cms-extbase' => '^11.5',
                'typo3/cms-extensionmanager' => '^11.5',
                'typo3/cms-filelist' => '^11.5',
                'typo3/cms-fluid' => '^11.5',
                'typo3/cms-fluid-styled-content' => '^11.5',
                'typo3/cms-form' => '^11.5',
                'typo3/cms-frontend' => '^11.5',
                'typo3/cms-impexp' => '^11.5',
                'typo3/cms-info' => '^11.5',
                'typo3/cms-install' => '^11.5',
                'typo3/cms-lowlevel' => '^11.5',
                'typo3/cms-recordlist' => '^11.5',
                'typo3/cms-redirects' => '^11.5',
                'typo3/cms-reports' => '^11.5',
                'typo3/cms-rte-ckeditor' => '^11.5',
                'typo3/cms-scheduler' => '^11.5',
                'typo3/cms-seo' => '^11.5',
                'typo3/cms-setup' => '^11.5',
                'typo3/cms-sys-note' => '^11.5',
                'typo3/cms-t3editor' => '^11.5',
                'typo3/cms-tstemplate' => '^11.5',
                'typo3/cms-viewpage' => '^11.5',
            ],
            ComposerJsonSection::REQUIRE_DEV => [
                'michielroos/typo3scan' => '^1.7',
                'phpstan/extension-installer' => '^1.2',
                'phpstan/phpstan' => '^1.9',
                'saschaegerer/phpstan-typo3' => '^1.8',
                'ssch/typo3-rector' => '^1.1',
                'symplify/monorepo-builder' => '^11.2',
                'typo3/coding-standards' => '^0.6.1'
            ],
            ComposerJsonSection::REPOSITORIES => [
                [
                    'type' => 'path',
                    'url' => './packages/*',
                    'options' => [
                        'symlink' => 'true',
                    ],
                ],
                [
                    'type' => 'composer',
                    'url' => 'https://packagist.starter.team',
                ],
                [
                    'type' => 'vcs',
                    'url' => 'https://github.com/chriwo/typo3-pti.git',
                ],
            ],
            ComposerJsonSection::EXTRA => [
                'enable-patching' => true,
                'composer-exit-on-patch-failure' => true,
                'patches' => [
                    'pti/pti' => [
                        'Prepend site base uri to assets' => 'patches/pti/pti_prepend_site_uri_assets.patch',
                        'Make file collection records renderable' => 'patches/pti/make_file_collections_renderable.patch'
                    ]
                ],
                'typo3/cms' => [
                    'cms-package-dir' => '{$vendor-dir}/typo3/cms',
                ]
            ],
            ComposerJsonSection::SCRIPTS => [
                'ci:php:cs' => [
                    'php-cs-fixer fix --config=../../.build/tools/.php-cs-fixer.php -v --dry-run --using-cache no --diff',
                    'php-cs-fixer fix --config=../../.build/tools/.php-cs-fixer-nonclasses.php -v --dry-run --using-cache no --diff'
                ],
                'ci:php:cs-fix' => [
                    'php-cs-fixer fix --config=../../.build/tools/.php-cs-fixer.php -v --using-cache no',
                    'php-cs-fixer fix --config=../../.build/tools/.php-cs-fixer-nonclasses.php -v --using-cache no'
                ],
                'ci:php:stan' => [
                    '@ci:php:stan8.1'
                ],
                'ci:php:stan-baseline' => [
                    '@ci:php:stan-baseline8.1'
                ],
                'ci:php:stan8.1' => [
                    'phpstan --configuration=../../.build/tools/phpstan.neon'
                ],
                'ci:php:stan-baseline8.1' => [
                    'phpstan --configuration=../../.build/tools/phpstan.neon --generate-baseline=../../.build/tools/phpstan-baseline.neon'
                ],
                'ci:php:stan7.4' => [
                    'phpstan --configuration=../../.build/tools/phpstan-74.neon'
                ],
                'ci:php:stan-baseline7.4' => [
                    'phpstan --configuration=../../.build/tools/phpstan-74.neon --generate-baseline=../../.build/tools/phpstan-baseline-74.neon'
                ],
                'ci:php:rector' => [
                    '@ci:php:rector8.1'
                ],
                'ci:php:rector8.1' => [
                    'rector process --dry-run --clear-cache --config=../../.build/tools/rector.php'
                ],
                'ci:php:rector7.4' => [
                    'rector process --dry-run --clear-cache --config=../../.build/tools/rector-74.php'
                ],
                'create-symlinks' => [
                    'ln -sf vendor/helhum/typo3-console/typo3cms typo3cms'
                ],
                'post-install-cmd' => [
                    '@create-symlinks'
                ],
                'post-update-cmd' => [
                    '@create-symlinks'
                ]
            ],
        ]
    );

    $mbConfig->workers([
        UpdateReplaceReleaseWorker::class,
        SetCurrentMutualDependenciesReleaseWorker::class,
        TagVersionReleaseWorker::class,
        PushTagReleaseWorker::class,
        SetNextMutualDependenciesReleaseWorker::class,
        UpdateBranchAliasReleaseWorker::class,
        PushNextDevReleaseWorker::class,
    ]);
};
