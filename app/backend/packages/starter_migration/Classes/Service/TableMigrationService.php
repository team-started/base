<?php

declare(strict_types=1);

namespace StarterTeam\StarterMigration\Service;

use Doctrine\DBAL\DBALException;
use Doctrine\DBAL\Driver\Exception;
use TYPO3\CMS\Core\Database\ConnectionPool;
use TYPO3\CMS\Core\Database\Query\QueryBuilder;
use TYPO3\CMS\Core\Utility\CsvUtility;
use TYPO3\CMS\Core\Utility\GeneralUtility;

class TableMigrationService implements MigrationServiceInterface
{
    const HANDLE_CTYPE = 'table';

    const NEW_CTYPE = 'text';

    /**
     * @return array[]
     * @throws DBALException
     * @throws Exception
     */
    protected function getElements(): array
    {
        $selectFields = [
            'uid',
            'bodytext',
            'table_delimiter',
            'table_enclosure',
            'cols',
            'table_caption',
            'table_header_position',
            'table_tfoot',
        ];

        /** @var QueryBuilder $queryBuilder */
        $queryBuilder = GeneralUtility::makeInstance(ConnectionPool::class)
            ->getQueryBuilderForTable('tt_content');
        $queryBuilder->getRestrictions()->removeAll();

        return $queryBuilder
            ->select(...$selectFields)
            ->from('tt_content')
            ->where(
                $queryBuilder->expr()->eq(
                    'CType',
                    $queryBuilder->createNamedParameter(static::HANDLE_CTYPE, \PDO::PARAM_STR)
                )
            )
            ->execute()
            ->fetchAllAssociative();
    }

    protected function migrateContent(array $tableData, string $tableCaption, int $tableFoot, int $tableHeaderPosition): string
    {
        $value = '<table>';

        if (!empty($tableCaption)) {
            $value .= '<caption>' . $tableCaption . '</caption>';
        }

        foreach ($tableData as $rowIterator => $row) {
            if ($rowIterator === 0) {
                if ($tableHeaderPosition == 1) {
                    $value .= '<thead>';
                } else {
                    $value .= '<tbody>';
                }
            } elseif ($rowIterator === count($tableData) -1 && $tableFoot) {
                $value .= '</tbody><tfoot>';
            }

            $value .= '<tr>';
            $value .= $this->getRenderedTableCells($row, (int)$rowIterator, $tableHeaderPosition);
            $value .= '</tr>';

            if ($rowIterator === 0) {
                if ($tableHeaderPosition == 1) {
                    $value .= '</thead><tbody>';
                }
            } elseif ($rowIterator === count($tableData) - 1) {
                if ($tableFoot == 1) {
                    $value .= '</tfoot>';
                } else {
                    $value .= '</tbody>';
                }
            }
        }

        $value .= '</table>';

        return $value;
    }

    protected function getRenderedTableCells(array $row, int $rowIterator, int $tableHeaderPosition): string
    {
        $value = '';

        foreach ($row as $columnIterator => $cell) {
            if ($rowIterator === 0) {
                if ($tableHeaderPosition == 1) {
                    $value .= '<th>';
                } else {
                    if ($columnIterator === 0) {
                        if ($tableHeaderPosition == 2) {
                            $value .= '<th>';
                        } else {
                            $value .= '<td>';
                        }
                    } else {
                        $value .= '<td>';
                    }
                }
            } else {
                if ($columnIterator === 0) {
                    if ($tableHeaderPosition == 2) {
                        $value .= '<th>';
                    } else {
                        $value .= '<td>';
                    }
                } else {
                    $value .= '<td>';
                }
            }

            if (!empty($cell)) {
                $value .= nl2br($cell);
            } else {
                $value .= ' ';
            }

            if ($rowIterator === 0) {
                if ($tableHeaderPosition == 1) {
                    $value .= '</th>';
                } else {
                    if ($columnIterator === 0) {
                        if ($tableHeaderPosition == 2) {
                            $value .= '</th>';
                        } else {
                            $value .= '</td>';
                        }
                    } else {
                        $value .= '</td>';
                    }
                }
            } else {
                if ($columnIterator === 0) {
                    if ($tableHeaderPosition == 2) {
                        $value .= '</th>';
                    } else {
                        $value .= '</td>';
                    }
                } else {
                    $value .= '</td>';
                }
            }
        }
        return $value;
    }

    protected function updateElement(int $id, string $bodyText): void
    {
        /** @var QueryBuilder $queryBuilder */
        $queryBuilder = GeneralUtility::makeInstance(ConnectionPool::class)
            ->getConnectionForTable('tt_content')
            ->createQueryBuilder();

        $queryBuilder
            ->update('tt_content')
            ->where(
                $queryBuilder->expr()->eq(
                    'uid',
                    $queryBuilder->createNamedParameter($id, \PDO::PARAM_INT)
                )
            )
            ->set('bodytext', $bodyText)
            ->set('CType', static::NEW_CTYPE)
            ->set('rowDescription', 'Migrated from CType table to text with EXT:migration at ' . time())
            ->execute()
        ;
    }

    /**
     * @param int|string $cols
     */
    protected function getTableData(?string $tableContent, int $tableDelimiter, int $fieldEnclosure, $cols = 0): ?array
    {
        if (is_null($tableContent)) {
            return null;
        }

        $cols = (int)$cols;
        $tableDelimiter = chr($tableDelimiter);
        $fieldEnclosure = chr($fieldEnclosure);
        $tableContent = trim($tableContent);
        $tableContent = str_replace($tableDelimiter . ' ' . "\r\n", $tableDelimiter . "\r\n", $tableContent);

        return CsvUtility::csvToArray($tableContent, $tableDelimiter, $fieldEnclosure, $cols);
    }

    /**
     * @throws DBALException
     * @throws Exception
     */
    public function proceedMigration(): bool
    {
        $elements = $this->getElements();

        foreach ($elements as $element) {
            $tableData = $this->getTableData(
                $element['bodytext'],
                $element['table_delimiter'],
                $element['table_enclosure'],
                $element['cols']
            );

            if (empty($tableData)) {
                $this->updateElement($element['uid'], '');
                continue;
            }

            $contentValue = $this->migrateContent(
                $tableData,
                $element['table_caption'] ?? '',
                $element['table_tfoot'],
                $element['table_header_position']
            );
            $this->updateElement($element['uid'], $contentValue);
        }

        return true;
    }

    public function countOfRecordUpdates(): int
    {
        /** @var QueryBuilder $queryBuilder */
        $queryBuilder = GeneralUtility::makeInstance(ConnectionPool::class)
            ->getQueryBuilderForTable('tt_content');
        $queryBuilder->getRestrictions()->removeAll();

        $countResult = $queryBuilder
            ->count('uid')
            ->from('tt_content')
            ->where(
                $queryBuilder->expr()->eq(
                    'CType',
                    $queryBuilder->createNamedParameter(static::HANDLE_CTYPE, \PDO::PARAM_STR)
                )
            )
            ->execute()
            ->fetchOne();

        if (!is_int($countResult)) {
            return 0;
        }

        return $countResult;
    }

    public function canHandle(string $cTypeToMigration): bool
    {
        return static::HANDLE_CTYPE === $cTypeToMigration;
    }
}
