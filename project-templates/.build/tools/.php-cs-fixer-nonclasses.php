<?php

$config = \TYPO3\CodingStandards\CsFixerConfig::create();
$config
    ->getFinder()
    ->in([
        __DIR__ . '/../../app/backend/packages/customer_sitepackage',
    ])
    ->exclude([
        'Classes',
        'frontend',
        'Resources',
    ])
;

return $config;
