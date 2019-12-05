<?php 

class DatabaseCheck
{
    public function checkDatabaseConfig()
    {
        //config file is created?
        if (!file_exists("config.ini")){
            throw new Exception("config.ini.not.created");
        }

        //config file contains required values?
        $configData = parse_ini_file('config.ini');
        if (empty($configData['DB_HOST']) || empty($configData['DB_NAME']) || empty($configData['DB_USER'])){
            throw new Exception("config.ini.not.complete");
        }

        //database connection works?
        try {
            Database::getPDO();
        } catch(Exception $e){
            throw new Exception("database.connection.fail");
        } 

        return true;
    }
}