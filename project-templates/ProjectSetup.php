#!/usr/bin/php
<?php

declare(strict_types=1);

/***************************************************************
 *  Copyright notice
 *
 *  (c) 2020 wegewerk GmbH (typo3@wegewerk.com)
 *  All rights reserved
 *
 *  This copyright notice MUST APPEAR in all copies of the script!
 ***************************************************************/

/**
 * Class ProjectSetup
 *
 * Is called from "ddev init-project" by "ddev setup project" (see .ddev/commands/host/setup.sh) in order
 * to run inside the ddev container!
 *
 * - Overwrites config files of the prototype with those used in projects
 * - deletes files/folders used in the prototype only
 */
class ProjectSetup
{
    protected string $projectName;
    protected string $version;
    protected string $buildDir;
    protected array $templates = [];
    protected array $replacements = [];
    protected array $variables = [];

    public function __construct($args)
    {
        if (!isset($args[1])) {
            $this->log('Please provide the project name as the first parameter!');
            exit(1);
        }

        $this->projectName = $args[1];
        $this->version = $args[2];
        $this->buildDir = '/var/www/html/_build/';

        // Result-path => template
        $this->templates = [
            'app/backend/composer.json' => 'app/backend/composer.json',
        ];

        $this->replacements = [
            [
                'files' => ['app/backend/.env', 'app/backend/.env.dist', '.ddev/config.yaml'],
                'replace' => ['starter-base' => '@PROJECT_NAME@'],
            ],
        ];
    }

    /**
     * Bundles all actions
     */
    public function run()
    {
        $this->initVariables();
        $this->createFromTemplates();
        $this->replaceInFiles();
    }

    protected function initVariables()
    {
        $versionBugfix = preg_replace('~(\d+)\.(\d+)\.(\d+)~', '$1.$2.*', $this->version);

        $this->variables = [
            '@TIMESTAMP@' => time(),
            '@PROJECT_NAME@' => $this->projectName,
            '@VERSION_EXACT@' => $this->version,
            '@VERSION_BUGFIX@' => $versionBugfix,
        ];
    }

    /**
     * Copies templates, replaces variables
     */
    protected function createFromTemplates()
    {
        foreach ($this->templates as $dest => $src) {
            $destPath = $this->buildDir . $dest;
            $srcPath = __DIR__ . '/' . $src;

            $destFolder = dirname($destPath);
            if (!is_dir($destFolder)) {
                mkdir($destFolder, 0777, true);
            }

            $content = file_get_contents($srcPath);
            $content = str_replace(array_keys($this->variables), array_values($this->variables), $content);
            $fileCreated = file_put_contents($destPath, $content);

            if (!$fileCreated || !file_exists($srcPath)) {
                $this->log('[ERROR] file not created ' . $destPath);
            }
        }
    }

    /**
     * Search and replace strings in files
     */
    protected function replaceInFiles()
    {
        foreach ($this->replacements as $replacement) {
            $searchValues = array_keys($replacement['replace']);
            $replaceValues = array_values($replacement['replace']);
            $replaceValues = str_replace(array_keys($this->variables), array_values($this->variables), $replaceValues);

            foreach ($replacement['files'] as $filePath) {
                $path = $this->buildDir . $filePath;
                if (!file_exists($path)) {
                    $this->log("Expected a file '$path' - skipping");
                    continue;
                }
                $content = file_get_contents($path);
                $content = str_replace($searchValues, $replaceValues, $content);
                file_put_contents($path, $content);
            }
        }
    }

    /**
     * Just echo to terminal right now
     * @param mixed $msg
     */
    protected function log($msg)
    {
        if (!is_object($msg)) {
            echo "$msg\n";
        } elseif (is_array($msg)) {
            print_r($msg);
        }
    }
}

$projectSetup = new ProjectSetup($argv);
$projectSetup->run();
