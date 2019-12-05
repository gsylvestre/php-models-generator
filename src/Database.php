<?php

class Database {
    /** @var PDO */
    private static $dbh;

    private static function connect()
    {
        $configData = parse_ini_file('config.ini');
 
        try {
            self::$dbh = new PDO(
                "mysql:host={$configData['DB_HOST']};dbname={$configData['DB_NAME']};charset=utf8",
                $configData['DB_USER'],
                $configData['DB_PASS'],
                [PDO::ATTR_ERRMODE => PDO::ERRMODE_WARNING]
            );
        } catch(Exception $e){
            throw $e;
        }       
    }

    public static function getPDO() 
    {
        if (empty(self::$dbh)) {
            self::connect();
        }
        return self::$dbh;
    }
}