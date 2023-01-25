<?php

defined('TYPO3') || die();

$GLOBALS['TYPO3_CONF_VARS']['SC_OPTIONS']['ext/install']['update']['starterTeamMigrationTable']
    = \StarterTeam\StarterMigration\Updates\CeTableCeTextUpdater::class;
