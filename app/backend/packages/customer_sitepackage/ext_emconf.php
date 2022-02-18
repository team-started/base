<?php

$EM_CONF['customer_sitepackage'] = [
    'title' => 'StarterTeam basic sitepackage',
    'description' => 'StarterTeam basic sitepackage extension',
    'category' => 'distribution',
    'state' => 'stable',
    'version' => '3.1.0',
    'constraints' => [
        'depends' => [
            'typo3' => '10.4.0-10.4.99',
            'starter' => '*',
        ],
        'conflicts' => [
            'css_styled_content' => '*',
        ],
        'suggests' => [
            'starter_twig' => '*',
            'starter_nessa' => '*',
        ],
    ],
];
