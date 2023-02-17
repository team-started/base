<?php

$config = \TYPO3\CodingStandards\CsFixerConfig::create();
$config
    ->getFinder()
    ->in([
        __DIR__ . '/../../app/backend/packages/customer_sitepackage',
        __DIR__ . '/../../app/backend/packages/sitepackage_freya',
        __DIR__ . '/../../app/backend/packages/sitepackage_nessa',
        __DIR__ . '/../../app/backend/packages/starter',
        __DIR__ . '/../../app/backend/packages/starter_freya',
        __DIR__ . '/../../app/backend/packages/starter_nessa',
        __DIR__ . '/../../app/backend/packages/starter_twig',
    ])
    ->exclude([
        'Classes',
        'frontend',
        'Resources',
    ])
;

return $config;
