<?php

$EM_CONF['starter_freya'] = [
    'title' => 'Starter freya',
    'description' => 'Theme extension for EXT:starter and EXT:starter-twig',
    'category' => 'theme',
    'author' => 'StarterTeam',
    'state' => 'stable',
    'version' => '3.0.0',
    'constraints' => [
        'depends' => [
            'starter' => '*',
            'starter_twig' => '*',
            'starter_sitepackage' => '*',
            'typo3' => '10.4.0-10.4.99',
        ],
        'conflicts' => [],
        'suggests' => [],
    ],
];
