<?php

declare(strict_types=1);

use Symfony\Component\DependencyInjection\Loader\Configurator\ContainerConfigurator;
use Symplify\ComposerJsonManipulator\ValueObject\ComposerJsonSection;
use Symplify\MonorepoBuilder\Release\ReleaseWorker\AddTagToChangelogReleaseWorker;
use Symplify\MonorepoBuilder\Release\ReleaseWorker\PushNextDevReleaseWorker;
use Symplify\MonorepoBuilder\Release\ReleaseWorker\PushTagReleaseWorker;
use Symplify\MonorepoBuilder\Release\ReleaseWorker\SetCurrentMutualDependenciesReleaseWorker;
use Symplify\MonorepoBuilder\Release\ReleaseWorker\SetNextMutualDependenciesReleaseWorker;
use Symplify\MonorepoBuilder\Release\ReleaseWorker\TagVersionReleaseWorker;
use Symplify\MonorepoBuilder\Release\ReleaseWorker\UpdateBranchAliasReleaseWorker;
use Symplify\MonorepoBuilder\Release\ReleaseWorker\UpdateReplaceReleaseWorker;
use Symplify\MonorepoBuilder\ValueObject\Option;

return static function (ContainerConfigurator $containerConfigurator): void {
    $parameters = $containerConfigurator->parameters();

    $parameters->set(Option::DEFAULT_BRANCH_NAME, 'main');
    $parameters->set(Option::PACKAGE_ALIAS_FORMAT, '<major>.<minor>.x-dev');
    $parameters->set(Option::PACKAGE_DIRECTORIES, [
        __DIR__ . '/packages',
    ]);

    // for "merge" command
    $parameters->set(Option::DATA_TO_APPEND, [
        ComposerJsonSection::REPOSITORIES => [
            [
                'type' => 'path',
                'url' => './packages/*',
            ],
            [
                'type' => 'composer',
                'url' => 'https://packagist.starter.team'
            ]
        ],
        ComposerJsonSection::REQUIRE => [
            'php' => '^7.4',
            'helhum/typo3-console' => '^7.0',
            'symfony/dotenv' => '^5.2',
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
            'rector/rector' => '^0.12.15',
            'typo3/coding-standards' => '^0.5.0',
        ],
        ComposerJsonSection::SCRIPTS => [
            'post-install-cmd' => [
                'ln -sf vendor/helhum/typo3-console/typo3cms typo3cms',
            ],
        ],
    ]);

    $services = $containerConfigurator->services();

    // release workers - in order to execute
    $services->set(UpdateReplaceReleaseWorker::class);
    $services->set(SetCurrentMutualDependenciesReleaseWorker::class);

    #$services->set(AddTagToChangelogReleaseWorker::class);

    $services->set(TagVersionReleaseWorker::class);
    $services->set(PushTagReleaseWorker::class);
    $services->set(SetNextMutualDependenciesReleaseWorker::class);
    $services->set(UpdateBranchAliasReleaseWorker::class);
    $services->set(PushNextDevReleaseWorker::class);
};
