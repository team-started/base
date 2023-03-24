<?php

declare(strict_types=1);

namespace StarterTeam\StarterTwigNews\View;

use PrototypeIntegration\PrototypeIntegration\View\ExtbaseViewAdapter;
use RuntimeException;
use StarterTeam\StarterTwigNews\DataProcessing\Content\Ce76NewsDetail;

class NewsDetailTwigView extends ExtbaseViewAdapter
{
    private Ce76NewsDetail $dataProcessor;

    public function __construct(Ce76NewsDetail $dataProcessor)
    {
        $this->dataProcessor = $dataProcessor;
    }

    public function render(): string
    {
        if (empty($this->settings['detail']['templateName'])) {
            throw new RuntimeException('No template file defined article detail view');
        }
        $this->template = $this->settings['detail']['templateName'];

        return parent::render();
    }

    public function convertVariables(array $variables): array
    {
        $variables['settings']['list']['cropping']['maxCharacters'] = (int)$variables['settings']['cropMaxCharacters'];
        return $this->dataProcessor->process($variables, $variables['settings']) ?? [];
    }
}
