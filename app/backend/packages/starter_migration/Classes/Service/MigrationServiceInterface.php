<?php

declare(strict_types=1);

namespace StarterTeam\StarterMigration\Service;

interface MigrationServiceInterface
{
    public function canHandle(string $cTypeToMigration): bool;

    public function proceedMigration(): bool;

    public function countOfRecordUpdates(): int;
}
