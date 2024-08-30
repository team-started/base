<?php

declare(strict_types=1);

namespace StarterTeam\StarterTwigNews\View;

use RuntimeException;
use PrototypeIntegration\PrototypeIntegration\View\ExtbaseViewAdapter;
use StarterTeam\StarterTwigNews\DataProcessing\Content\Ce75NewsList;

class NewsListTwigView extends ExtbaseViewAdapter
{
    public function __construct(private readonly Ce75NewsList $dataProcessor)
    {
    }

    public function render(): string
    {
        if (empty($this->settings['list']['templateName'])) {
            throw new RuntimeException('No template file defined for Ce75-NewsList');
        }

        $this->template = $this->settings['list']['templateName'];

        return parent::render();
    }

    public function convertVariables(array $variables): array
    {
        $variables['settings']['list']['cropping']['maxCharacters'] = (int)$variables['settings']['cropMaxCharacters'];
        return $this->dataProcessor->process($variables, $variables['settings']) ?? [];
    }
}
