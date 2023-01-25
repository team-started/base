<?php

declare(strict_types=1);

namespace StarterTeam\StarterMigration\Tests\Unit\Service;

use PHPUnit\Framework\InvalidDataProviderException;
use PHPUnit\Framework\TestCase;
use ReflectionException;
use StarterTeam\StarterMigration\Service\TableMigrationService;
use TYPO3\CMS\Core\Utility\CsvUtility;

class TableMigrationServiceTest extends TestCase
{
    protected TableMigrationService $tableMigrationService;

    public function setUp(): void
    {
        $this->tableMigrationService = new TableMigrationService();
    }

    /**
     * @dataProvider canHandleCTypeDataProvider
     */
    public function testCanHandleCtype(string $cType, bool $expected): void
    {
        self::assertEquals($expected, $this->tableMigrationService->canHandle($cType));
    }

    public function canHandleCTypeDataProvider(): array
    {
        return [
            'CType "table" could handle' => ['table', true],
            'Wrong CType' => ['wrongCType', false],
            'Empty CType' => ['', false],
        ];
    }

    /**
     * @dataProvider tableMigrationDataProvider
     */
    public function testMigrateTable(
        array $tableData,
        string $tableCaption,
        int $tableHeaderPosition,
        int $tableFooter,
        string $expected
    ): void {
        $method = self::getMethod('migrateContent');
        $renderedResult = $method->invokeArgs(
            $this->tableMigrationService,
            [
                $tableData,
                $tableCaption,
                $tableFooter,
                $tableHeaderPosition,
            ]
        );

        self::assertEquals($expected, $renderedResult);
    }

    /**
     * @throws ReflectionException
     */
    protected static function getMethod(string $name): \ReflectionMethod
    {
        $class = new \ReflectionClass(TableMigrationService::class);
        $method = $class->getMethod($name);
        $method->setAccessible(true);
        return $method;
    }

    public function tableMigrationDataProvider(): array
    {
        $testData = $this->getFixtureDataFromFile(__DIR__ . '/../Fixtures/CTypeTableFixture.txt');
        $tableData = CsvUtility::csvToArray($testData, chr(124), chr(0), 5);

        return [
            'Simple table' => [
                $tableData,
                '',
                0,
                0,
                $this->getFixtureDataFromFile(__DIR__ . '/../Fixtures/Results/CTypeTable/SimpleTableResult.txt'),
            ],
            'Table with caption' => [
                $tableData,
                'That\'s an table caption',
                0,
                0,
                $this->getFixtureDataFromFile(__DIR__ . '/../Fixtures/Results/CTypeTable/WithCaptionResult.txt'),
            ],
            'Table with caption and header top' => [
                $tableData,
                'table_caption' => 'That\'s an table caption',
                1,
                0,
                $this->getFixtureDataFromFile(__DIR__ . '/../Fixtures/Results/CTypeTable/WithCaptionHeaderTopResult.txt'),
            ],
            'Table with caption and footer' => [
                $tableData,
                'table_caption' => 'That\'s an table caption',
                0,
                1,
                $this->getFixtureDataFromFile(__DIR__ . '/../Fixtures/Results/CTypeTable/WithFooterResult.txt'),
            ],
        ];
    }

    protected function getFixtureDataFromFile(string $path): string
    {
        $fileData = file_get_contents($path);
        if (!is_string($fileData)) {
            throw new InvalidDataProviderException(
                sprintf('Could not read fixture data from "%s"', $path),
                1_674_489_538
            );
        }

        return trim($fileData);
    }
}
