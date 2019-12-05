<?php 

class ModelGenerator 
{
    private $pdo;

    public function __construct($dbName, $dbHost, $dbUser, $dbPassword)
    {
        $this->pdo = Database::getPDO($dbName, $dbHost, $dbUser, $dbPassword);
    }

    public function getTableNames()
    {
        $stmt = $this->pdo->query('SHOW TABLES');
        $tablesRaw = $stmt->fetchAll();

        $tableNames = [];
        foreach($tablesRaw as $table){
            $tableNames[] = $table[0];
        }

        return $tableNames;
    }

    public function getTableColumns($tableName)
    {
        $stmt = $this->pdo->query('DESCRIBE ' . $tableName);
        $columnsRaw = $stmt->fetchAll();

        $columnNames = [];
        foreach($columnsRaw as $column){
            $columnNames[] = $column['Field'];
        }

        return $columnNames;
    }
}