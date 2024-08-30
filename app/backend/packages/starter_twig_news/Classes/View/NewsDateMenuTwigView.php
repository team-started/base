<?php

declare(strict_types=1);

namespace StarterTeam\StarterTwigNews\View;

use RuntimeException;
use PrototypeIntegration\PrototypeIntegration\View\ExtbaseViewAdapter;
use StarterTeam\StarterTwigNews\DataProcessing\Content\Ce77NewsDateMenu;

class NewsDateMenuTwigView extends ExtbaseViewAdapter
{
    public function __construct(private readonly Ce77NewsDateMenu $dataProcessor)
    {
    }

    public function render(): string
    {
        if (empty($this->settings['dateMenu']['templateName'])) {
            throw new RuntimeException('No template file defined for Ce77-NewsDateMenu');
        }

        $this->template = $this->settings['dateMenu']['templateName'];

        return parent::render();
    }

    public function convertVariables(array $variables): array
    {
        return $this->dataProcessor->process($variables, $variables['settings']) ?? [];
    }
}
