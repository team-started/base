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
        __DIR__ . '/../../app/backend/packages/starter_twig_news',
    ])
    ->exclude([
        'frontend',
        'Resources',
    ])
;

// add own rule configuration
$customRules = [
    'blank_line_after_namespace' => true,
    'blank_lines_before_namespace' => true,
    'no_blank_lines_after_class_opening' => true,
    'phpdoc_to_param_type' => true,
    'phpdoc_to_property_type' => true,
    'phpdoc_to_return_type' => false,
];

$config->setRules(array_merge_recursive($config->getRules(), $customRules));

return $config;
