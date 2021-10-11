<?php

$EM_CONF[$_EXTKEY] = [
    'title' => 'StarterTeam basic sitepackage',
    'description' => 'StarterTeam basic sitepackage extension',
    'category' => 'distribution',
    'version' => '2.0.0-dev',
    'state' => 'stable',
    'constraints' => [
        'depends' => [
            'typo3' => '10.4.0-10.4.99',
            'starter' => '3.0.0-3.99.99',
        ],
        'conflicts' => [
            'css_styled_content' => '*'
        ],
        'suggests' => [],
    ]
];
