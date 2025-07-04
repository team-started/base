<?php

declare(strict_types=1);

namespace StarterTeam\StarterTwig\DataProcessing\Content;

trait AssetTrait
{
    /**
     * Image position definition
     */
    protected array $imagePosition = [
        0 => [
            'x' => 'center',
            'y' => 'above',
            'inside' => false,
        ],
        8 => [
            'x' => 'center',
            'y' => 'below',
            'inside' => false,
        ],
        17 => [
            'x' => 'right',
            'inside' => true,
        ],
        18 => [
            'x' => 'left',
            'inside' => true,
        ],
        25 => [
            'x' => 'right',
            'inside' => false,
        ],
        26 => [
            'x' => 'left',
            'inside' => false,
        ],
    ];

    /**
     * Image crop definition by image position
     */
    protected array $imageCropVariant = [
        0 => 'position-above-below',
        8 => 'position-above-below',
        17 => 'position-left-right',
        18 => 'position-left-right',
        25 => 'position-left-right',
        26 => 'position-left-right',
    ];

    protected function getGrid(?array &$mediaItems): array
    {
        $items = null;

        if ($mediaItems['image'] ?? false) {
            $items = &$mediaItems['image'];
        }

        if ($mediaItems['video'] ?? false) {
            $items = &$mediaItems['video'];
        }

        if (is_null($items)) {
            return [];
        }

        return ['switchOrderOnSmall' => true];
    }

    protected function getImagePosition(int $imagePosition): ?array
    {
        return $this->imagePosition[$imagePosition] ?? null;
    }

    protected function getImageCropVariant(int $cropVariant = 0): ?string
    {
        return $this->imageCropVariant[$cropVariant] ?? null;
    }
}
