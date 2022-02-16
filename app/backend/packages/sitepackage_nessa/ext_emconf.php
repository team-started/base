<?php

$EM_CONF['sitepackage_nessa'] = [
    'title' => 'StarterTeam sitepackage nessa',
    'description' => 'StarterTeam sitepackage extension for EXT:starter-nessa',
    'category' => 'distribution',
    'state' => 'stable',
    'version' => '3.1.0',
    'constraints' => [
        'depends' => [
            'typo3' => '10.4.0-10.4.99',
            'starter' => '*',
            'starter_nessa' => '*',
        ],
        'conflicts' => [
            'css_styled_content' => '*',
        ],
        'suggests' => [],
    ],
];
