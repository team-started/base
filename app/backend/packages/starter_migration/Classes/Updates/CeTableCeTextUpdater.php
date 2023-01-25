<?php

declare(strict_types=1);

namespace StarterTeam\StarterMigration\Updates;

use StarterTeam\StarterMigration\Service\MigrationService;
use TYPO3\CMS\Install\Updates\DatabaseUpdatedPrerequisite;
use TYPO3\CMS\Install\Updates\UpgradeWizardInterface;

class CeTableCeTextUpdater implements UpgradeWizardInterface
{
    const TABLE = 'tt_content';

    const CTYPE = 'table';

    protected MigrationService $migrationService;

    public function __construct(MigrationService $migrationService)
    {
        $this->migrationService = $migrationService;
    }

    public function executeUpdate(): bool
    {
        $this->migrationService->performMigration(static::CTYPE);
        return true;
    }

    public function updateNecessary(): bool
    {
        $elementCount = $this->migrationService->countOfElementUpdates(static::CTYPE);
        return $elementCount > 0;
    }

    public function getPrerequisites(): array
    {
        return [
            DatabaseUpdatedPrerequisite::class,
        ];
    }

    public function getIdentifier(): string
    {
        return 'starterTeamMigrationTable';
    }

    public function getTitle(): string
    {
        return 'Migrate CType table to CType text';
    }

    public function getDescription(): string
    {
        return 'Migrate CType table to CType text and convert table content into HTML table data to use CkEditor';
    }
}
