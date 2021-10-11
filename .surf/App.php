<?php

/** @var Deployment $deployment */
use TYPO3\Surf\Application\TYPO3\CMS;
use TYPO3\Surf\Domain\Model\Deployment;
use TYPO3\Surf\Domain\Model\Node;
use TYPO3\Surf\Domain\Model\SimpleWorkflow;

/*************************************************************************************************
 *
 * !!! Don't change the next lines or now what you do !!!
 *
 *************************************************************************************************/

$node = new Node(getenv('PROJECT_NAME') ?: 'StarterTeam-Project');
$node
    ->setHostname(getenv('DEPLOYMENT_HOST'))
    ->setOption('username', getenv('DEPLOYMENT_USER'))
    ->setOption('port', getenv('DEPLOYMENT_PORT') ?: 22)
    ->setOption('phpBinaryPathAndFilename', getenv('DEPLOYMENT_PHP_BINARY'))
;

$application = new CMS();
$application
    ->setDeploymentPath(getenv('DEPLOYMENT_PATH'))
    ->addNode($node)
;

addSymlinks($application);
setDeploymentOptionWithMergeOfBaseOption($application);
setOptionDeploymentSource($application);

$workflow = new SimpleWorkflow();
$workflow->setEnableRollback(getenv('ENABLE_ROLLBACK') ?: true);

$deploymentTasks = explode(',', getenv('DEPLOYMENT_TASKS'));
if (!empty($deploymentTasks)) {
    foreach ($deploymentTasks as $task) {
        if (function_exists((string)$task)) {
            call_user_func_array(
                (string)$task,
                [&$workflow, &$application]
            );
        }
    }
}

removeKeepFileTask($workflow);
$deployment->setWorkflow($workflow);

$deployment
    ->addApplication($application)
    ->setRelativeProjectRootPath('app/backend')
    ->onInitialize(
        function () use ($deployment, $application) {
            $deployment->getWorkflow()
                ->beforeTask(\TYPO3\Surf\Task\TYPO3\CMS\SetUpExtensionsTask::class, \TYPO3\Surf\Task\TYPO3\CMS\CompareDatabaseTask::class, $application)
                //->beforeStage('transfer', \TYPO3\Surf\Task\Php\WebOpcacheResetCreateScriptTask::class, $application)
                //->afterStage('switch', \TYPO3\Surf\Task\Php\WebOpcacheResetExecuteTask::class, $application)
                ->removeTask(\TYPO3\Surf\Task\TYPO3\CMS\CreatePackageStatesTask::class, $application)
                ->removeTask(\TYPO3\Surf\Task\TYPO3\CMS\CopyConfigurationTask::class, $application);
        }
    )
;

/**
 * Fix access rights for files and folders
 *
 * @param SimpleWorkflow $workflow
 * @param CMS $application
 */
function fixAccessRightsTask(&$workflow, &$application): void
{
    $taskName = 'StarterTeam\\Surf\\DefinedTask\\Shell\\' . ucfirst(__FUNCTION__);
    $workflow
        ->defineTask(
            $taskName,
            'TYPO3\\Surf\\Task\\ShellTask',
            [
                'command' =>
                    'cd {releasePath}/' . $application->getOption('webDirectory') . ' && ' .
                    'find -type d -print0 | xargs -0 chmod 2775 && ' .
                    'find -type f -print0 | xargs -0 chmod 0664',
                'logOutput' => true,
                'ignoreErrors' => true
            ]
        )
        ->afterStage('transfer', $taskName);
}

/**
 * Fix folder structure with TYPO3 console
 *
 * @param SimpleWorkflow $workflow
 * @param CMS $application
 */
function fixFolderStructureTask(&$workflow, &$application): void
{
    $taskName = 'StarterTeam\\Surf\\DefinedTask\\RunCommandTask\\' . ucfirst(__FUNCTION__);
    $workflow
        ->defineTask(
            $taskName,
            'TYPO3\\Surf\\Task\\TYPO3\\CMS\\RunCommandTask',
            [
                'command' => 'install:fixfolderstructure',
                'logOutput' => true
            ]
        )
        ->afterStage('finalize', $taskName);
}

function copyTwigDataToSitepackageTask(&$workflow, &$application): void
{
    $assetSource = getenv('CI_PROJECT_DIR') . '/app/frontend/build/prototype/assets/';
    $assetTarget = '{workspacePath}/app/backend/packages/customer_sitepackage/Resources/Public/Frontend';

    $twigSource = getenv('CI_PROJECT_DIR') . '/app/frontend/src/components/';
    $twigTarget = '{workspacePath}/app/backend/packages/customer_sitepackage/Resources/Private/Frontend';

    $command = 'mkdir -p ' . $assetTarget;
    $command .= ' && rsync -r ' . $assetSource . ' ' . $assetTarget;
    $command .= ' && mkdir -p ' . $twigTarget;
    $command .= ' && rsync -r ' . $twigSource . ' ' . $twigTarget . ' --exclude *.scss';

    $workflow
        ->defineTask(
            __FUNCTION__,
            'TYPO3\\Surf\\Task\\LocalShellTask',
            [
                'command' => $command,
                'logOutput' => true,
                'ignoreErrors' => false
            ]
        )
        ->afterStage('package', __FUNCTION__);
}

/**
 * Copy frontend artifacts into workspace path
 *
 * @param SimpleWorkflow $workflow
 * @param CMS $application
 */
function copyFractalArtifactsTask(&$workflow, &$application): void
{
    if (!empty(getenv('APP_CONTEXT')) && getenv('APP_CONTEXT') !== 'Production') {
        $source = getenv('CI_PROJECT_DIR') . '/app/frontend/build';
        $target = '{workspacePath}/app/frontend';

        $command = 'cp -fr ' . $source . ' ' . $target;

        $workflow
            ->defineTask(
                __FUNCTION__,
                'TYPO3\\Surf\\Task\\LocalShellTask',
                [
                    'command' => $command,
                    'logOutput' => true,
                    'ignoreErrors' => false
                ]
            )
            ->afterStage('package', __FUNCTION__);
    }
}

/**
 * Import demo data into database and sync static demo assets
 *
 * @param SimpleWorkflow $workflow
 * @param CMS $application
 */
function prepareBackendDemoDataTask(&$workflow, &$application): void
{
    $taskName = 'StarterTeam\\Surf\\DefinedTask\\Shell\\' . ucfirst(__FUNCTION__);
    $workflow
        ->defineTask(
            $taskName,
            'TYPO3\\Surf\\Task\\ShellTask',
            [
                'command' => $application->getOption('appDirectory') . '/craft/bin/reset_demo.sh',
                'logOutput' => true,
                'ignoreErrors' => false
            ]
        )
        ->afterStage('migrate', $taskName);
}

/**
 * Delete .gitkeep files from workspacePath. This task is automatic included
 * in workflow and must not set directly in pipeline settings.
 *
 * @param SimpleWorkflow $workflow
 */
function removeKeepFileTask(&$workflow)
{
    $taskName = 'StarterTeam\\Surf\\DefinedTask\\Shell\\' . ucfirst(__FUNCTION__);
    $workflow
        ->defineTask(
            $taskName,
            'TYPO3\\Surf\\Task\\LocalShellTask',
            [
                'command' => 'cd {workspacePath} && find -type f -name ".gitkeep" -delete',
                'logOutput' => false,
                'ignoreErrors' => true
            ]
        )
        ->beforeStage('transfer', $taskName);
}

/**
 * Returns an array with all excluded files and folder for rsync exclude option
 *
 * @return array
 */
function getStaticRsyncExcludes()
{
    $excludes = [
        '.build',
        '.ddev',
        '.gitlab',
        '.surf',
        '.DS_Store',
        '.editorconfig',
        '.git',
        '.gitattributes',
        '.gitignore',
        '.php_cs.dist',
        '/app/backend/composer.json',
        '/app/backend/composer.lock',
        '/app/backend/configuration',
        '/app/backend/public/fileadmin',
        '/app/backend/public/uploads',
        '/app/frontend/docs',
        '/app/frontend/node_modules',
        '/app/frontend/src',
        '/app/frontend/.babelrc',
        '/app/frontend/.nvmrc',
        '/app/frontend/.stylelintrc',
        '/app/frontend/*.js',
        '/app/frontend/*.json',
        '/craft/data',
        '/Readme.md',
        '/README.md',
    ];

    return $excludes;
}

/**
 *
 * @param CMS $application
 * @return void
 */
function addSymlinks(CMS &$application): void
{
    $symLinks = [
        'public/fileadmin' => '../../../../../shared/Data/fileadmin',
        'public/uploads' => '../../../../../shared/Data/uploads',
        'log' => '../../../../../shared/Data/log',
    ];

    if (!empty(getenv('APP_CONTEXT')) && getenv('APP_CONTEXT') !== 'Production') {
        $symLinks['public/prototype'] = '../../frontend/build/prototype';
    }

    $application->addSymlinks($symLinks);
}

/**
 *
 * @param CMS $application
 * @return void
 */
function setDeploymentOptionWithMergeOfBaseOption(CMS &$application): void
{
    $staticDeployOptions = [
        'composerCommandPath' => '/usr/bin/composer',
        'databaseCompareMode' => '*.add,*.change',
        'repositoryUrl' => 'file://' . dirname(__DIR__),
        'symlinkDataFolders' => [],
        'TYPO3\\Surf\\Task\\Package\\GitTask[hardClean]' => true,
        'TYPO3\\Surf\\Task\\TYPO3\\CMS\\FlushCachesTask[arguments]' => [],
    ];

    $dynamicDeployOptions = [
        'context' => getenv('APP_CONTEXT') ?: 'Production',
        'keepReleases' => (int)getenv('DEPLOYMENT_KEEP_RELEASES') ?: 5,
        'publicDirectory' => getenv('APP_PUBLIC_DIRECTORY') ?: 'public',
        'rsyncExcludes' => getStaticRsyncExcludes(),
        'webDirectory' => getenv('APP_PUBLIC_DIRECTORY') ?: 'public',
    ];

    $application->setOptions(
        array_merge(
            $application->getOptions(),
            $staticDeployOptions,
            $dynamicDeployOptions
        )
    );
}

/**
 * This method checks whether there is a correct deployment source specified. If not, it throws an exception
 * TODO: This method is not project specific and
 * may be put into something like a Library of Surf deployment related
 * classes in the future.
 *
 * @param CMS $application
 * @throws Exception
 */
function setOptionDeploymentSource(CMS &$application): void
{
    $source = getenv('DEPLOYMENT_SOURCE');

    if (!is_string($source)) {
        throw new Exception(
            'DEPLOYMENT_SOURCE environment variable is missing. Pattern: "DEPLOYMENT_SOURCE=branch|tag|sha1:foobar"',
            1479391741322
        );
    }

    $sourceArray = explode(':', $source);

    if (count($sourceArray) === 2 && in_array($sourceArray[0], ['sha1', 'branch', 'tag'])) {
        $application->setOption($sourceArray[0], $sourceArray[1]);
    } else {
        throw new InvalidArgumentException(
            'DEPLOYMENT_SOURCE environment variable does not meet the mandatory pattern. Pattern: "DEPLOYMENT_SOURCE=branch|tag|sha1:foobar", 1479391747337',
            1455797642
        );
    }
}
