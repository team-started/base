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
            'helhum/typo3-console' => '^6.4',
            'symfony/dotenv' => '^5.2',
            'typo3/cms-backend' => '^10.4',
            'typo3/cms-belog' => '^10.4',
            'typo3/cms-beuser' => '^10.4',
            'typo3/cms-core' => '^10.4',
            'typo3/cms-extbase' => '^10.4',
            'typo3/cms-extensionmanager' => '^10.4',
            'typo3/cms-filelist' => '^10.4',
            'typo3/cms-fluid' => '^10.4',
            'typo3/cms-fluid-styled-content' => '^10.4',
            'typo3/cms-form' => '^10.4',
            'typo3/cms-frontend' => '^10.4',
            'typo3/cms-impexp' => '^10.4',
            'typo3/cms-info' => '^10.4',
            'typo3/cms-install' => '^10.4',
            'typo3/cms-lowlevel' => '^10.4',
            'typo3/cms-recordlist' => '^10.4',
            'typo3/cms-redirects' => '^10.4',
            'typo3/cms-reports' => '^10.4',
            'typo3/cms-rte-ckeditor' => '^10.4',
            'typo3/cms-scheduler' => '^10.4',
            'typo3/cms-seo' => '^10.4',
            'typo3/cms-setup' => '^10.4',
            'typo3/cms-sys-note' => '^10.4',
            'typo3/cms-t3editor' => '^10.4',
            'typo3/cms-tstemplate' => '^10.4',
            'typo3/cms-viewpage' => '^10.4',
        ],
        ComposerJsonSection::REQUIRE_DEV => [
            'rector/rector' => '^0.12.3',
            'typo3/coding-standards' => '^0.5.0',
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
