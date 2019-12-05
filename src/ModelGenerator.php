<?php 

class ModelGenerator 
{
    public function getTableNames()
    {
        $stmt = Database::getPDO()->query('SHOW TABLES');
        $tablesRaw = $stmt->fetchAll();

        $tableNames = [];
        foreach($tablesRaw as $table){
            $tableNames[] = $table[0];
        }

        return $tableNames;
    }

    public function getTableColumns($tableName)
    {
        $stmt = Database::getPDO()->query('DESCRIBE ' . $tableName);
        $columnsRaw = $stmt->fetchAll();

        $columnNames = [];
        foreach($columnsRaw as $column){
            $columnNames[] = $column['Field'];
        }

        return $columnNames;
    }
}