<?php

$config = \TYPO3\CodingStandards\CsFixerConfig::create();
$config
    ->getFinder()
    ->in(__DIR__ . '/packages');

// add own rule configuration
$rules = $config->getRules();
$rules['single_blank_line_before_namespace'] = true;
$config->setRules($rules);

return $config;
