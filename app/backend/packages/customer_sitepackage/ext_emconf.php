<?php

$EM_CONF['customer_sitepackage'] = [
    'title' => 'StarterTeam basic sitepackage',
    'description' => 'StarterTeam basic sitepackage extension',
    'category' => 'distribution',
    'state' => 'stable',
    'version' => '2.0.0-dev',
    'constraints' => [
        'depends' => [
            'typo3' => '10.4.0-10.4.99',
            'starter' => '*',
            'starter_sitepackage' => '*',
        ],
        'conflicts' => [
            'css_styled_content' => '*'
        ],
        'suggests' => [],
    ]
];
