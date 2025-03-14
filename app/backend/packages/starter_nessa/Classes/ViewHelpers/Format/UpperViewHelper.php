<?php

declare(strict_types=1);

namespace StarterTeam\StarterNessa\ViewHelpers\Format;

use Closure;
use Override;
use TYPO3Fluid\Fluid\Core\Rendering\RenderingContextInterface;
use TYPO3Fluid\Fluid\Core\ViewHelper\AbstractViewHelper;
use TYPO3Fluid\Fluid\Core\ViewHelper\Exception;
use TYPO3Fluid\Fluid\Core\ViewHelper\Traits\CompileWithContentArgumentAndRenderStatic;

/**
 * Removes tags from the given string (applying PHPs :php:`strip_tags()` function)
 * See https://www.php.net/manual/function.strip-tags.php.
 *
 * Examples
 * ========
 *
 * Default notation
 * ----------------
 *
 * ::
 *
 *    <starterteam:format.upper>Some Text</starterteam:format.upper>
 *
 * SOME TEXT
 *
 *
 * Inline notation
 * ---------------
 *
 * ::
 *
 *    {text -> starterteam:format.upper()}
 *
 * SOME TEXT
 */
class UpperViewHelper extends AbstractViewHelper
{
    use CompileWithContentArgumentAndRenderStatic;

    /**
     * No output escaping as some tags may be allowed
     */
    protected $escapeOutput = false;

    /**
     * To ensure all tags are removed, child node's output must not be escaped
     */
    protected $escapeChildren = false;

    /**
     * Initialize ViewHelper arguments
     *
     * @throws Exception
     */
    #[Override]
    public function initializeArguments(): void
    {
        $this->registerArgument('value', 'string', 'string to format');
    }

    /**
     * Applies strtoupper() on the specified value.
     *
     * @see https://www.php.net/manual/function.strtoupper.php
     */
    #[Override]
    public static function renderStatic(
        array $arguments,
        Closure $renderChildrenClosure,
        RenderingContextInterface $renderingContext
    ): string {
        $value = $renderChildrenClosure();
        return strtoupper((string)$value);
    }
}
