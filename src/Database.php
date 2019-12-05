<?php

class Database {
    public static function getPDO($dbName, $dbHost, $dbUser, $dbPassword) 
    {
        try {
            $pdo = new PDO(
                "mysql:host=$dbHost;dbname=$dbName;charset=utf8",
                $dbUser,
                $dbPassword,
                array(PDO::ATTR_ERRMODE => PDO::ERRMODE_WARNING)
            );
        }
        catch(\Exception $exception) {
            echo 'Erreur de connexion...<br>';
            echo $exception->getMessage().'<br>';
            echo '<pre>';
            echo $exception->getTraceAsString();
            echo '</pre>';
            exit;
        }

        return $pdo;
    }
}