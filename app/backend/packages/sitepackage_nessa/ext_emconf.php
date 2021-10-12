<?php

$EM_CONF[$_EXTKEY] = [
    'title' => 'StarterTeam sitepackage nessa',
    'description' => 'StarterTeam sitepackage extension for EXT:starter-nessa',
    'category' => 'distribution',
    'state' => 'stable',
    'version' => '2.0.0-dev',
    'constraints' => [
        'depends' => [
            'typo3' => '10.4.0-10.4.99',
            'starter' => '*',
            'starter_sitepackage' => '*',
            'starter-nessa' => '*'
        ],
        'conflicts' => [
            'css_styled_content' => '*'
        ],
        'suggests' => [],
    ]
];
