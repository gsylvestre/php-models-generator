<?php 

use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Style\SymfonyStyle;

class GenerateModelsCommand extends Command
{
    protected static $defaultName = 'models';

    protected function configure()
    {
        $this->setDescription('Generate PHP models based on existing database');
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $io = new SymfonyStyle($input, $output);

        $databaseCheck = new DatabaseCheck();
        try {
            $databaseCheck->checkDatabaseConfig();
        }
        catch(Exception $e){
            if($e->getMessage() === "database.connection.fail"){
                $io->error("Can't connect to database! Check your config in config.ini!");
                die();
            }
            else {
                $this->generateConfigIni($io);
                $this->execute($input, $output);
                return 0;
            }
        }

        $generator = new ModelGenerator();
        
        $tableNames = $generator->getTableNames();
        $tableInfos = [];
        foreach($tableNames as $tableName){
            $tableInfos[] = new TableInfo($tableName);
        }

        $configData = parse_ini_file('config.ini');
        $namespace = empty($configData['MODEL_NAMESPACE']) ? null : $configData['MODEL_NAMESPACE'];

        foreach($tableInfos as $tableInfo){
            $classGenerator = new ClassGenerator($tableInfo, $namespace);
            $classGenerator->createFile();
        }

        $io->success('Done! Your models are in the vendor/gsylvestre/php-model-generator/models/ folder.');
        $io->text('Move them wherever you want!');
        return 0;
    }

    private function generateConfigIni($io)
    {
        $dbName = $io->ask('Database name?');
        $dbHost = $io->ask('Database host?', 'localhost');
        $dbUser = $io->ask('Database host?', 'root');
        $dbPass = $io->ask('Database password?', '');
        $namespace = $io->ask('Namespace for models?');

        file_put_contents(__DIR__ . '/../config.ini', 
            "DB_HOST=$dbHost\r\nDB_NAME=$dbName\r\nDB_USER=$dbUser\r\nDB_PASS=$dbPass\r\nMODEL_NAMESPACE=$namespace"
        );
    }
}