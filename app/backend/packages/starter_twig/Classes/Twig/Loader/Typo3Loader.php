<?php

declare(strict_types=1);

namespace StarterTeam\StarterTwig\Twig\Loader;

use Twig\Error\LoaderError;
use Twig\Loader\LoaderInterface;
use Twig\Source;
use TYPO3\CMS\Core\Utility\GeneralUtility;

/**
 * Adds the possibility to load twig files from TYPO3 extensions.
 */
class Typo3Loader implements LoaderInterface
{
    protected array $cache = [];

    protected array $errorCache = [];

    public function getSourceContext($name): Source
    {
        $path = $this->findTemplate($name);

        return new Source(\file_get_contents($path), $name, $path);
    }

    public function getCacheKey($name): string
    {
        return $name;
    }

    public function isFresh($name, $time): bool
    {
        return \filemtime($this->findTemplate($name)) <= $time;
    }

    public function exists($name): bool
    {
        if (isset($this->cache[$name])) {
            return true;
        }

        try {
            $this->findTemplate($name);
            return true;
        } catch (LoaderError $loaderError) {
            return false;
        }
    }

    /**
     * Checks if the template can be found.
     *
     * @return false|string The template name or false
     * @throws LoaderError
     */
    public function findTemplate(string $name): string
    {
        if (isset($this->cache[$name])) {
            return $this->cache[$name];
        }

        if (isset($this->errorCache[$name])) {
            throw new LoaderError($this->errorCache[$name]);
        }

        $path = GeneralUtility::getFileAbsFileName($name);

        if (empty($path) || !\is_file($path)) {
            $this->errorCache[$name] = \sprintf('unable to find template "%s".', $name);
            throw new LoaderError($this->errorCache[$name]);
        }

        $this->cache[$name] = $path;

        return $path;
    }
}
