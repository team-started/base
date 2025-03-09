<?php

$config = \TYPO3\CodingStandards\CsFixerConfig::create();
$config
    ->getFinder()
    ->in([
        __DIR__ . '/../app/backend/packages/customer_sitepackage',
    ])
    ->exclude([
        'Classes',
        'frontend',
        'Resources',
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


$config->setRules($originalRules);

return $config;
