<?php

$config = \TYPO3\CodingStandards\CsFixerConfig::create();
$config
    ->getFinder()
    ->in([
        __DIR__ . '/../../app/backend/packages/customer_sitepackage',
    ])
    ->exclude([
        'TCA',
        'Overrides',
        'frontend',
        'Resources',
    ])
    ->notPath([
        'ext_emconf.php',
        'ext_localconf.php',
        'ext_tables.php',
    ])
;

$originalRules = $config->getRules();
$replaceRules = [
    'compact_nullable_typehint' => 'compact_nullable_type_declaration',
    'function_typehint_space' => 'type_declaration_spaces',
    'new_with_braces' => 'new_with_parentheses',
    'no_trailing_comma_in_singleline_array' => 'no_trailing_comma_in_singleline',
    'single_blank_line_before_namespace' => 'blank_lines_before_namespace',
];
foreach ($replaceRules as $deprecatedRule => $insteadRule) {
    if (isset($originalRules[$deprecatedRule])) {
        $value = $originalRules[$deprecatedRule];
        unset($originalRules[$deprecatedRule]);
        $originalRules[$insteadRule] = $value;
    }
}

// that rules are deprecated
// see https://github.com/PHP-CS-Fixer/PHP-CS-Fixer/blob/v3.35.1/doc/rules/basic/braces.rst
unset($originalRules['braces']);

// add own rule configuration
$customRules = [
    'blank_line_after_namespace' => true,
    'blank_lines_before_namespace' => true,
    'declare_strict_types' => true,
    'no_blank_lines_after_class_opening' => true,
    'phpdoc_to_param_type' => true,
    'phpdoc_to_property_type' => true,
    'phpdoc_to_return_type' => false,
];

$config->setRules(array_merge_recursive($originalRules, $customRules));

return $config;
