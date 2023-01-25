<?php

declare(strict_types=1);

namespace StarterTeam\StarterMigration\Service;

class MigrationService
{
    /**
     * @var iterable<MigrationServiceInterface> $migrators
     */
    protected iterable $migrators;

    /**
     * @param iterable<MigrationServiceInterface> $migrators
     */
    public function __construct(iterable $migrators)
    {
        $this->migrators = $migrators;
    }

    public function countOfElementUpdates(string $cType): int
    {
        $migrationService = $this->findMigrationService($this->migrators, $cType);
        if (is_null($migrationService)) {
            // @todo: Log that no migration service are found
            return 0;
        }

        return $migrationService->countOfRecordUpdates();
    }

    public function performMigration(string $cType): bool
    {
        $migrationService = $this->findMigrationService($this->migrators, $cType);
        if (is_null($migrationService)) {
            // @todo: Log that no migration service are found
            return false;
        }

        return $migrationService->proceedMigration();
    }

    protected function findMigrationService(iterable $migrators, string $cType): ?MigrationServiceInterface
    {
        $service = null;

        foreach ($migrators as $migrator) {
            $canHandle = $migrator->canHandle($cType);
            if ($canHandle) {
                $service = $migrator;
                break;
            }
        }

        return $service;
    }
}
